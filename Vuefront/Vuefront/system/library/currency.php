<?php
use \Magento\Framework\App\ObjectManager;

class Currency
{
    private $currency;
    private $resource;
    public function __construct()
    {
        $objectManager  = ObjectManager::getInstance();
        $this->currency = $objectManager->get('Magento\Framework\Pricing\Helper\Data');
    }

    public function format($price)
    {
        return $this->currency->currency($price, true, false);
    }
}
