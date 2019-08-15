<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Checkout extends Resolver
{
    /**
     * @var \Magento\Framework\UrlInterface
     */
    private $url;

    public function __construct(
        \Magento\Framework\UrlInterface $url
    ) {
        $this->url = $url;
    }

    public function link()
    {
        return [
            'link' => $this->url->getUrl('checkout')
        ];
    }
}
