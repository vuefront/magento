<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Review extends Resolver
{
    private $_ratingFactory;
    /**
     * @var \Magento\Review\Model\ReviewFactory
     */
    private $_reviewFactory;

    public function __construct(
        \Magento\Review\Model\RatingFactory $ratingFactory,
        \Magento\Review\Model\ReviewFactory $reviewFactory
    ) {
        $this->_ratingFactory = $ratingFactory;
        $this->_reviewFactory = $reviewFactory;
    }

    public function add($args)
    {
        $productId = $args['id'];
        $reviewFinalData['ratings'][1] = $args['rating'];
        $reviewFinalData['nickname'] = $args['author'];
        $reviewFinalData['title'] = "";
        $reviewFinalData['detail'] = $args['content'];
        $review = $this->_reviewFactory->create()->setData($reviewFinalData);
        $review->unsetData('review_id');
        $review->setEntityId($review->getEntityIdByCode(\Magento\Review\Model\Review::ENTITY_PRODUCT_CODE))
            ->setEntityPkValue($productId)
            ->setStatusId(\Magento\Review\Model\Review::STATUS_APPROVED)
            ->setStoreId($this->store->getStoreId())
            ->setStores([$this->store->getStoreId()])
            ->save();

        foreach ($reviewFinalData['ratings'] as $ratingId => $optionId) {
            $this->_ratingFactory->create()
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
        /** @var $product \Magento\Catalog\Model\Product */
        $product = $data['product'];
        /** @var $collection \Magento\Review\Model\ResourceModel\Review\Collection */
        $collection = $this->model_store_review->getReviews($product->getId());

        $comments = [];

        /** @var \Magento\Review\Model\Review $comment */
        foreach ($collection->getItems() as $comment) {
            $avg = 0;
            if (count($comment->getRatingVotes())) {
                $ratings = [];
                foreach ($comment->getRatingVotes() as $rating) {
                    $ratings[] = $rating->getPercent();
                }
                $avg = array_sum($ratings) / count($ratings);
            }

            $comments[] = [
                'author' => $comment->getData('nickname'),
                'author_email' => '',
                'created_at' => $comment->getData('created_at'),
                'content' => $comment->getData('detail'),
                'rating' => (float)$avg * 5 / 100
            ];
        }

        return $comments;
    }
}
