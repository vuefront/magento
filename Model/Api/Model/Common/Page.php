<?php

namespace Vuefront\Vuefront\Model\Api\Model\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Page extends Model
{
    private $_collectionFactory;
    private $_pageFactory;

    public function __construct(
        \Magento\Cms\Model\ResourceModel\Page\CollectionFactory $collectionFactory,
        \Magento\Cms\Model\PageFactory $pageFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_pageFactory = $pageFactory;
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

        $sort_data = [
            'id' => 'page_id',
            'title' => 'title',
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
