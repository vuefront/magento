<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/model.php';

/**
 * @property \Magefan\Blog\Model\ResourceModel\Category\CollectionFactory $_collectionFactory
 * @property Magefan\Blog\Model\CategoryFactory $_categoryFactory
 */
class ModelBlogCategory extends Model
{
    private $_collectionFactory;
    private $_categoryFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $objectManager = ObjectManager::getInstance();
        $this->_collectionFactory = $objectManager->get('\Magefan\Blog\Model\ResourceModel\Category\CollectionFactory');
        $this->_categoryFactory = $objectManager->get('Magefan\Blog\Model\CategoryFactory');
    }

    public function getCategory($category_id)
    {
        return $this->_categoryFactory->create()->load($category_id);
    }

    public function getCategories($data = array())
    {
        /** @var $collection \Magefan\Blog\Model\ResourceModel\Category\Collection */
        $collection = $this->_collectionFactory->create();
        $collection->addActiveFilter();
        $collection->addStoreFilter($this->store->getStoreId());

        if ($data['size'] != '-1') {
            $collection->setPageSize($data['size']);
            $collection->setCurPage($data['page']);
        }

        if ($data['parent'] !== -1) {
            if ($data['parent'] != 0) {
                $collection->addFieldToFilter('category_id', ['in' => $this->_categoryFactory->create()->load($data['parent'])->getChildrenIds(false)]);

            } else {
                $collection->addFieldToFilter('path', array('null' => true));
            }
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }

        $sort_data = array(
            'id' => 'category_id',
            'name' => 'title',
            'sort_order' => 'position'
        );

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "category_id";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }
}
