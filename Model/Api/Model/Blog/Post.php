<?php

namespace Vuefront\Vuefront\Model\Api\Model\Blog;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Post extends Model
{
    private $_collectionFactory;
    private $_postFactory;
    private $_categoryFactory;

    public function __construct(
        \Magefan\Blog\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        \Magefan\Blog\Model\PostFactory $postFactory,
        \Magefan\Blog\Model\CategoryFactory $categoryFactory
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
        /** @var $collection \Magefan\Blog\Model\ResourceModel\Post\Collection */
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

    public function getNextPost($post_id)
    {
        /** @var $collection \Magefan\Blog\Model\ResourceModel\Post\Collection */
        $collection = $this->_collectionFactory->create();

        $collection->addFieldToFilter('post_id', ['gt' => $post_id]);

        $collection->setOrder('publish_time', 'ASC');

        $collection->load();

        return $collection;
    }

    public function getPrevPost($post_id)
    {
        /** @var $collection \Magefan\Blog\Model\ResourceModel\Post\Collection */
        $collection = $this->_collectionFactory->create();

        $collection->addFieldToFilter('post_id', ['lt' => $post_id]);

        $collection->setOrder('post_id', 'DESC');

        $collection->load();

        return $collection;
    }
}
