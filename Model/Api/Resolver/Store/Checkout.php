<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use Magento\Checkout\Model\Session;
use Magento\Framework\Pricing\Helper\Data;
use Magento\Framework\UrlInterface;
use Magento\Shipping\Model\Config;
use Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

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

    public function __construct(
        Config $shippingModelConfig,
        UrlInterface $url,
        Session $session,
        Data $currencyHelper
    ) {
        $this->_currencyHelper = $currencyHelper;
        $this->url = $url;
        $this->_shippingModelConfig = $shippingModelConfig;
        $this->checkoutSession = $session;
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
                'id' => $shippingModel->getCarrierCode(),
                'codename' => $shippingModel->getCarrierCode(),
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
            'name' => 'city',
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
            'required' => true
        ];

        $fields[] = [
            'type' => 'zone',
            'name' => 'zone_id',
            'required' => true
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
            'required' => true
        ];

        return $fields;
    }

    public function createOrder($args)
    {
        // $this->session->data['shipping_address'] = array();

        // foreach ($this->shippingAddress() as $value) {
        //     $this->session->data['shipping_address'][$value['name']] = '';
        // }

        // $this->session->data['payment_address'] = array(
        //     'custom_field' => array()
        // );

        // $paymentAddress = $this->paymentAddress();
        // foreach ($paymentAddress['fields'] as $value) {
        //     $this->session->data['payment_address'][$value['name']] = '';
        // }

        // $this->session->data['payment_method'] = null;
        // $this->session->data['shipping_method'] = null;
        return ['success' => 'success'];
    }

    public function updateOrder($args)
    {
        // foreach ($args['paymentAddress'] as $value) {
        //     if (strpos($value['name'], "vfCustomField-") !== false) {
        //         if ($value['value']) {
        //             $field_name = str_replace("vfCustomField-", "", $value['name']);
        //             $field_name = explode('-', $field_name);
        //             if (!isset($this->session->data['payment_address']['custom_field'][$field_name[0]])) {
        //                 $this->session->data['payment_address']['custom_field'][$field_name[0]] = array();
        //             }
        //             $this->session->data['payment_address']['custom_field'][$field_name[0]][$field_name[1]] = $value['value'];
        //         }
        //     } else {
        //         if ($value['value']) {
        //             $this->session->data['payment_address'][$value['name']] = $value['value'];
        //         }
        //     }
        // }

        // foreach ($args['shippingAddress'] as $value) {
        //     if (strpos($value['name'], "vfCustomField-") !== false) {
        //         if ($value['value']) {
        //             $field_name = str_replace("vfCustomField-", "", $value['name']);
        //             $field_name = explode('-', $field_name);
        //             if (!isset($this->session->data['shipping_address']['custom_field'][$field_name[0]])) {
        //                 $this->session->data['shipping_address']['custom_field'][$field_name[0]] = array();
        //             }
        //             $this->session->data['shipping_address']['custom_field'][$field_name[0]][$field_name[1]] = $value['value'];
        //         }
        //     } else {
        //         if ($value['value']) {
        //             $this->session->data['shipping_address'][$value['name']] = $value['value'];
        //         }
        //     }
        // }

        // if (!empty($args['shippingMethod'])) {
        //     $shipping = explode('.', $args['shippingMethod']);

        //     $this->load->model('extension/shipping/'.$shipping[0]);

        //     $quote = $this->{'model_extension_shipping_' . $shipping[0]}->getQuote($this->session->data['shipping_address']);
        //     if ($quote) {
        //         $this->session->data['shipping_method'] = $quote['quote'][$shipping[1]];
        //     }
        // }

        // $this->session->data['payment_method'] = $args['paymentMethod'];
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

    public function confirmOrder()
    {
        return [
            'url' => '1',
            'order' => [
                'id' => '1'
            ]
        ];
    }

    public function totals()
    {
        return [];
    }
}
