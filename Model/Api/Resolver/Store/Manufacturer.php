<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;
use function Safe\eio_busy;

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
        $this->brand = $moduleManager->isOutputEnabled('Ves_Brand');
    }
    public function get($args)
    {
        if ($this->brand) {
            $this->load->model('store/manufacturer');

            /** @var $manufacturer \Ves\Brand\Model\Brand */
            if (!isset($args['manufacturer'])) {
                $manufacturer = $this->model_store_manufacturer->getManufacturer($args['id']);
            } else {
                $manufacturer = $args['manufacturer'];
            }

            $that = $this;
            return [
                'id' => function () use ($manufacturer) {
                    return $manufacturer->getId();
                },
                'name' => function () use ($manufacturer) {
                    return $manufacturer->getData('name');
                },
                'sort_order' => function () use ($manufacturer) {
                    return $manufacturer->getData('position');
                },
                'image' => function () use ($manufacturer, $that) {
                    return $manufacturer->getData('thumbnail') ?
                        $that->image->getUrl($manufacturer->getData('thumbnail')) :
                        '';
                },
                'imageBig' => function () use ($manufacturer, $that) {
                    return $manufacturer->getData('image') ?
                        $that->image->getUrl($manufacturer->getData('image')) :
                        '';
                },
                'imageLazy' => function () use ($manufacturer, $that) {
                    if ($manufacturer->getData('thumbnail')) {
                        $resizedImage = $this->_imageFactory->create()
                            ->setImageFile($manufacturer->getData('thumbnail'))
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

            /** @var $collection \Ves\Brand\Model\ResourceModel\Brand\Collection */
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
        /** @var $manufacturer_info \Ves\Brand\Model\Brand */
        $manufacturer_info = $data['manufacturer'];
        $result = $data['args']['url'];

        $result = str_replace("_id", $manufacturer_info->getId(), $result);
        $result = str_replace("_name", $manufacturer_info->getData('name'), $result);

        if ($manufacturer_info->getUrlKey() != "") {
            $result = '/' . $manufacturer_info->getUrlKey(). $this->_suffix;
        }

        return $result;
    }
}
