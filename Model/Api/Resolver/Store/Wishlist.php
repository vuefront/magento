<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Wishlist extends Resolver
{
    public function add($args)
    {
        $this->load->model('store/wishlist');

        $this->model_store_wishlist->addWishlist($args['id']);

        return $this->getList();
    }

    public function remove($args)
    {
        $this->load->model('store/wishlist');
        $this->model_store_wishlist->deleteWishlist($args['id']);

        return $this->getList();
    }

    public function getList($args = [])
    {
        $this->load->model('store/wishlist');
        $wishlist = [];
        $results = $this->model_store_wishlist->getWishlist();

        foreach ($results as $product_id) {
            $wishlist[] = $this->load->resolver('store/product/get', ['id' => $product_id]);
        }

        return $wishlist;
    }
}
