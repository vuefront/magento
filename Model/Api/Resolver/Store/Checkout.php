<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use Magento\Checkout\Model\Session;
use Magento\Framework\Pricing\Helper\Data;
use Magento\Framework\UrlInterface;
use Magento\Shipping\Model\Config;
use Vuefront\Vuefront\Model\Api\System\Engine\Resolver;
use Magento\Store\Model\ScopeInterface;

class Checkout extends Resolver
{
    private $_currencyHelper;
    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * @var Config
     */
    private $_shippingModelConfig;

    /**
     * @var Session
     */
    protected $checkoutSession;

    /**
     * @var \Magento\Quote\Api\Data\AddressInterface
     */
    protected $address;

    /**
     * @var \Magento\Checkout\Api\ShippingInformationManagementInterface
     */
    protected $shippingInformationManagement;

    /**
     * @var \Magento\Checkout\Api\Data\ShippingInformationInterface
     */
    protected $shippingInformation;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Magento\Framework\Session\SessionManagerInterface
     */
    protected $_sessionManager;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    protected $customerFactory;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var \Magento\Quote\Model\QuoteManagement
     */
    protected $quoteManagement;

    /**
     * @var \Magento\Sales\Model\Order\Email\Sender\OrderSender
     */
    protected $orderSender;

    /**
     * @var \Magento\Quote\Model\Quote\PaymentFactory
     */
    protected $paymentFactory;

    public function __construct(
        Config $shippingModelConfig,
        UrlInterface $url,
        Session $session,
        Data $currencyHelper,
        \Magento\Quote\Api\Data\AddressInterface $address,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $shippingInformation,
        \Magento\Checkout\Api\ShippingInformationManagementInterface $shippingInformationManagement,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Session\SessionManagerInterface $sessionManager,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Quote\Model\QuoteManagement $quoteManagement,
        \Magento\Sales\Model\Order\Email\Sender\OrderSender $orderSender,
        \Magento\Quote\Model\Quote\PaymentFactory $paymentFactory
    ) {
        $this->_currencyHelper = $currencyHelper;
        $this->url = $url;
        $this->_shippingModelConfig = $shippingModelConfig;
        $this->checkoutSession = $session;
        $this->address = $address;
        $this->shippingInformationManagement = $shippingInformationManagement;
        $this->shippingInformation = $shippingInformation;
        $this->scopeConfig = $scopeConfig;
        $this->_sessionManager = $sessionManager;
        $this->storeManager = $storeManager;
        $this->customerFactory = $customerFactory;
        $this->productRepository = $productRepository;
        $this->customerRepository = $customerRepository;
        $this->quoteManagement = $quoteManagement;
        $this->orderSender = $orderSender;
        $this->paymentFactory = $paymentFactory;
    }

    public function link()
    {
        return [
            'link' => $this->url->getUrl('checkout')
        ];
    }

    public function paymentMethods()
    {
        $this->load->model('store/checkout');

        $response = $this->model_store_checkout->requestCheckout(
            '{
                payments {
                    setting
                    codename
                    status
                    name
              }
            }',
            []
        );

        $methods = [];

        foreach ($response['payments'] as $key => $value) {
            if ($value['status']) {
                $methods[] = [
                    'id' => $value['codename'],
                    'codename' => $value['codename'],
                    "name" => $value['name']
                ];
            }
        }

