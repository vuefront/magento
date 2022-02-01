<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;
use Magento\Integration\Model\Oauth\TokenFactory as TokenModelFactory;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Framework\Exception\AuthenticationException;

class Account extends Resolver
{
    private $_customer;
    private $_customerFactory;
    /**
     * @var \Magento\Checkout\Model\Cart
     */
    protected $cart;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * Customer Account Service
     *
     * @var AccountManagementInterface
     */
    private $accountManagement;
    /**
     * Token Model
     *
     * @var TokenModelFactory
     */
    private $tokenModelFactory;
    private $_sessionFactory;
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $_checkoutSession;

    public function __construct(
        TokenModelFactory $tokenModelFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\Session $sessionFactory,
        \Magento\Customer\Model\Customer $customer,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Checkout\Model\Cart $cart,
        AccountManagementInterface $accountManagement
    ) {
        $this->tokenModelFactory = $tokenModelFactory;
        $this->accountManagement = $accountManagement;
        $this->_customerFactory = $customerFactory;
        $this->_sessionFactory = $sessionFactory;
        $this->_customer = $customer;
        $this->_checkoutSession = $checkoutSession;
        $this->scopeConfig = $scopeConfig;
        $this->cart = $cart;
    }

    public function customerList($args)
    {
        $this->load->model('common/customer');

        $collection = $this->model_common_customer->getCustomers($args);
        $customer_total = $collection->getSize();

        $customers = [];

        foreach ($collection->getItems() as $customer) {
            $customers[] = $this->getCustomer(['customer' => $customer]);
        }

        return [
            'content' => $customers,
            'first' => $args['page'] === 1,
            'last' => $args['page'] === ceil($customer_total / $args['size']),
            'number' => (int) $args['page'],
            'numberOfElements' => count($customers),
            'size' => (int) $args['size'],
            'totalPages' => (int) ceil($customer_total / $args['size']),
            'totalElements' => (int) $customer_total,
        ];
    }

    public function getCustomer($args)
    {
        $this->load->model('common/customer');
        /** @var $customer \Magento\Customer\Model\Customer */
        if (!isset($args['customer'])) {
            $customer = $this->model_common_customer->getCustomer($args['id']);
        } else {
            $customer = $args['customer'];
        }

        $that = $this;

        $address = $customer->getPrimaryBillingAddress();

        return [
            'id'        => $customer->getId(),
            'firstName' => $customer->getFirstname(),
            'lastName'  => $customer->getLastname(),
            'email'     => $customer->getEmail(),
            'phone'     => $address ? $address->getTelephone() : ''
        ];
    }

    public function login($args)
    {
        $this->_customer->setWebsiteId($this->store->getWebsiteId());
        $customer = $this->_customer->loadByEmail($args["email"]);
        if ($customer->validatePassword($args["password"])) {
            $this->_sessionFactory->setCustomerAsLoggedIn($customer);

            // $this->_checkoutSession->loadCustomerQuote();

            // $quote = $this->_checkoutSession->getQuote();
            // $quote->setCustomerIsGuest(0);
            // $quote->save();
            // $this->_sessionFactory->setCustomerAsLoggedIn($customer);

            $this->load->model('common/vuefront');
            $this->model_common_vuefront->pushEvent('login_customer', [
                'customer_id' => $customer->getId(),
                'firstname' => $customer->getFirstname(),
                'lastname' => $customer->getLastname(),
                'email' => $customer->getEmail()
            ]);

            return [
                'token' => $this->tokenModelFactory->create()
                ->createCustomerToken($customer->getId())->getToken(),
                'customer' => $this->get($customer)
            ];
        } else {
            throw new \Magento\Framework\Exception\AuthenticationException(
                __('Warning: No match for E-Mail Address and/or Password.')
            );
        }
    }

    public function logout($args)
    {
        $customer = $this->_sessionFactory->getCustomer();

        $this->load->model('common/vuefront');
        $this->model_common_vuefront->pushEvent('logout_customer', [
            'customer_id' => $customer->getId(),
            'firstname' => $customer->getFirstname(),
            'lastname' => $customer->getLastname(),
            'email' => $customer->getEmail(),
        ]);
        $this->_sessionFactory->logout();

        return [
            'status' => true
        ];
    }

