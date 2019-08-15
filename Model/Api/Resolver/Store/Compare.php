<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Compare extends Resolver
{
    public function add($args)
    {
        $this->load->model('store/compare');

        $this->model_store_compare->addCompare($args['id']);

        return $this->get();
    }

    public function remove($args)
    {
        $this->load->model('store/compare');
        $this->model_store_compare->deleteCompare($args['id']);

        return $this->get();
    }

    public function get($args = [])
    {
        $this->load->model('store/compare');
        $compare = [];
        $results = $this->model_store_compare->getCompare();

        foreach ($results as $product_id) {
            $compare[] = $this->load->resolver('store/product/get', ['id' => $product_id]);
        }

        return $compare;
    }
}
