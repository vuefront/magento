<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Product extends Resolver
{
    private $_currencyHelper;
    private $_reviewFactory;
    private $_optionFactory;
    private $_imageFactory;
    private $_scopeConfig;
    private $_suffix;
    private $_session;
    private $_customer = false;
    /**
     * @var \Magento\Catalog\Model\Product\Gallery\ReadHandler
     */
    private $_galleryReadHandler;
    /**
     * @var \Magento\CatalogInventory\Api\StockRegistryInterface
     */
    private $_stockRegistry;

    public function __construct(
        \Magento\Framework\Pricing\Helper\Data $currencyHelper,
        \Magento\Review\Model\ReviewFactory $reviewFactory,
        \Magento\Catalog\Model\Product\OptionFactory $optionFactory,
        \Magento\Catalog\Helper\ImageFactory $imageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Customer\Model\Session $session,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
        \Magento\Catalog\Model\Product\Gallery\ReadHandler $galleryReadHandler
    ) {
        $this->_currencyHelper = $currencyHelper;
        $this->_reviewFactory = $reviewFactory;
        $this->_optionFactory = $optionFactory;
        $this->_imageFactory = $imageFactory;
        $this->_scopeConfig = $scopeConfig;
        $this->_session = $session;
        $this->_stockRegistry = $stockRegistry;
        $this->_galleryReadHandler = $galleryReadHandler;
        $this->_suffix = $this->_scopeConfig->getValue('catalog/seo/product_url_suffix');

        if ($this->_session->isLoggedIn()) {
            $this->_customer = $this->_session->getCustomer();
        }
    }

    public function get($args)
    {
        $this->load->model('store/product');
        $this->load->model('store/manufacturer');

        /** @var $product \Magento\Catalog\Model\Product */
        if (!isset($args['product'])) {
            $product = $this->model_store_product->getProduct($args['id']);
        } else {
            $product = $args['product'];
        }

        $that = $this;

        return [
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
            'extra' => function () use ($product, $that) {
                $resultEvent = [];

                $that->load->model('common/vuefront');
                $resultEvent = $that->model_common_vuefront->pushEvent(
                    "fetch_product",
                    [ "extra" => [],
                        "product_id" => $product->getId()
                    ]
                );
                return $resultEvent['extra'];
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
            'manufacturerId' => function () use ($product) {
                $manufacturerId = $this->model_store_manufacturer
                    ->getManufacturerByProduct($product->getId());
                return $manufacturerId;
            },
            'manufacturer' => function ($root, $args) use ($product, $that) {
                $manufacturerId = $that->model_store_manufacturer
                    ->getManufacturerByProduct($product->getId());
                return $manufacturerId != 0 ? $that->load->resolver('store/manufacturer/get', [
                    'parent' => $root,
                    'args' => $args,
                    'id' => $manufacturerId
                ]) : null;
            },
            'model' => function () use ($product) {
                return $product->getSku();
            },
            'image' => function () use ($product, $that) {
                return $product->getData('thumbnail') ? $that->image->getUrl($product->getData('thumbnail')) : '';
            },
            'imageBig' => function () use ($product, $that) {
                return $product->getData('image') ? $that->image->getUrl($product->getData('image')) : '';
            },
            'imageLazy' => function () use ($product, $that) {
                if ($product->getData('thumbnail')) {
                    $resizedImage = $this->_imageFactory->create()
                        ->setImageFile($product->getData('thumbnail'))
                        ->constrainOnly(true)
                        ->keepAspectRatio(true)
                        ->keepTransparency(true)
                        ->keepFrame(false)
                        ->resize(10, 10);
                    return $resizedImage->getUrl();
                } else {
                    return '';
                }
            },
            'stock' => function () use ($product) {
                $stockItem =$this->_stockRegistry->getStockItem($product->getId());
                return !!$stockItem->getIsInStock();
            },
            'rating' => function () use ($product) {
                $this->_reviewFactory->create()->getEntitySummary($product);
                return $product->getRatingSummary()->getRatingSummary() * 5 / 100;
            },
            'keyword' => function () use ($product) {
                return !empty($product->getUrlKey()) ? $product->getUrlKey() . $this->_suffix : "";
            },
            'images' => function ($root, $args) use ($product) {
                return $this->getImages([
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ]);
            },
            'products' => function ($root, $args) use ($product, $that) {
                return $that->getRelatedProducts([
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ]);
            },
            'url' => function ($root, $args) use ($that, $product) {
                return $that->url([
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ]);
            },
            'attributes' => function ($root, $args) use ($product, $that) {
                return $that->getAttributes([
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ]);
            },
            'reviews' => function ($root, $args) use ($product, $that) {
                return $that->load->resolver('store/review/get', [
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ]);
            },
            'options' => function ($root, $args) use ($product) {
                return $this->getOptions([
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ]);
            },
            'meta' => function () use ($product) {
                return [
                    'title' => $product->getMetaTitle() != '' ? $product->getMetaTitle() : $product->getName(),
                    'description' => $product->getMetaDescription() ? $product->getMetaDescription() : '',
                    'keyword' => $product->getMetaKeywords() ? $product->getMetaKeywords() : ''
                ];
            }
        ];
    }

    public function getList($args)
    {
        $this->load->model('store/product');

        $collection = $this->model_store_product->getProducts($args);

        $product_total = $collection->getSize();
        $products = [];

        foreach ($collection->getItems() as $product) {
            $products[] = $this->get(['product' => $product]);
        }

        return [
            'content' => $products,
            'first' => $args['page'] === 1,
            'last' => $args['page'] === ceil($product_total / $args['size']),
            'number' => (int)$args['page'],
            'numberOfElements' => count($products),
            'size' => (int)$args['size'],
            'totalPages' => (int)ceil($product_total / $args['size']),
            'totalElements' => (int)$product_total,
        ];
    }

    public function getRelatedProducts($data)
    {
        /** @var $product \Magento\Catalog\Model\Product */
        $product = $data['product'];
        $args = $data['args'];

        $results = $product->getRelatedProductCollection()
            ->addAttributeToSelect('*')->setPageSize($args['limit'])->setCurPage(1)->load()->getItems();

        $products = [];

        foreach ($results as $value) {
            $products[] = $this->get(['product' => $value]);
        }

        return $products;
    }

    public function getAttributes($data)
    {
        /** @var $product \Magento\Catalog\Model\Product */
        $product = $data['product'];
        $attributes = [];

        foreach ($product->getAttributes() as $attribute) {
            if (!$attribute->getIsVisibleOnFront()) {
                continue;
            }

            $attributes[] = [
                'name' => $attribute->getFrontend()->getLabel(),
                'options' => [$attribute->getFrontend()->getValue($product)]
            ];
        }

        return $attributes;
    }

    public function getOptions($data)
    {
        $this->load->model('store/product');
        /** @var $product \Magento\Catalog\Model\Product */
        $product = $data['product'];
        $options = [];

        if (!$product->getData('has_options') && $product->getTypeId() !== 'downloadable') {
            return $options;
        }
        /** @var \Magento\Catalog\Model\ResourceModel\Product\Option\Collection $collection */
        $collection = $this->_optionFactory->create()->getProductOptionCollection($product);

        /** @var \Magento\Catalog\Model\Product\Option $o */
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
            $values = [];
            $option_values = $o->getValues();
            if ($option_values) {
                foreach ($option_values as $option_value) {
                    $values[] = [
                        'id' => $option_value->getOptionTypeId(),
                        'name' => $option_value->getTitle(),
                    ];
                }
            }
            $options['option_' . $o->getId()] = [
                'id' => 'option_' . $o->getId(),
                'name' => $o->getTitle(),
                'type' => $type,
                'values' => $values
            ];
        }

        if ($product->getTypeId() == 'downloadable') {
            $links = $product->getTypeInstance(true)->getLinks($product);
            if (count($links) > 0) {
                $options['links'] = [
                    'id' => 'links',
                    'name' => $product->getData('links_title'),
                    'type' => 'checkbox',
                    'values' => []
                ];
            }
            foreach ($links as $link) {
                $options['links']['values'][] = [
                    'id' => $link->getId(),
                    'name' => $link->getTitle()
                ];
            }
        }

        if ($product->getTypeId() == 'configurable') {
            $results = $product->getTypeInstance()->getConfigurableOptions($product);
            foreach ($results as $attribute_id => $values) {
                $options[$attribute_id] = [
                    'id' => $attribute_id,
                    'name' => $attribute_id,
                    'type' => 'radio',
                    'values' => []
                ];

                foreach ($values as $attributeValue) {
                    $options[$attribute_id]['name'] = $attributeValue['super_attribute_label'];
                    $options[$attribute_id]['values'][$attributeValue['value_index']] = [
                        'id' => $attributeValue['value_index'],
                        'name' => $attributeValue['option_title']
                    ];
                }
            }
        }

        return $options;
    }

    public function getImages($data)
    {
        /** @var $product \Magento\Catalog\Model\Product */
        $product = $data['product'];
        $args = $data['args'];
        $this->_galleryReadHandler->execute($product);
        $collection = $product->getMediaGalleryImages()->setPageSize($args['limit'])->load();

        $images = [];
        if ($collection) {
            /** @var \Magento\Catalog\Model\Product\Image $image */
            foreach ($collection as $image) {
                if ($product->getData('image') !== $image->getFile()) {
                    $images[] = [
                        'image' => $image->getUrl(),
                        'imageBig' => $image->getUrl(),
                        'imageLazy' => $this->_imageFactory->create()
                            ->setImageFile($image->getFile())->resize(10, 10)->getUrl()
                    ];
                }
            }
        }

        return $images;
    }

    public function url($data)
    {
        /** @var $product \Magento\Catalog\Model\Product */
        $product = $data['product'];
        $result = $data['args']['url'];

        $result = str_replace("_id", $product->getId(), $result);
        $result = str_replace("_name", $product->getName(), $result);

        if ($product->getUrlKey() != '') {
            $result = '/' . $product->getUrlKey(). $this->_suffix;
        }

        return $result;
    }
}
