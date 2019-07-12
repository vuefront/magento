<?php

use \Magento\Framework\App\ObjectManager;
use \Magento\Review\Model\Review;

require_once VF_SYSTEM_DIR.'engine/resolver.php';

class ResolverStoreReview extends Resolver
{
    public function add($args)
    {
        $objectManager =ObjectManager::getInstance();

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
        $product = $data['product'];

        $result = $this->model_store_product->getProductReview($product->getId());

        $comments = array();

        foreach ($result as $comment) {
            $comments[] = array(
                'author'       => $comment['author'],
                'author_email' => '',
                'created_at'   => $comment['date_added'],
                'content'      => $comment['content'],
                'rating'       => (float)$comment['rating']
            );
        }

        return $comments;
    }
}
