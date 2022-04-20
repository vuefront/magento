<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Manufacturer extends Resolver
{
    private $brand = false;
    private $_scopeConfig;
    private $_imageFactory;
    private $_suffix;

    public function __construct(
        \Magento\Framework\Module\Manager $moduleManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Catalog\Helper\ImageFactory $imageFactory
    ) {

        $this->_imageFactory = $imageFactory;
        $this->_scopeConfig = $scopeConfig;
        $this->_suffix = $this->_scopeConfig->getValue('catalog/seo/category_url_suffix');
        $this->brand = $moduleManager->isOutputEnabled('Vuefront_Brands');
    }
    public function get($args)
    {
        if ($this->brand) {
            $this->load->model('store/manufacturer');

            /** @var $manufacturer \Vuefront\Brands\Model\Brand */
            if (!isset($args['manufacturer'])) {
                $manufacturer = $this->model_store_manufacturer->getManufacturer((int)$args['id']);
            } else {
                $manufacturer = $args['manufacturer'];
            }

            $that = $this;
            return [
                'id' => function () use ($manufacturer) {
                    return $manufacturer->getId();
                },
                'name' => function () use ($manufacturer) {
                    return $manufacturer->getData('title');
                },
                'sort_order' => function () use ($manufacturer) {
                    return $manufacturer->getData('sort_order');
                },
                'image' => function () use ($manufacturer, $that) {
                    return $manufacturer->getImageUrl();
                },
                'imageBig' => function () use ($manufacturer, $that) {
                    return $manufacturer->getData('image') ?
                        $that->image->getUrl($manufacturer->getData('image')) :
                        '';
                },
                'imageLazy' => function () use ($manufacturer, $that) {
                    if ($manufacturer->getData('image')) {
                        return $that->image->resize(
                            'vuefront_brands/brand/image'.$manufacturer->getData('image'),
                            10,
                            10
                        );
                    } else {
                        return '';
                    }
                },
                'url' => function ($root, $args) use ($manufacturer) {
                    return $this->url([
                        'parent' => $root,
                        'args' => $args,
                        'manufacturer' => $manufacturer
                    ]);
                },
            ];
        } else {
            return [];
        }
    }

    public function getList($args)
    {
        if ($this->brand) {
            $this->load->model('store/manufacturer');

            /** @var $collection \Vuefront\Brands\Model\ResourceModel\Brand\Collection  */
            $collection = $this->model_store_manufacturer->getManufacturers($args);
            $manufacturer_total = $collection->getSize();

            $manufacturers = [];

            foreach ($collection->getItems() as $manufacturer) {
                $manufacturers[] = $this->get(['manufacturer' => $manufacturer]);
            }

            return [
                'content' => $manufacturers,
                'first' => $args['page'] === 1,
                'last' => $args['page'] === ceil($manufacturer_total / $args['size']),
                'number' => (int)$args['page'],
                'numberOfElements' => count($manufacturers),
                'size' => (int)$args['size'],
                'totalPages' => (int)ceil($manufacturer_total / $args['size']),
                'totalElements' => (int)$manufacturer_total,
            ];
        } else {
            return [
                "content" => []
            ];
        }
    }
    public function url($data)
    {
        /** @var $manufacturer_info \Vuefront\Brands\Model\Brand */
        $manufacturer_info = $data['manufacturer'];
        $result = $data['args']['url'];

        $result = str_replace("_id", $manufacturer_info->getId(), $result);
        $result = str_replace("_name", $manufacturer_info->getData('title'), $result);

        if ($manufacturer_info->getUrl() != "") {
            $result = '/' . $manufacturer_info->getUrl();
        }
        return $result;
    }
}
