<?php

namespace Vuefront\Vuefront\Model\Api\Model\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Customer extends Model
{
    private $_collectionFactory;
    private $_customerFactory;

    public function __construct(
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $collectionFactory,
        \Magento\Customer\Model\Customer $customerFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_customerFactory = $customerFactory;
    }

    public function getCustomer($customer_id)
    {
        return $this->_customerFactory->create()->load($customer_id);
    }

    public function getCustomers($data)
    {
        /** @var $collection \Magento\Customer\Model\ResourceModel\Customer\Collection */
        $collection = $this->_collectionFactory->create();

        if (!empty($data['search'])) {
            $collection->addFieldToFilter([
                ['attribute'=>'firstname', 'like' => '%' . $data['search'] . '%'],
                ['attribute'=>'lastname', 'like' => '%' . $data['search'] . '%'],
            ]);
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
            'id' => 'entity_id',
            'sort_order' => 'position'
        ];

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "entity_id";
        }

        $collection->setOrder($sort, $order);
        $collection->load();

        return $collection;
    }
}
