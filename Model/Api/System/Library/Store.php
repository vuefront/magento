<?php

namespace Vuefront\Vuefront\Model\Api\System\Library;

class Store
{
    private $storeManager;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
    }

    public function getBaseUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }

    public function getStoreId()
    {
        return $this->storeManager->getStore()->getId();
    }

    public function getWebsiteId()
    {
        return $this->storeManager->getStore()->getWebsiteId();
    }

    public function getName()
    {
        return $this->storeManager->getStore()->getName();
    }

    public function getFormattedAddress()
    {
        return $this->storeManager->getStore()->getFormattedAddress();
    }

    public function getCurrencyCode()
    {
        return $this->storeManager->getStore()->getCurrentCurrency()->getCode();
    }

    public function setCurrencyCode($currency)
    {
        $this->storeManager->getStore()->setCurrentCurrencyCode($currency);
    }

    public function getLocale()
    {
        return $this->storeManager->getStore()->getLocale();
    }

    public function getRootCategoryId()
    {
        return $this->storeManager->getStore()->getRootCategoryId();
    }
}
