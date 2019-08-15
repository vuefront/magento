<?php

namespace Vuefront\Vuefront\Model\Api\System\Library;

class Currency
{
    private $currency;

    public function __construct(
        \Magento\Framework\Pricing\Helper\Data $currency
    ) {
        $this->currency = $currency;
    }

    public function format($price)
    {
        return $this->currency->currency($price, true, false);
    }
}
