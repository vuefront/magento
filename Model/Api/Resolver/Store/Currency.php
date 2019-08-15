<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Currency extends Resolver
{
    /**
     * @var \Magento\Directory\Model\Currency
     */
    private $_currencyModel;
    /**
     * @var \Magento\Framework\Locale\Bundle\CurrencyBundle
     */
    private $_currencyBundle;
    /**
     * @var \Magento\Framework\Locale\ResolverInterface
     */
    private $_resolverModel;

    public function __construct(
        \Magento\Directory\Model\Currency $currencyModel,
        \Magento\Framework\Locale\Bundle\CurrencyBundle $currencyBundle,
        \Magento\Framework\Locale\ResolverInterface $resolverModel
    ) {
        $this->_currencyModel = $currencyModel;
        $this->_currencyBundle = $currencyBundle;
        $this->_resolverModel = $resolverModel;
    }

    public function get()
    {
        $currencies = [];

        foreach ($this->_currencyModel->getConfigAllowCurrencies() as $code) {
            $allCurrencies = $this->_currencyBundle->get(
                $this->_resolverModel->getLocale()
            )['Currencies'];

            $currency = $this->_currencyModel->load($code);

            $currencies[] = [
                'title' => $allCurrencies[$code][1] ?: $code,
                'name' => $allCurrencies[$code][1] ?: $code,
                'code' => $code,
                'symbol_left' => $currency->getCurrencySymbol(),
                'symbol_right' => '',
                'active' => $code == $this->store->getCurrencyCode()
            ];
        }

        return $currencies;
    }

    public function edit($args)
    {
        $this->store->setCurrencyCode($args['code']);
        return $this->get();
    }
}