    public function register($args)
    {
        $customer = $args['customer'];

        try {
            $newCustomer = $this->_customerFactory->create();

            $newCustomer->setWebsiteId($this->store->getWebsiteId());
            $newCustomer->setEmail($customer['email']);
            $newCustomer->setFirstname($customer['firstName']);
            $newCustomer->setLastname($customer['lastName']);
            $newCustomer->setPassword($customer['password']);
            $newCustomer->save();

            $this->load->model('common/vuefront');
            $this->model_common_vuefront->pushEvent('create_customer', [
                'customer_id' => $newCustomer->getId(),
                'firstname' => $newCustomer->getFirstname(),
                'lastname' => $newCustomer->getLastname(),
                'email' => $newCustomer->getEmail()
            ]);

            return $this->get($newCustomer);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\AuthenticationException(__($e->getMessage()));
        }
    }

    public function edit($args)
    {
        $customerData = $args['customer'];

        /** @var \Magento\Customer\Model\Customer $customer */
        $customer = $this->_sessionFactory->getCustomer();

        $customer->setEmail($customerData['email']);
        $customer->setFirstname($customerData['firstName']);
        $customer->setLastname($customerData['lastName']);

        $customer->save();

        return $this->get($customer);
    }

    public function editPassword($args)
    {
        /** @var \Magento\Customer\Model\Customer $customer */
        $customer = $this->_sessionFactory->getCustomer();

        $customer->setPassword($args['password']);

        $customer->save();

        return $this->get($customer->getId());
    }

    /**
     * @param \Magento\Customer\Model\Customer $customer
     */
    public function get($customer)
    {
        $address = $customer->getPrimaryBillingAddress();

        return [
            'id' => $customer->getId(),
            'email' => $customer->getEmail(),
            'firstName' => $customer->getFirstname(),
            'lastName' => $customer->getLastname(),
            'phone' => $address ? $address->getTelephone() : ''
        ];
    }

    public function isLogged($args)
    {
        /** @var \Magento\Customer\Model\Customer $customer */
        $customer = [];

        if ($this->_sessionFactory->isLoggedIn()) {
            $customer = $this->get($this->_sessionFactory->getCustomer());
        }

        return [
            'status' => $this->_sessionFactory->isLoggedIn(),
            'customer' => $customer
        ];
    }

    public function address($args)
    {
        $this->load->model('common/address');

        /** @var \Magento\Customer\Model\Address $address */
        if (!isset($args['address'])) {
            $address = $this->model_common_address->getAddress($args['id']);
        } else {
            $address = $args['address'];
        }

        $that = $this;

        return [
            'id' => function () use ($address) {
                return $address->getId();
            },
            'firstName' => function () use ($address) {
                return $address->getFirstname();
            },
            'lastName' => function () use ($address) {
                return $address->getLastname();
            },
            'company' => function () use ($address) {
                return $address->getCompany();
            },
            'address1' => function () use ($address) {
                return $address->getStreetFull();
            },
            'address2' => function () use ($address) {
                return '';
            },
            'zoneId' => function () use ($address) {
                return $address->getRegionId();
            },
            'zone' => function () use ($address, $that) {
                return $that->load->resolver('common/zone/get', [
                    'id' => $address->getRegionId()
                ]);
            },
            'countryId' => function () use ($address) {
                return $address->getCountryId();
            },
            'country' => function () use ($address, $that) {
                return $that->load->resolver('common/country/get', [
                    'id' => $address->getCountryId()
                ]);
            },
            'city' => function () use ($address) {
                return $address->getCity();
            },
            'zipcode' => function () use ($address) {
                return $address->getPostcode();
            }
        ];
    }

    public function addressList($args)
    {
        $this->load->model('common/address');

        $results = $this->_sessionFactory->getCustomer()->getAddressesCollection();

        $address = [];
        /** @var \Magento\Customer\Model\Address $address */
        foreach ($results->getItems() as $value) {
            $address[] = $this->address(['address' => $value]);
        }
        return $address;
    }

    public function editAddress($args)
    {
        $this->load->model('common/address');
        $address = $this->model_common_address->editAddress($args['id'], $args['address']);

        return $this->address(['address' => $address]);
    }

    public function addAddress($args)
    {
        $this->load->model('common/address');

        $address = $this->model_common_address->addAddress($this->_sessionFactory->getCustomer(), $args['address']);

        return $this->address(['address' => $address]);
    }

    public function removeAddress($args)
    {
        $this->load->model('common/address');

        $this->model_common_address->deleteAddress($args['id']);

        return $this->addressList($args);
    }
}
