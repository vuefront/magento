<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Manufacturer extends Model
{
    private $_collectionFactory;
    private $_manufacturerFactory;

    public function __construct(
        \Magiccart\Shopbrand\Model\ResourceModel\Shopbrand\CollectionFactory $collectionFactory,
        \Magiccart\Shopbrand\Model\ShopbrandFactory $manufacturerFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_manufacturerFactory = $manufacturerFactory;
    }

    public function getManufacturer($manufacturer_id)
    {
        return $this->_manufacturerFactory->create()->load($manufacturer_id);
    }

    public function getManufacturerByOption($option_id)
    {
        $collection = $this->_collectionFactory->create();

        $collection->addFieldToSelect('*');

        $collection->addFieldToFilter('option_id', ['eq' => $option_id]);

        $collection->load();

        return $collection->getFirstItem();
    }

    public function getManufacturers($data = [])
    {
        $collection = $this->_collectionFactory->create();

        $collection->addFieldToSelect('*');

        if (!empty($data['search'])) {
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
            'id' => 'shopbrand_id',
            'sort_order' => 'order'
        ];

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "order";
        }

        $collection->setOrder("`" . $sort . "`", $order);

        $collection->load();

        return $collection;
    }
}
