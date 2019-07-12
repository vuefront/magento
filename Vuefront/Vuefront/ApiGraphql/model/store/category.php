<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR.'engine/model.php';

class ModelStoreCategory extends Model
{
    private $_collectionFactory;
    private $_categoryFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);
        $objectManager = ObjectManager::getInstance();
        $this->_collectionFactory = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory');
        $this->_categoryFactory = $objectManager->get('Magento\Catalog\Model\CategoryFactory');
    }

    public function getCategory($category_id)
    {
        return $this->_categoryFactory->create()->load($category_id);
    }

    public function getCategories($data = array())
    {
        $collection = $this->_collectionFactory->create();

        $collection->addAttributeToSelect('*');

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

        $sort_data = array(
            'id' => 'entity_id',
            'sort_order' => 'position'
        );

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
