<?php

use \Magento\Framework\App\ObjectManager;
use \Magento\Framework\UrlInterface;

class ResolverStoreProduct extends Resolver
{
    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->load->model('store/product');
    }

    public function get($args)
    {
        $product = $this->model_store_product->getProduct($args['id']);
        $rating = $this->model_store_product->getProductRating($args['id']);

        $objectManager =ObjectManager::getInstance();
        $store = $objectManager->get('Magento\Store\Model\StoreManagerInterface')->getStore();
        $thumb = $this->image->getUrl($product['thumbnail']);
        $thumbBig = $this->image->getUrl($product['image']);
        $currency = $objectManager->get('Magento\Framework\Pricing\Helper\Data');
        $product_info = array(
            'id'               => $product['product_id'],
            'name'             => $product['name'],
            'description'      => $product['description'],
            'shortDescription' => $product['short_description'],
            'price'            => $currency->currency($product['price'], true, false),
            'special'          => $product['special_price'] ? $currency->currency($product['special_price'], true, false) : null,
            'model'            => $product['model'],
            'image'            => $thumb,
            'imageBig'         => $thumbBig,
            'imageLazy'        => function($root, $args) use ($product){
                return $this->image->resize($product['thumbnail'], 10, 10);
            },
            'stock'            => $product['quantity'] > 0,
            'rating'           => (float)$rating,
            'keyword'          => $product['keyword'],
            'images' => function($root, $args) {
                return $this->getImages(array(
                    'parent' => $root,
                    'args' => $args
                ));
            },
            'products' => function($root, $args) {
                return $this->getRelatedProducts(array(
                    'parent' => $root,
                    'args' => $args
                ));
            },
            'attributes' => function($root, $args) {
                return $this->getAttributes(array(
                    'parent' => $root,
                    'args' => $args
                ));
            },
            'reviews' => function($root, $args) {
                return $this->load->resolver('store/review/get', array(
                    'parent' => $root,
                    'args' => $args
                ));
            },
            'options' => function($root, $args) {
                return $this->getOptions(array(
                    'parent' => $root,
                    'args' => $args
                ));
            }
        );

        return $product_info;
    }
    public function getList($args)
    {
        $this->load->model('store/product');
        $filter_data = array(
            'sort'  => $args['sort'],
            'order' => $args['order'],
        );

        if ($args['size'] != '-1') {
            $filter_data['start'] = $args['page'];
            $filter_data['limit'] = $args['size'];
        }

        if ($filter_data['sort'] == 'id') {
            $filter_data['sort'] = 'product_id';
        }

        if ($args['category_id'] !== 0) {
            $filter_data['filter_category_id'] = $args['category_id'];
        }

        if (!empty($args['ids'])) {
            $filter_data['filter_ids'] = $args['ids'];
        }

        if (!empty($args['special'])) {
            $filter_data['filter_special'] = true;
        }

        if (!empty($args['search'])) {
            $filter_data['filter_search'] = $args['search'];
        }

        $results = $this->model_store_product->getProducts($filter_data);
        $product_total = $this->model_store_product->getTotalProducts($filter_data);
        $products = [];
        foreach ($results as $product) {
            $products[] = $this->get(array( 'id' => $product['product_id'] ));
        }

        return array(
            'content'          => $products,
            'first'            => $args['page'] === 1,
            'last'             => $args['page'] === ceil($product_total / $args['size']),
            'number'           => (int) $args['page'],
            'numberOfElements' => count($products),
            'size'             => (int) $args['size'],
            'totalPages'       => (int) ceil($product_total / $args['size']),
            'totalElements'    => (int) $product_total,
        );
    }
    public function getRelatedProducts($data)
    {
        $product = $data['parent'];
        $args = $data['args'];

        $upsell_ids = $this->model_store_product->getProductRelated($product['id']);

        $upsell_ids = array_slice($upsell_ids, 0, $args['limit']);

        $products = array();

        foreach ($upsell_ids as $product) {
            $products[] = $this->get(array( 'id' => $product['product_id'] ));
        }


        return $products;
    }
    public function getAttributes($data)
    {
        // $product = $data['parent'];
        // $results = $this->model_store_product->getProductAttributes($product['id']);

        $attributes = array();

        // foreach ($results as $attribute) {
        //     if (!$attribute['is_variation'] && $attribute['is_visible']) {
        //         $attributes[] = array(
        //             'name'    => $attribute['name'],
        //             'options' => explode('|', $attribute['value'])
        //         );
        //     }
        // }

        return $attributes;
    }
    public function getOptions($data)
    {
        // $this->load->model('store/option');
        // $product = $data['parent'];

        // $results = $this->model_store_product->getProductAttributes($product['id']);

        $options = array();


        // foreach ($results as $attribute) {
        //     if ($attribute['is_variation'] && $attribute['is_visible']) {
        //         $option_values = array();
        //         if ($attribute['is_taxonomy']) {
        //             $result_values = $this->model_store_product->getOptionValues($attribute['name']);
        //             $name = $this->model_store_option->getOptionLabel($attribute['name']);

        //             foreach ($result_values as $value) {
        //                 $option_values[] = array(
        //                     'id'   => $value->slug,
        //                     'name' => $value->name
        //                 );
        //             }
        //         } else {
        //             $name = $attribute['name'];
        //             $result_values = explode('|', $attribute['value']);
        //             foreach ($result_values as $value) {
        //                 $option_values[] = array(
        //                     'id'   => $value,
        //                     'name' => $value
        //                 );
        //             }
        //         }

        //         $options[] = array(
        //             'id'     => 'attribute_' . sanitize_title($attribute['name']),
        //             'type'   => 'radio',
        //             'name'   => $name,
        //             'values' => $option_values
        //         );
        //     }
        // }

        return $options;
    }
    public function getImages($data)
    {
        $product = $data['parent'];
        $args = $data['args'];
        
        $image_ids = $this->model_store_product->getProductImages($product['id']);

        $image_ids = array_slice($image_ids, 0, $args['limit']);

        $images = array();
        
        foreach ($image_ids as $image) {
            $images[]           = array(
                'image'     => $this->image->getUrl($image['image']),
                'imageBig'     => $this->image->getUrl($image['image']),
                'imageLazy' => $this->image->resize($image['image'], 10, 10)
            );
        }

        return $images;
    }
}
