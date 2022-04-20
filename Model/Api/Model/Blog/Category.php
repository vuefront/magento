<?php

namespace Vuefront\Vuefront\Model\Api\Model\Blog;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Category extends Model
{
    private $_collectionFactory;
    private $_categoryFactory;

    public function __construct(
        \Vuefront\Blog\Model\ResourceModel\Category\CollectionFactory $collectionFactory,
        \Vuefront\Blog\Model\CategoryFactory $categoryFactory
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
        /** @var $collection \Vuefront\Blog\Model\ResourceModel\Category\Collection */
        $collection = $this->_collectionFactory->create();

        // $collection->addStoreFilter($this->store->getStoreId());

        if ($data['size'] != '-1') {
            $collection->setPageSize($data['size']);
            $collection->setCurPage($data['page']);
        }

        if ($data['parent'] != -1) {
            if ($data['parent'] == 0) {
                $collection->addFieldToFilter('parent_id', 0);
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
           'id' => 'category_id',
           'name' => 'title',
           'sort_order' => 'sort_order'
        ];

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "sort_order";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }
}
