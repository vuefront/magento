<?php

namespace Vuefront\Vuefront\Model\Api\Model\Blog;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Post extends Model
{
    private $_collectionFactory;
    private $_postFactory;
    private $_categoryFactory;

    public function __construct(
        \Vuefront\Blog\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        \Vuefront\Blog\Model\PostFactory $postFactory,
        \Vuefront\Blog\Model\CategoryFactory $categoryFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_postFactory = $postFactory;
        $this->_categoryFactory = $categoryFactory;
    }

    public function getPost($post_id)
    {
        return $this->_postFactory->create()->load($post_id);
    }

    public function getPosts($data)
    {
        /** @var $collection \Vuefront\Blog\Model\ResourceModel\Post\Collection */
        $collection = $this->_collectionFactory->create();

        if ($data['category_id'] != 0) {
            $collection->addCategoryFilter($this->_categoryFactory->create()->load($data['category_id']));
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }

        $sort_data = [
            'id' => 'post_id',
            'sort_order' => 'date_added'
        ];

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "date_added";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }

    public function getNextPost($post_id)
    {
        /** @var $collection \Vuefront\Blog\Model\ResourceModel\Post\Collection */
        $collection = $this->_collectionFactory->create();

        $collection->addFieldToFilter('post_id', ['gt' => $post_id]);

        $collection->setOrder('date_added', 'ASC');

        $collection->load();

        return $collection;
    }

    public function getPrevPost($post_id)
    {
        /** @var $collection \Vuefront\Blog\Model\ResourceModel\Post\Collection */
        $collection = $this->_collectionFactory->create();

        $collection->addFieldToFilter('post_id', ['lt' => $post_id]);

        $collection->setOrder('post_id', 'DESC');

        $collection->load();

        return $collection;
    }
}
