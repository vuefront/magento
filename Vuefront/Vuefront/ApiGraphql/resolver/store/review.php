<?php

use \Magento\Framework\App\ObjectManager;
use \Magento\Review\Model\Review;

require_once VF_SYSTEM_DIR . 'engine/resolver.php';

/**
 * @property Magento\Review\Model\Rating $_ratingFactory
 */
class ResolverStoreReview extends Resolver
{
    private $_ratingFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);
        $objectManager = ObjectManager::getInstance();

        $this->_ratingFactory = $objectManager->get('Magento\Review\Model\Rating');
    }

    public function add($args)
    {
        $objectManager = ObjectManager::getInstance();

        $reviewFactory = $objectManager->get('Magento\Review\Model\ReviewFactory');
        $ratingFactory = $objectManager->get('Magento\Review\Model\RatingFactory');

        $productId = $args['id'];
        $reviewFinalData['ratings'][1] = $args['rating'];
        $reviewFinalData['nickname'] = $args['author'];
        $reviewFinalData['title'] = "";
        $reviewFinalData['detail'] = $args['content'];
        $review = $reviewFactory->create()->setData($reviewFinalData);
        $review->unsetData('review_id');
        $review->setEntityId($review->getEntityIdByCode(Review::ENTITY_PRODUCT_CODE))
            ->setEntityPkValue($productId)
            ->setStatusId(Review::STATUS_APPROVED)
            ->setStoreId($this->store->getStoreId())
            ->setStores([$this->store->getStoreId()])
            ->save();

        foreach ($reviewFinalData['ratings'] as $ratingId => $optionId) {
            $ratingFactory->create()
                ->setRatingId($ratingId)
                ->setReviewId($review->getId())
                ->addOptionVote($optionId, $productId);
        }
        $review->aggregate();

        return $this->load->resolver('store/product/get', $args);
    }

    public function get($data)
    {
        $this->load->model('store/review');
        /** @var $product Magento\Catalog\Model\Product */
        $product = $data['product'];
        /** @var $collection \Magento\Review\Model\ResourceModel\Review\Collection */
        $collection = $this->model_store_review->getReviews($product->getId());

        $comments = array();

        /** @var \Magento\Review\Model\Review $comment */
        foreach ($collection->getItems() as $comment) {
            $avg = 0;
            if (count($comment->getRatingVotes())) {
                $ratings = array();
                foreach ($comment->getRatingVotes() as $rating) {
                    $ratings[] = $rating->getPercent();
                }
                $avg = array_sum($ratings) / count($ratings);
            }

            $comments[] = array(
                'author' => $comment->getData('nickname'),
                'author_email' => '',
                'created_at' => $comment->getData('created_at'),
                'content' => $comment->getData('detail'),
                'rating' => (float)$avg * 5 / 100
            );
        }

        return $comments;
    }
}
