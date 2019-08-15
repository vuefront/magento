<?php

namespace Vuefront\Vuefront\Model\Api\Model\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Country extends Model
{
    private $_collectionFactory;
    private $_countryFactory;

    public function __construct(
        \Magento\Directory\Model\ResourceModel\Country\CollectionFactory $collectionFactory,
        \Magento\Directory\Model\CountryFactory $countryFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_countryFactory = $countryFactory;
    }

    public function getCountry($country_id)
    {
        return $this->_countryFactory->create()->load($country_id);
    }

    public function getCountries($data)
    {
        /** @var $collection \Magento\Directory\Model\ResourceModel\Country\Collection */
        $collection = $this->_collectionFactory->create();

        if (!empty($data['search'])) {
            $collection->join('msp_tfa_country_codes', 'msp_tfa_country_codes.code = main_table.iso2_code');
            $collection->addFieldToFilter('name', ['like' => '%' . $data['search'] . '%']);
        }

        if ($data['size'] != '-1') {
            $collection->setPageSize($data['size']);
            $collection->setCurPage($data['page']);
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }

        $sort_data = [
            'id' => 'country_id',
            'title' => 'iso2_code'
        ];

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "country_id";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }
}
