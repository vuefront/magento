<?php

use Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/resolver.php';

/**
 * @property Magento\Framework\Pricing\Helper\Data $_currencyHelper
 * @property Magento\CatalogInventory\Api\StockRegistryInterface $_stockRegistry
 * @property Magento\Review\Model\Review $_reviewFactory
 * @property Magento\Catalog\Model\Product\Option $_optionFactory
 * @property \Magento\Catalog\Helper\ImageFactory $_imageFactory
 * @property Magento\Framework\App\Config\ScopeConfigInterface $_scopeConfig
 * @property string $_suffix
 * @property \Magento\Customer\Model\Session $_session
 * @property \Magento\Customer\Model\Customer $_customer
 * @property Magento\Catalog\Model\Product\Gallery\ReadHandler $_galleryReadHelper
 */
class ResolverStoreProduct extends Resolver
{
    private $_currencyHelper;
    private $_stockRegistry;
    private $_reviewFactory;
    private $_optionFactory;
    private $_imageFactory;
    private $_scopeConfig;
    private $_suffix;
    private $_session;
    private $_customer = false;
    private $_galleryReadHelper;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('store/product');
        $objectManager = ObjectManager::getInstance();

        $this->_currencyHelper = $objectManager->get('Magento\Framework\Pricing\Helper\Data');
        $this->_stockRegistry = $objectManager->get('Magento\CatalogInventory\Api\StockRegistryInterface');
        $this->_reviewFactory = $objectManager->get('Magento\Review\Model\Review');
        $this->_optionFactory = $objectManager->get('Magento\Catalog\Model\Product\Option');
        $this->_imageFactory = $objectManager->get('\Magento\Catalog\Helper\ImageFactory');
        $this->_scopeConfig = $objectManager->get('\Magento\Framework\App\Config\ScopeConfigInterface');
        $this->_suffix = $this->_scopeConfig->getValue('catalog/seo/product_url_suffix');
        $this->_session = $objectManager->get('\Magento\Customer\Model\Session');
        $this->_galleryReadHelper = $objectManager->get('Magento\Catalog\Model\Product\Gallery\ReadHandler');

