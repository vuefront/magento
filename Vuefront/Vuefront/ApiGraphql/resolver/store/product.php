<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR.'engine/resolver.php';

class ResolverStoreProduct extends Resolver
{
    private $_currencyHelper;
    private $_stockRegistry;
    private $_reviewFactory;
    private $_imageFactory;
    private $_scopeConfig;
    private $_suffix;
    private $_session;
    private $_customer = false;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('store/product');
        $objectManager =ObjectManager::getInstance();

        $this->_currencyHelper = $objectManager->get('Magento\Framework\Pricing\Helper\Data');
        $this->_stockRegistry = $objectManager->get('Magento\CatalogInventory\Api\StockRegistryInterface');
        $this->_reviewFactory = $objectManager->get('Magento\Review\Model\Review');
        $this->_imageFactory = $objectManager->get('\Magento\Catalog\Helper\ImageFactory');
        $this->_scopeConfig = $objectManager->get('\Magento\Framework\App\Config\ScopeConfigInterface');
        $this->_suffix = $this->_scopeConfig->getValue('catalog/seo/product_url_suffix');
        $this->_session = $objectManager->get('\Magento\Customer\Model\Session');

        if ($this->_session->isLoggedIn()) {
            $this->_customer = $this->_session->getCustomer();
        }
    }

    public function get($args)
    {
        if (!isset($args['product'])) {
            $product = $this->model_store_product->getProduct($args['id']);
        } else {
            $product = $args['product'];
        }

        $that = $this;
        return array(
            'id'               => function () use ($product) {
                return $product->getId();
            },
            'name'               => function () use ($product) {
                return $product->getName();
            },
            'description'        => function () use ($product) {
                return $product->getDescription();
            },
            'shortDescription'        => function () use ($product) {
                return $product->getshortDescription();
            },
            'price'               => function () use ($product) {
                if ($product->getTypeId()!="simple") {
                    return $this->_currencyHelper->currency($product->getFinalPrice(), true, false);
                } else {
                    return $this->_currencyHelper->currency($product->getPrice(), true, false);
                }
            },
            'special'               => function () use ($product) {
                $special = $product->getSpecialPrice();

                if ($this->_customer) {
                    $tierPrices = $product->getTierPrices();
                    if (count($tierPrices) > 0) {
                        foreach ($tierPrices as $tier) {
                            if ($tier->getCustomerGroupId() == $this->_customer->getGroupId()) {
                                $special = $tier->getValue();
                            }
                        }
                    }
                }

                if (!empty($special)) {
                    $special = $this->_currencyHelper->currency($special, true, false);
                } else {
                    $special = '';
                }

                return $special;
            },
            'model'               => function () use ($product) {
                return $product->getSku();
            },
            'image' => function () use ($product, $that) {
                return $product->getData('thumbnail') ? $that->image->getUrl($product->getData('thumbnail')) : '';
            },
            'imageBig' => function () use ($product, $that) {
                return $product->getData('image') ? $that->image->getUrl($product->getData('image')) : '';
                ;
            },
            'imageLazy'        => function () use ($product, $that) {
                return $product->getData('thumbnail') ? $that->image->resize($product->getData('thumbnail'), 10, 10) : '';
            },
            'stock'            => function () use ($product) {
                $stockItem = $this->_stockRegistry->getStockItem($product->getId());
                return $stockItem->getQty() > 0;
            },
            'rating'           => function () use ($product) {
                $this->_reviewFactory->getEntitySummary($product);
                return $product->getRatingSummary()->getRatingSummary() * 5 / 100;
            },
            'keyword'          => function () use ($product) {
                return !empty($product->getUrlKey()) ? $product->getUrlKey().$this->_suffix: "";
            },
            'images' => function ($root, $args) use ($product) {
                return $this->getImages(array(
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ));
            },
            'products' => function ($root, $args) use ($product, $that) {
                return $that->getRelatedProducts(array(
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ));
            },
            'attributes' => function ($root, $args) use ($product, $that) {
                return $that->getAttributes(array(
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ));
            },
            'reviews' => function ($root, $args) use ($product, $that) {
                return $that->load->resolver('store/review/get', array(
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ));
            },
            'options' => function ($root, $args) use ($product) {
                return $this->getOptions(array(
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ));
            }
        );
    }
    public function getList($args)
    {
        $this->load->model('store/product');

        $collection = $this->model_store_product->getProducts($args);
        $product_total = $collection->getSize();
        $products = [];


        foreach ($collection->getItems() as $product) {
            $products[] = $this->get(array( 'product' => $product ));
        }

        return array(
            'content'          => $products,
            'first'            => $args['page'] === 1,
            'last'             => $args['page'] === ceil($product_total / $args['size']),
            'number'           => (int) $args['page'],
            'numberOfElements' => count($products),
            'size'             => (int) $args['size'],
            'totalPages'       => (int) ceil($product_total / $args['size']),
            'totalElements'    => (int) $product_total,
        );
    }
    public function getRelatedProducts($data)
    {
        $parent = $data['product'];
        $args = $data['args'];

        $upsell_ids = $parent->getRelatedProductCollection()
                            ->addAttributeToSelect('*')->load()->getItems();

        $upsell_ids = array_slice($upsell_ids, 0, $args['limit']);

        $products = array();

        foreach ($upsell_ids as $product) {
            $products[] = $this->get(array( 'product' => $product ));
        }

        return $products;
    }
    public function getAttributes($data)
    {
        $product = $data['product'];
        $results = $this->model_store_product->getProductAttributes($product->getId());

        $attributes = array();

        foreach ($results as $attribute) {
            $values = explode(',', $attribute['value']);
            $options = array();

            foreach ($values as $option_id) {
                $option_info = $this->model_store_product->getAttributeValue($option_id);
                if (!empty($option_info)) {
                    $options[] = $option_info['value'];
                }
            }
            $attributes[] = array(
                'name'    => (string)$attribute['name'],
                'options' => $options
            );
        }

        return $attributes;
    }
    public function getOptions($data)
    {
        $this->load->model('store/product');
        $product = $data['product'];
        $options = array();

        if (!$product->getData('has_options')) {
            return $options;
        }

       
        $results = $this->model_store_product->getSimpleProductOptions($product->getId());
        foreach ($results as $value) {
            $type = 'text';

            switch ($value['type']) {
                case 'field':
                    $type = 'text';
                    break;
                case 'area':
                    $type = 'textarea';
                    break;
                case 'drop_down':
                    $type = 'select';
                    break;
                case 'multiple':
                    $type = 'checkbox';
                    break;
                case 'date_time':
                    $type = 'datetime';
                    break;
                default:
                    $type = $value['type'];
                    break;
            }

            $values = array();

            $result_values = $this->model_store_product->getOptionValues($value['option_id']);


            foreach ($result_values as $option_value) {
                $values[] = array(
                    'id' => $option_value['option_value_id'],
                    'name' => $option_value['name'],
                );
            }


            $options['option_'.$value['option_id']] = array(
                'id' => 'option_'.$value['option_id'],
                'name' => $value['title'],
                'type' => $type,
                'values' => $values
            );
        }
        if ($product->getTypeId() == 'configurable') {
            $results = $this->model_store_product->getProductOptions($product->getId());
            foreach ($results as $optProduct) {
                $attributes = $this->model_store_product->getProductAttributes($optProduct['product_id']);
                foreach ($attributes as $attribute) {
                    if (!isset($options[$attribute['id']])) {
                        $options[$attribute['id']] = array(
                        'id' => $attribute['id'],
                        'name' => $attribute['name'],
                        'type' => 'radio',
                        'values' => array()
                    );
                    }

                    $values = explode(',', $attribute['value']);

                    foreach ($values as $option_id) {
                        $option_info = $this->model_store_product->getAttributeValue($option_id);
                        if (!empty($option_info)) {
                            $options[$attribute['id']]['values'][$option_id] = array(
                            'id' => $option_id,
                            'name' => $option_info['value']
                        );
                        }
                    }
                }
            }
        }

        

        return $options;
    }
    public function getImages($data)
    {
        $product = $data['product'];
        $args = $data['args'];

        $image_ids = $this->model_store_product->getProductImages($product->getId());

        $image_ids = array_slice($image_ids, 0, $args['limit']);

        $images = array();
        foreach ($image_ids as $image) {
            if ($product->getData('image') !== $image['image']) {
                $images[]           = array(
                'image'     => $this->image->getUrl($image['image']),
                'imageBig'     => $this->image->getUrl($image['image']),
                'imageLazy' => $this->image->resize($image['image'], 10, 10)
            );
            }
        }

        return $images;
    }
}
