<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Review extends Model
{
    private $_collectionFactory;

    public function __construct(
        \Magento\Review\Model\ResourceModel\Review\CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
    }

    public function getReviews($product_id)
    {
        /** @var $collection \Magento\Review\Model\ResourceModel\Review\Collection */
        $collection = $this->_collectionFactory->create();

        $collection->addStoreFilter(
            $this->store->getStoreId()
        )->addStatusFilter(
            \Magento\Review\Model\Review::STATUS_APPROVED
        )->addEntityFilter(
            'product',
            $product_id
        )->setDateOrder();

        $collection->load();

        $collection->addRateVotes();

        return $collection;
    }
}