        if ($this->_session->isLoggedIn()) {
            $this->_customer = $this->_session->getCustomer();
        }

    }

    public function get($args)
    {
        /** @var $product Magento\Catalog\Model\Product */
        if (!isset($args['product'])) {
            $product = $this->model_store_product->getProduct($args['id']);
        } else {
            $product = $args['product'];
        }

        $that = $this;
        return array(
            'id' => function () use ($product) {
                return $product->getId();
            },
            'name' => function () use ($product) {
                return $product->getName();
            },
            'description' => function () use ($product) {
                return $product->getDescription();
            },
            'shortDescription' => function () use ($product) {
                return $product->getShortDescription();
            },
            'price' => function () use ($product) {
                if ($product->getTypeId() != "simple") {
                    return $this->_currencyHelper->currency($product->getFinalPrice(), true, false);
                } else {
                    return $this->_currencyHelper->currency($product->getPrice(), true, false);
                }
            },
            'special' => function () use ($product) {
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
            'model' => function () use ($product) {
                return $product->getSku();
            },
            'image' => function () use ($product, $that) {
                return $product->getData('thumbnail') ? $that->image->getUrl($product->getData('thumbnail')) : '';
            },
            'imageBig' => function () use ($product, $that) {
                return $product->getData('image') ? $that->image->getUrl($product->getData('image')) : '';;
            },
            'imageLazy' => function () use ($product, $that) {
                return $product->getData('thumbnail') ? $that->image->resize($product->getData('thumbnail'), 10, 10) : '';
            },
            'stock' => function () use ($product) {
                $stockItem = $this->_stockRegistry->getStockItem($product->getId());
                return $stockItem->getQty() > 0;
            },
            'rating' => function () use ($product) {
                $this->_reviewFactory->getEntitySummary($product);
                return $product->getRatingSummary()->getRatingSummary() * 5 / 100;
            },
            'keyword' => function () use ($product) {
                return !empty($product->getUrlKey()) ? $product->getUrlKey() . $this->_suffix : "";
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
            },
            'meta' => function() use ($product) {
                return array(
                    'title' => $product->getMetaTitle() != '' ? $product->getMetaTitle() : $product->getName(),
                    'description' => $product->getMetaDescription(),
                    'keyword' => $product->getMetaKeywords()
                );
            }
        );
    }

    public function getList($args)
    {
        $this->load->model('store/product');

        /** @var $collection \Magento\Catalog\Model\ResourceModel\Product\Collection */
        $collection = $this->model_store_product->getProducts($args);
        $product_total = $collection->getSize();
        $products = [];

        foreach ($collection->getItems() as $product) {
            $products[] = $this->get(array('product' => $product));
        }

        return array(
            'content' => $products,
            'first' => $args['page'] === 1,
            'last' => $args['page'] === ceil($product_total / $args['size']),
            'number' => (int)$args['page'],
            'numberOfElements' => count($products),
            'size' => (int)$args['size'],
            'totalPages' => (int)ceil($product_total / $args['size']),
            'totalElements' => (int)$product_total,
        );
    }

    public function getRelatedProducts($data)
    {
        /** @var $product Magento\Catalog\Model\Product */
        $product = $data['product'];
        $args = $data['args'];

        $results = $product->getRelatedProductCollection()
            ->addAttributeToSelect('*')->setPageSize($args['limit'])->setCurPage(1)->load()->getItems();

        $products = array();

        foreach ($results as $value) {
            $products[] = $this->get(array('product' => $value));
        }

        return $products;
    }

    public function getAttributes($data)
    {
        /** @var $product Magento\Catalog\Model\Product */
        $product = $data['product'];
        $attributes = array();

        foreach ($product->getAttributes() as $attribute) {
            if (!$attribute->getIsVisibleOnFront()) {
                continue;
            }

            $attributes[] = array(
                'name' => $attribute->getFrontend()->getLabel(),
                'options' => array($attribute->getFrontend()->getValue($product))
            );
        }

        return $attributes;
    }

    public function getOptions($data)
    {
        $this->load->model('store/product');
        /** @var $product Magento\Catalog\Model\Product */
        $product = $data['product'];
        $options = array();

        if (!$product->getData('has_options') && $product->getTypeId() !== 'downloadable') {
            return $options;
        }
        /** @var \Magento\Catalog\Model\ResourceModel\Product\Option\Collection $collection */
        $collection = $this->_optionFactory->getProductOptionCollection($product);

        /** @var Magento\Catalog\Model\Product\Option $o */
        foreach ($collection->getItems() as $o) {
            switch ($o->getType()) {
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
                    $type = $o->getType();
                    break;
            }
            $values = array();
            $option_values = $o->getValues();
            if ($option_values) {
                foreach ($option_values as $option_value) {
                    $values[] = array(
                        'id' => $option_value->getOptionTypeId(),
                        'name' => $option_value->getTitle(),
                    );
                }
            }
            $options['option_' . $o->getId()] = array(
                'id' => 'option_' . $o->getId(),
                'name' => $o->getTitle(),
                'type' => $type,
                'values' => $values
            );
        }

        if ($product->getTypeId() == 'downloadable') {
            $links = $product->getTypeInstance(true)->getLinks($product);
            if (count($links) > 0) {
                $options['links'] = array(
                    'id' => 'links',
                    'name' => $product->getData('links_title'),
                    'type' => 'checkbox',
                    'values' => array()
                );
            }
            foreach ($links as $link) {
                $options['links']['values'][] = array(
                    'id' => $link->getId(),
                    'name' => $link->getTitle()
                );
            }
        }


        if ($product->getTypeId() == 'configurable') {
            $results = $product->getTypeInstance()->getConfigurableOptions($product);
            foreach ($results as $attribute_id => $values) {
                $options[$attribute_id] = array(
                    'id' => $attribute_id,
                    'name' => $attribute_id,
                    'type' => 'radio',
                    'values' => array()
                );

                foreach ($values as $attributeValue) {
                    $options[$attribute_id]['name'] = $attributeValue['super_attribute_label'];
                    $options[$attribute_id]['values'][$attributeValue['value_index']] = array(
                        'id' => $attributeValue['value_index'],
                        'name' => $attributeValue['option_title']
                    );
                }
            }
        }


        return $options;
    }

    public function getImages($data)
    {
        /** @var $product Magento\Catalog\Model\Product */
        $product = $data['product'];
        $args = $data['args'];
        $this->_galleryReadHelper->execute($product);
        $collection = $product->getMediaGalleryImages()->setPageSize($args['limit'])->load();

        $images = array();
        if ($collection) {
            /** @var Magento\Catalog\Model\Product\Image $image */
            foreach ($collection as $image) {
                if ($product->getData('image') !== $image->getFile()) {
                    $images[] = array(
                        'image' => $image->getUrl(),
                        'imageBig' => $image->getUrl(),
                        'imageLazy' => $this->image->resize($image->getFile(), 10, 10)
                    );
                }
            }
        }

        return $images;
    }
}
