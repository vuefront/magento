<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Cart extends Model
{

    private $_currencyHelper;

    /**
     * @var \Magento\Downloadable\Api\LinkRepositoryInterface
     */
    private $_linkRepository;

    /**
     * @var \Magento\Checkout\Model\Cart
     */
    private $_cartModel;

    /**
     * @var \Magento\Quote\Model\Quote
     */
    private $_quoteModel;

    private $_sessionFactory;

    public function __construct(
        \Magento\Framework\Pricing\Helper\Data $currencyHelper,
        \Magento\Checkout\Model\Cart $cartModel,
        \Magento\Downloadable\Api\LinkRepositoryInterface $linkRepository,
        \Magento\Customer\Model\Session $sessionFactory,
        \Magento\Quote\Model\Quote $quoteFactory
    ) {
        $this->_currencyHelper = $currencyHelper;
        $this->_cartModel = $cartModel;
        $this->_linkRepository = $linkRepository;
        $this->_sessionFactory = $sessionFactory;
        $this->_quoteModel = $quoteFactory;
    }//end __construct()

    public function prepareCart()
    {
        $cart = [];
        $this->_cartModel->getQuote()->collectTotals();
        $cart = [
            'products' => [],
            'total'    => $this->currency->format($this->_cartModel->getQuote()->getGrandTotal()),
        ];

        $results = $this->_cartModel->getItems();

        foreach ($results as $value) {
            /*
                @var \Magento\Catalog\Model\Product $product
            */
            $product = $value->getProduct();
            if (!$value->isDeleted() && !$value->getParentItemId() && !$value->getParentItem()) {
                $price = "";
                if ($product->getTypeId() != "simple") {
                    $price = $this->_currencyHelper->currency($product->getFinalPrice(), true, false);
                } else {
                    $price = $this->_currencyHelper->currency($product->getPrice(), true, false);
                }
                $cart['products'][] = [
                    'key'      => $value->getId(),
                    'product'  => [
                        'product_id' => $product->getId(),
                        'price' => $price
                    ],
                    'quantity' => $value->getQty(),
                    'option'   => $this->getCartOptions($product, $value),
                    'total'    => $this->currency->format($value->getPrice() * $value->getQty()),
                ];
            }
        }

        return $cart;
    }

    public function getProduct($key)
    {
        $product = null;

        foreach ($this->cart->getProducts() as $value) {
            if ($value['cart_id'] == $key) {
                $product = $value;
                break;
            }
        }
        if ($product === null) {
            return null;
        }

        return $product;
    }

    /**
     * @param  $product \Magento\Catalog\Model\Product
     * @param  $value mixed
     * @return array
     */
    public function getCartOptions($product, $value)
    {
        $options        = [];
        $result_options = $product->getTypeInstance(true)->getOrderOptions($product);

        if (!empty($result_options['attributes_info'])) {
            foreach ($result_options['attributes_info'] as $option) {
                $options[] = [
                    'option_id'  => (int)$option['option_id'],
                    'option_value_id'  => (int)$option['option_value'],
                ];
            }
        }
        return $options;
    }
}
