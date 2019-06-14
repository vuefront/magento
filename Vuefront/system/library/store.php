<?php
use Magento\Framework\App\ObjectManager;
class Store {
    public function __construct() {
        $objectManager =ObjectManager::getInstance();
        $this->storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
    }

    public function getStoreId() {
       return $this->storeManager->getStore()->getId();
    }

    public function getCurrencyCode() {
       return $this->storeManager->getStore()->getCurrentCurrency()->getCode();
    }

    public function setCurrencyCode($currency) {
        $this->storeManager->getStore()->setCurrentCurrencyCode($currency);
    }

    public function getLocale() {
        return $this->storeManager->getStore()->getLocale();
    }

    public function getRootCategoryId() {
        return $this->storeManager->getStore()->getRootCategoryId();
    }
}