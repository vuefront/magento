<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Account extends Resolver
{
    private $_customer;
    private $_customerFactory;
    private $_sessionFactory;

    public function __construct(
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\Session $sessionFactory,
        \Magento\Customer\Model\Customer $customer
    ) {

        $this->_customerFactory = $customerFactory;
        $this->_sessionFactory = $sessionFactory;
        $this->_customer = $customer;
    }

    public function login($args)
    {
        $this->_customer->setWebsiteId($this->store->getWebsiteId());
        $customer = $this->_customer->loadByEmail($args["email"]);

        if ($customer->validatePassword($args["password"])) {
            $this->_sessionFactory->setCustomerAsLoggedIn($customer);

            return $this->get($customer);
        } else {
            throw new \Magento\Framework\Exception\AuthenticationException(
                __('Warning: No match for E-Mail Address and/or Password.')
            );
        }
    }

    public function logout($args)
    {
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
        return [
            'id' => $customer->getId(),
            'email' => $customer->getEmail(),
            'firstName' => $customer->getFirstname(),
            'lastName' => $customer->getLastname(),
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

        $results = $this->_sessionFactory->getCustomer()->getAddresses();
        $address = [];
        /** @var \Magento\Customer\Model\Address $address */
        foreach ($results as $value) {
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
