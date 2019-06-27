<?php
use \Magento\Framework\App\ObjectManager;

class ResolverStoreCheckout extends Resolver
{
    public function link() {
        $objectManager =ObjectManager::getInstance();

        $url = $objectManager->get('\Magento\Framework\UrlInterface');

        return array(
            'link' => $url->getUrl('checkout')
        );
    }
}