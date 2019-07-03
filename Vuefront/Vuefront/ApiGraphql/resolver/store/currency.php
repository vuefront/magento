<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR.'engine/resolver.php';

class ResolverStoreCurrency extends Resolver
{
    private $codename = "d_vuefront";

    public function get()
    {
        $objectManager = ObjectManager::getInstance();

        $currencyModel = $objectManager->get('Magento\Directory\Model\Currency');
        $currencies = array();


        foreach ($currencyModel->getConfigAllowCurrencies(true)  as $code) {
            $allCurrencies = $objectManager->create('Magento\Framework\Locale\Bundle\CurrencyBundle')->get(
                $objectManager->create('Magento\Framework\Locale\ResolverInterface')->getLocale()
            )['Currencies'];

            $currencies[] = array(
                'title'        => $allCurrencies[$code][1] ?: $code,
                'code'         => $code,
                'symbol_left'  => $objectManager->create('Magento\Framework\Locale\CurrencyInterface')->getCurrency($code)->getSymbol(),
                'symbol_right' => '',
                'active' => $code == $this->store->getCurrencyCode()
            );
        }

        return $currencies;
    }

    public function edit($args)
    {
        $this->store->setCurrencyCode($args['code']);
        return $this->get();
    }
}