        return $methods;
    }

    public function shippingMethods($args)
    {
        $result = [];

        $carriers = $this->_shippingModelConfig->getActiveCarriers();

        foreach ($carriers as $shippingCode => $shippingModel) {
            $shippingPrice = $this->_currencyHelper->currency($shippingModel->getConfigData('price'), true, false);
            $result[] = [
                'id' => $shippingModel->getCarrierCode() . '.' . $shippingCode,
                'codename' => $shippingModel->getCarrierCode() . '.' . $shippingCode,
                "name" => $shippingModel->getConfigData('title') . ' - ' . $shippingPrice
            ];
        }

        return $result;
    }

    public function paymentAddress()
    {
        $fields = [];

        $fields[] = [
            'type' => 'text',
            'name' => 'firstName',
            'required' => true
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'lastName',
            'required' => true
        ];

        $fields[] = [
            'type' => 'text',
            'name' => 'email',
            'required' => true
        ];

        $fields[] = [
            'type' => 'text',
            'name' => 'company',
            'required' => false
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'address1',
            'required' => true
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'address2',
            'required' => false
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'address3',
            'required' => false
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'city',
            'required' => true
        ];
        $fields[] = [
            'type' => 'zone',
            'name' => 'zone_id',
            'required' => true
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'postcode',
            'required' => true
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'phone',
            'required' => true
        ];

        $fields[] = [
            'type' => 'country',
            'name' => 'country_id',
            'required' => true,
            'defaultValue' => $this->scopeConfig->getValue(
                'general/country/default',
                ScopeInterface::SCOPE_WEBSITES
            )
        ];

        $agree = null;

        return [
            'fields' => $fields,
            'agree' => $agree
        ];
    }

    public function shippingAddress()
    {
        $fields = [];

        $fields[] = [
            'type' => 'text',
            'name' => 'firstName',
            'required' => true
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'lastName',
            'required' => true
        ];

        $fields[] = [
            'type' => 'text',
            'name' => 'email',
            'required' => true
        ];

        $fields[] = [
            'type' => 'text',
            'name' => 'company',
            'required' => false
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'address1',
            'required' => true
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'address2',
            'required' => false
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'address3',
            'required' => false
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'city',
            'required' => true
        ];
        $fields[] = [
            'type' => 'zone',
            'name' => 'zone_id',
            'required' => true
        ];
        $fields[] = [
            'type' => 'text',
            'name' => 'postcode',
            'required' => true
        ];

        $fields[] = [
            'type' => 'country',
            'name' => 'country_id',
            'required' => true,
            'defaultValue' => $this->scopeConfig->getValue(
                'general/country/default',
                ScopeInterface::SCOPE_WEBSITES
            )
        ];

        $fields[] = [
            'type' => 'phone',
            'name' => 'phone',
            'required' => true
        ];

        return $fields;
    }

    public function createOrder($args)
    {
        $this->checkoutSession->regenerateId();

        $paymentAddress = [];

        foreach ($this->paymentAddress()['fields'] as $value) {
            if(isset($value['defaultValue'])) {
                $paymentAddress[$value['name']] = $value['defaultValue'];
            } else {
                $paymentAddress[$value['name']] = '';
            }
        }

        $this->_sessionManager->setPaymentAddress($paymentAddress);

        $shippingAddress = [];

        foreach ($this->shippingAddress() as $value) {
            if(isset($value['defaultValue'])) {
                $shippingAddress[$value['name']] = $value['defaultValue'];
            } else {
                $shippingAddress[$value['name']] = '';
            }
        }

        $this->_sessionManager->setShippingAddress($shippingAddress);

        $this->_sessionManager->setPaymentMethod('');
        $this->_sessionManager->setShippingMethod('');

        return ['success' => 'success'];
    }

    public function updateOrder($args)
    {
        $paymentAddress = [];

        foreach ($this->paymentAddress()['fields'] as $value) {
            if(isset($value['defaultValue'])) {
                $paymentAddress[$value['name']] = $value['defaultValue'];
            } else {
                $paymentAddress[$value['name']] = '';
            }
        }

        foreach ($args['paymentAddress'] as $value) {
            if ($value['value']) {
                $paymentAddress[$value['name']] = $value['value'];
            }
        }

        $this->_sessionManager->setPaymentAddress($paymentAddress);

        $shippingAddress = [];

        foreach ($this->shippingAddress() as $value) {
            if(isset($value['defaultValue'])) {
                $shippingAddress[$value['name']] = $value['defaultValue'];
            } else {
                $shippingAddress[$value['name']] = '';
            }
        }

        foreach ($args['shippingAddress'] as $value) {
            if ($value['value']) {
                $shippingAddress[$value['name']] = $value['value'];
            }
        }

        $this->_sessionManager->setShippingAddress($shippingAddress);

        $shipping_address = $this->address
            ->setFirstname($shippingAddress['firstName'])
            ->setLastname($shippingAddress['lastName'])
            ->setStreet($shippingAddress['address1'])
            ->setCity($shippingAddress['city'])
            ->setCountryId($shippingAddress['country_id'])
            ->setRegionId($shippingAddress['zone_id'])
            ->setPostcode($shippingAddress['postcode'])
            ->setTelephone($shippingAddress['phone'])
            ->setSaveInAddressBook(0)
            ->setSameAsBilling(0);

        $shipping_information = $this->shippingInformation->setShippingAddress($shipping_address);

        if (!empty($args['shippingMethod'])) {
            $methodInfo = explode('.', $args['shippingMethod']);

            $shipping_information = $shipping_information->setShippingCarrierCode($methodInfo[0])
            ->setShippingMethodCode($methodInfo[1]);

            if ($this->checkoutSession->getQuote()) {
                $cartId = $this->checkoutSession->getQuote()->getId();
                $cartSkuArray = $this->getCartItemsSkus();
                if ($cartSkuArray) {
                    try {
                        $this->shippingInformationManagement->saveAddressInformation($cartId, $shipping_information);
                    } catch (\Exception $e) {
                    }
                }
            }
        }

        $payment_address = $this->address
            ->setFirstname($paymentAddress['firstName'])
            ->setLastname($paymentAddress['lastName'])
            ->setStreet($paymentAddress['address1'])
            ->setCity($paymentAddress['city'])
            ->setCountryId($paymentAddress['country_id'])
            ->setRegionId($paymentAddress['zone_id'])
            // ->setRegion($region)
            ->setTelephone($paymentAddress['phone'])
            ->setPostcode($paymentAddress['postcode'])
            ->setSaveInAddressBook(0)
            ->setSameAsBilling(0);

        $this->checkoutSession->getQuote()->setCustomerEmail($shippingAddress['email']);
        $this->checkoutSession->getQuote()->setCustomerFirstname($shippingAddress['firstName']);
        $this->checkoutSession->getQuote()->setCustomerLastname($shippingAddress['lastName']);
        $this->checkoutSession->getQuote()->setCustomerIsGuest(1);

        $this->checkoutSession->getQuote()->setBillingAddress($payment_address);
        $this->checkoutSession->getQuote()->setShippingAddress($shipping_address);


        $this->_sessionManager->setPaymentMethod($args['paymentMethod']);
        $this->_sessionManager->setShippingMethod($args['shippingMethod']);
        if(!empty($args['paymentMethod'])) {
            $payment = $this->paymentFactory->create();
            $payment->setMethod($args['paymentMethod']);
            $this->checkoutSession->getQuote()->setPayment($payment);
        }
        $this->checkoutSession->getQuote()->save();

        $that = $this;
        return [
            'paymentMethods' => function ($root, $args) use ($that) {
                return $that->load->resolver('store/checkout/paymentMethods', [
                    'parent' => $root,
                    'args' => $args
                ]);
            },
            'shippingMethods' => function ($root, $args) use ($that) {
                return $that->load->resolver('store/checkout/shippingMethods', [
                    'parent' => $root,
                    'args' => $args
                ]);
            },
            'totals' => function ($root, $args) use ($that) {
                return $that->load->resolver('store/checkout/totals', [
                    'parent' => $root,
                    'args' => $args
                ]);
            }
        ];
    }

    public function getCartItemsSkus() {
        $cartSkuArray = [];
        $cartItems = $this->checkoutSession->getQuote()->getAllVisibleItems();
        foreach ($cartItems as $product) {
            $cartSkuArray[] = $product->getSku();
        }
        return $cartSkuArray;
    }

    public function confirmOrder()
    {
        $total = $this->checkoutSession->getQuote()->getGrandTotal();
        $order = $this->quoteManagement->submit($this->checkoutSession->getQuote());
        $paymentMethod = $this->_sessionManager->getPaymentMethod();

        $orderId = null;

        if(!$order) {
            return [];
        }

        $this->orderSender->send($order);

        $orderId = $order->getIncrementId();

         $this->load->model('store/checkout');

        $response = $this->model_store_checkout->requestCheckout(
            'mutation($paymentMethod: String, $total: Float, $callback: String) {
                createOrder(paymentMethod: $paymentMethod, total: $total, callback: $callback) {
                    url
                }
            }',
            array(
                'paymentMethod' => $paymentMethod,
                'total' => floatval($total),
                'callback' => $this->storeManager->getStore()->getBaseUrl(). "rest/V1/vuefront/callback?order_id=".$orderId
            )
        );

        return [
            'url' => $response['createOrder']['url'],
            'order' => [
                'id' => $orderId
            ]
        ];
    }

    public function callback() {

    }

    public function totals()
    {
        $totals = $this->checkoutSession->getQuote()->getTotals();

        $result = [];

        foreach ($totals as $key => $value) {
            $result[] = [
                "title" => $value->toArray()['title'],
                "text" => $this->_currencyHelper->currency($value->toArray()['value'], true, false)
            ];
        }

        return $result;
    }
}
