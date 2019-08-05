<?php

use Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/model.php';

/**
 * @property \Magento\Directory\Model\ResourceModel\Region\CollectionFactory $_collectionFactory
 * @property \Magento\Directory\Model\RegionFactory $_regionFactory
 */
class ModelCommonZone extends Model
{
    private $_collectionFactory;
    private $_regionFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $objectManager = ObjectManager::getInstance();
        $this->_collectionFactory = $objectManager->get('\Magento\Directory\Model\ResourceModel\Region\CollectionFactory');
        $this->_regionFactory = $objectManager->get('\Magento\Directory\Model\RegionFactory');
    }

    public function getZone($zone_id)
    {
        return $this->_regionFactory->create()->load($zone_id);
    }

    public function getZones($data)
    {
        /** @var $collection \Magento\Directory\Model\ResourceModel\Region\Collection */
        $collection = $this->_collectionFactory->create();

        if (!empty($data['search'])) {
            $collection->addFieldToFilter('name', ['like' => '%' . $data['search'] . '%']);
        }
        if (!empty($data['country_id'])) {
            $collection->addFieldToFilter('country_id', $data['country_id']);
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
            'id' => 'region_id',
            'title' => 'name'
        );

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "region_id";
        }

        $collection->setOrder($sort, $order);
        $collection->load();

        return $collection;
    }
}
