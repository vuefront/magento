<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR.'engine/resolver.php';

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

        if (!empty($product['thumbnail'])) {
            $thumb = $this->image->getUrl($product['thumbnail']);
        } else {
            $thumb = '';
        }
        if (!empty($product['image'])) {
            $thumbBig = $this->image->getUrl($product['image']);
        } else {
            $thumbBig = '';
        }
        $currency = $objectManager->get('Magento\Framework\Pricing\Helper\Data');
        $product_info = array(
            'id'               => $product['product_id'],
            'name'             => $product['name'],
            'description'      => $product['description'],
            'shortDescription' => $product['short_description'],
            'price'            => $currency->currency($product['price'], true, false),
            'special'          => $product['special_price'] ? $currency->currency($product['special_price'], true, false) : '',
            'model'            => $product['model'],
            'image'            => $thumb,
            'imageBig'         => $thumbBig,
            'imageLazy'        => function ($root, $args) use ($product) {
                return !empty($product['thumbnail']) ? $this->image->resize($product['thumbnail'], 10, 10) : '';
            },
            'stock'            => $product['quantity'] > 0,
            'rating'           => (float)$rating,
            'keyword'          => $product['keyword'],
            'images' => function ($root, $args) use ($product) {
                return $this->getImages(array(
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
                ));
            },
            'products' => function ($root, $args) {
                return $this->getRelatedProducts(array(
                    'parent' => $root,
                    'args' => $args
                ));
            },
            'attributes' => function ($root, $args) {
                return $this->getAttributes(array(
                    'parent' => $root,
                    'args' => $args
                ));
            },
            'reviews' => function ($root, $args) {
                return $this->load->resolver('store/review/get', array(
                    'parent' => $root,
                    'args' => $args
                ));
            },
            'options' => function ($root, $args) use ($product) {
                return $this->getOptions(array(
                    'parent' => $root,
                    'args' => $args,
                    'product' => $product
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
            $filter_data['start'] = ((int)$args['page'] - 1) * (int)$args['size'];
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
        $product = $data['parent'];
        $results = $this->model_store_product->getProductAttributes($product['id']);

        $attributes = array();

        foreach ($results as $attribute) {
            $values = explode(',', $attribute['value']);
            $options = array();

            foreach ($values as $option_id) {
                $option_info = $this->model_store_product->getAttributeValue($option_id);
                if (!empty($option_info)) {
                    $options[] = $option_info['value'];
                }
            }
            $attributes[] = array(
                'name'    => (string)$attribute['name'],
                'options' => $options
            );
        }

        return $attributes;
    }
    public function getOptions($data)
    {
        $this->load->model('store/product');
        $product = $data['parent'];
        $product_raw = $data['product'];

        $options = array();

        if (!$product_raw['has_options']) {
            return $options;
        }

       
        $results = $this->model_store_product->getSimpleProductOptions($product['id']);
        foreach ($results as $value) {
            $type = 'text';

            switch ($value['type']) {
                case 'field':
                    $type = 'text';
                    break;
                case 'area':
                    $type = 'textarea';
                    break;
                case 'drop_down':
                    $type = 'select';
                    break;
                case 'multiple':
                    $type = 'checkbox';
                    break;
                case 'date_time':
                    $type = 'datetime';
                    break;
                default:
                    $type = $value['type'];
                    break;
            }

            $values = array();

            $result_values = $this->model_store_product->getOptionValues($value['option_id']);


            foreach ($result_values as $option_value) {
                $values[] = array(
                    'id' => $option_value['option_value_id'],
                    'name' => $option_value['name'],
                );
            }


            $options['option_'.$value['option_id']] = array(
                'id' => 'option_'.$value['option_id'],
                'name' => $value['title'],
                'type' => $type,
                'values' => $values
            );
        }
        if ($product_raw['type'] == 'configurable') {
            $results = $this->model_store_product->getProductOptions($product['id']);

            foreach ($results as $product) {
                $attributes = $this->model_store_product->getProductAttributes($product['product_id']);
                foreach ($attributes as $attribute) {
                    if (!isset($options[$attribute['id']])) {
                        $options[$attribute['id']] = array(
                        'id' => $attribute['id'],
                        'name' => $attribute['name'],
                        'type' => 'radio',
                        'values' => array()
                    );
                    }

                    $values = explode(',', $attribute['value']);

                    foreach ($values as $option_id) {
                        $option_info = $this->model_store_product->getAttributeValue($option_id);
                        if (!empty($option_info)) {
                            $options[$attribute['id']]['values'][$option_id] = array(
                            'id' => $option_id,
                            'name' => $option_info['value']
                        );
                        }
                    }
                }
            }
        }

        

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
            if ($data['product']['image'] !== $image['image']) {
                $images[]           = array(
                'image'     => $this->image->getUrl($image['image']),
                'imageBig'     => $this->image->getUrl($image['image']),
                'imageLazy' => $this->image->resize($image['image'], 10, 10)
            );
            }
        }

        return $images;
    }
}
