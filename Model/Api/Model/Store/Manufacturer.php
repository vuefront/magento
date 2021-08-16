<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Manufacturer extends Model
{
    private $_collectionFactory;
    private $_manufacturerFactory;

    public function __construct(
        \Ves\Brand\Model\ResourceModel\Brand\CollectionFactory $collectionFactory,
        \Ves\Brand\Model\BrandFactory $manufacturerFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_manufacturerFactory = $manufacturerFactory;
    }

    public function getManufacturer($manufacturer_id)
    {
        return $this->_manufacturerFactory->create()->load($manufacturer_id);
    }

    public function getManufacturers($data = [])
    {
        $collection = $this->_collectionFactory->create();

        $collection->addFieldToSelect('*');

        if (!empty($data['search'])) {
            $collection->addFieldToFilter('name', ['like' => '%' . $data['search'] . '%']);
        }

        if ($data['size'] != '-1') {
            $collection->setPage($data['page'], $data['size']);
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }

        $sort_data = [
            'id' => 'brand_id',
            'sort_order' => 'position'
        ];

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "position";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }
}
