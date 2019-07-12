<?php

use Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/model.php';

/**
 * @property \Magefan\Blog\Model\ResourceModel\Post\CollectionFactory $_collectionFactory
 * @property Magefan\Blog\Model\PostFactory $_postFactory
 */
class ModelBlogPost extends Model
{
    private $_collectionFactory;
    private $_postFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $objectManager = ObjectManager::getInstance();
        $this->_collectionFactory = $objectManager->get('\Magefan\Blog\Model\ResourceModel\Post\CollectionFactory');
        $this->_postFactory = $objectManager->get('Magefan\Blog\Model\PostFactory');
        $this->_categoryFactory = $objectManager->get('Magefan\Blog\Model\CategoryFactory');
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

        $sort_data = array(
            'id' => 'post_id',
            'sort_order' => 'position'
        );

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "post_id";
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
