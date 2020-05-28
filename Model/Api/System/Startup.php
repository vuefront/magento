<?php

namespace Vuefront\Vuefront\Model\Api\System;

use \Magento\Framework\App\Action\Context;

class Startup
{
    private $loader;

    public function __construct(
        Context $context,
        \Vuefront\Vuefront\Model\Api\System\Engine\Loader $loader,
        \Vuefront\Vuefront\Model\Api\System\Engine\Registry $registry,
        \Vuefront\Vuefront\Model\Api\System\Library\Currency $currency,
        \Vuefront\Vuefront\Model\Api\System\Library\Image $image,
        \Vuefront\Vuefront\Model\Api\System\Library\Response $response,
        \Vuefront\Vuefront\Model\Api\System\Library\Store $store,
        \Magento\Framework\Filesystem\Driver\File $driver
    ) {
        $this->loader = $loader;
        $this->registry = $registry;
        $this->registry->set('load', $loader);
        $this->registry->set('currency', $currency);
        $this->registry->set('image', $image);
        $this->registry->set('response', $response);
        $this->registry->set('store', $store);
        $this->registry->set('driver', $driver);
    }

    /**
     * @param $body
     * @param $driver \Magento\Framework\Filesystem\Driver\File
     */
    public function start($body, $driver)
    {
        $this->loader->resolver('startup/startup', $body);

        return $this->registry->get('response')->getOutput();
    }

    /**
     * @param $body
     * @param $driver \Magento\Framework\Filesystem\Driver\File
     */
    public function callback($body, $driver)
    {
        $this->loader->resolver('store/checkout/callback', $body);

        return $this->registry->get('response')->getOutput();
    }
}
