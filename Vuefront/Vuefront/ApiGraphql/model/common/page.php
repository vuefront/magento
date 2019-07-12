<?php

use Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/model.php';

/**
 * @property \Magento\Cms\Model\ResourceModel\Page\CollectionFactory $_collectionFactory
 * @property \Magento\Cms\Model\PageFactory $_pageFactory
 */
class ModelCommonPage extends Model
{
    private $_collectionFactory;
    private $_pageFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $objectManager = ObjectManager::getInstance();
        $this->_collectionFactory = $objectManager->get('\Magento\Cms\Model\ResourceModel\Page\CollectionFactory');
        $this->_pageFactory = $objectManager->get('\Magento\Cms\Model\PageFactory');
    }

    public function getPage($page_id)
    {
        return $this->_pageFactory->create()->load($page_id);
    }

    public function getPages($data)
    {
        /** @var $collection \Magento\Cms\Model\ResourceModel\Page\Collection */
        $collection = $this->_collectionFactory->create();

        if (!empty($data['search'])) {
            $collection->addFieldToFilter('title', ['like' => '%' . $data['search'] . '%']);
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

        $sort_data = array(
            'id' => 'page_id',
            'title' => 'title',
            'sort_order' => 'sort_order'
        );

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "page_id";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }
}
