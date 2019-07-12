<?php

use Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/model.php';

/**
 * @property \Magento\Directory\Model\ResourceModel\Country\CollectionFactory $_collectionFactory
 * @property \Magento\Directory\Model\CountryFactory $_countryFactory
 */
class ModelCommonCountry extends Model
{
    private $_collectionFactory;
    private $_countryFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $objectManager = ObjectManager::getInstance();
        $this->_collectionFactory = $objectManager->get('\Magento\Directory\Model\ResourceModel\Country\CollectionFactory');
        $this->_countryFactory = $objectManager->get('\Magento\Directory\Model\CountryFactory');
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

        $sort_data = array(
            'id' => 'country_id',
            'title' => 'iso2_code'
        );

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
