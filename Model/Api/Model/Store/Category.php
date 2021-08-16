<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Category extends Model
{
    private $_collectionFactory;
    private $_categoryFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_categoryFactory = $categoryFactory;
    }

    public function getCategory($category_id)
    {
        return $this->_categoryFactory->create()->load($category_id);
    }

    public function getCategories($data = [])
    {
        $collection = $this->_collectionFactory->create();

        $collection->addAttributeToSelect('*');

        if (!empty($data['search'])) {
            $collection->addFieldToFilter('name', ['like' => '%' . $data['search'] . '%']);
        }

        if ($data['top']) {
            $collection->addAttributeToFilter('include_in_menu', array('eq' => $data['top'] ? 1 : 0));
        }

        if ($data['size'] != '-1') {
            $collection->setPage($data['page'], $data['size']);
        }

        $collection->addFieldToFilter('is_active', 1);

        if ($data['parent'] != -1) {
            if ($data['parent'] == 0) {
                $collection->addFieldToFilter('parent_id', $this->store->getRootCategoryId());
            } else {
                $collection->addFieldToFilter('parent_id', $data['parent']);
            }
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
            $sort = "position";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }
}
