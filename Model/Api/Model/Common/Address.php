<?php

namespace Vuefront\Vuefront\Model\Api\Model\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Address extends Model
{
    private $_addressFactory;

    public function __construct(
        \Magento\Customer\Model\AddressFactory $addressFactory
    ) {
        $this->_addressFactory = $addressFactory;
    }

    public function addAddress($customer, $data)
    {
        $address = $this->_addressFactory->create();
        $address->setCity($data['city']);
        $address->setCompany($data['company']);
        $address->setFirstname($data['firstName']);
        $address->setLastname($data['lastName']);
        $address->setPostcode($data['zipcode']);
        $address->setRegionId($data['zoneId']);
        $address->setCountryId($data['countryId']);
        $address->setStreet($data['address1'] . ' ' . $data['address2']);
        $address->setTelephone('  ');
        $address->setCustomer($customer);
        $address->save();

        return $address;
    }

    public function editAddress($address_id, $data)
    {
        $address = $this->_addressFactory->create()->load($address_id);

        $address->setCity($data['city']);
        $address->setCompany($data['company']);
        $address->setFirstname($data['firstName']);
        $address->setLastname($data['lastName']);
        $address->setPostcode($data['zipcode']);
        $address->setRegionId($data['zoneId']);
        $address->setCountryId($data['countryId']);
        $address->setStreet($data['address1'] . ' ' . $data['address2']);
        $address->setTelephone('  ');
        $address->save();

        return $address;
    }

    public function deleteAddress($address_id)
    {
        $this->_addressFactory->create()->load($address_id)->delete();
    }

    public function getAddress($address_id)
    {
        return $this->_addressFactory->create()->load($address_id);
    }
}
