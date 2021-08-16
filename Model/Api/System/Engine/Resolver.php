<?php
namespace Vuefront\Vuefront\Model\Api\System\Engine;

/**
 * @property \Vuefront\Vuefront\Model\Api\System\Library\Image $image
 * @property \Vuefront\Vuefront\Model\Api\System\Library\Store $store
 * @property \Vuefront\Vuefront\Model\Api\System\Library\Response $response
 * @property \Vuefront\Vuefront\Model\Api\System\Library\Currency $currency
 * @property \Vuefront\Vuefront\Model\Api\Model\Store\Product $model_store_product
 * @property \Vuefront\Vuefront\Model\Api\Model\Common\Vuefront $model_common_vuefront
 * @property \Vuefront\Vuefront\Model\Api\Model\Store\Category $model_store_category
 * @property \Vuefront\Vuefront\Model\Api\Model\Common\Seo $model_common_seo
 * @property \Vuefront\Vuefront\Model\Api\Model\Store\Cart $model_store_cart
 * @property \Vuefront\Vuefront\Model\Api\Model\Store\Manufacturer $model_store_manufacturer
 * @property \Vuefront\Vuefront\Model\Api\System\Engine\Loader $load
 */

class Resolver
{
    protected $registry;

    public function initRegistry($registry)
    {
        $this->registry = $registry;
    }

    public function __get($key)
    {
        return $this->registry->get($key);
    }

    public function __set($key, $value)
    {
        $this->registry->set($key, $value);
    }
}
