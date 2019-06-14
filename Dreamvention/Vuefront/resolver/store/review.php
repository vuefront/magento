<?php

use \Magento\Framework\App\ObjectManager;

class ResolverStoreReview extends Resolver
{
    public function add($args)
    {
        $time = current_time('mysql');

        $data = array(
            'comment_post_ID' => $args['id'],
            'comment_author'  => $args['author'],
            'comment_content' => $args['content'],
            'comment_date'    => $time,
        );

        $comment_id = wp_insert_comment($data);

        add_comment_meta($comment_id, 'rating', $args['rating']);

        return $this->load->resolver('store/product/get', $args);
    }

    public function get($data)
    {
        $product = $data['parent'];

        // $product = $this->model_store_product->getProduct($product['id']);

        // $objectManager  = ObjectManager::getInstance();

        // $storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
        // $currentStoreId = $storeManager->getStore()->getId();

        // $rating = $objectManager->get("Magento\Review\Model\ResourceModel\Review\CollectionFactory");
        // $collection = $rating->create()->addStoreFilter(
        //     $currentStoreId
        //     )->addStatusFilter(
        //         \Magento\Review\Model\Review::STATUS_APPROVED
        //     )->addEntityFilter(
        //         'product',
        //         $product->getId()
        //     )->setDateOrder();
        // $result = $collection->getData();

        $comments = array();

        // foreach ($result as $comment) {
            // $rating_info = $objectManager->create('Magento\Review\Model\ResourceModel\Rating\Option\Vote\Collection')->addRatingInfo()->addOptionInfo()->addRatingOptions()->addFieldToFilter('review_id', $comment['review_id'])->getData();
            // $comments[] = array(
            //     'author'       => $comment['nickname'],
            //     'author_email' => '',
            //     'created_at'   => $comment['created_at'],
            //     'content'      => $comment['detail'],
            //     'rating'       => (float)$rating_info[0]['value']
            // );
        // }

        return $comments;
    }
}
