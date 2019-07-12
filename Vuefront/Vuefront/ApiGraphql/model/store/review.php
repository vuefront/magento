<?php

use Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/model.php';

/**
 * @property \Magento\Review\Model\ResourceModel\Review\CollectionFactory $_collectionFactory
 * @property Magento\Review\Model\Review $_reviewFactory
 */
class ModelStoreReview extends Model
{
    private $_collectionFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $objectManager = ObjectManager::getInstance();
        $this->_collectionFactory = $objectManager->get('\Magento\Review\Model\ResourceModel\Review\CollectionFactory');
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
