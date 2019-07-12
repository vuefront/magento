<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR.'engine/resolver.php';

class ResolverStoreCategory extends Resolver
{
    private $_scopeConfig;
    private $_suffix;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $objectManager =ObjectManager::getInstance();

        $this->_scopeConfig = $objectManager->get('\Magento\Framework\App\Config\ScopeConfigInterface');
        $this->_suffix = $this->_scopeConfig->getValue('catalog/seo/category_url_suffix');
    }

    public function get($args)
    {
        $this->load->model('store/category');

        if (!isset($args['category'])) {
            $category = $this->model_store_category->getCategory($args['id']);
        } else {
            $category = $args['category'];
        }

        $that = $this;

        return array(
            'id'          => function () use ($category) {
                return $category->getId();
            },
            'name'          => function () use ($category) {
                return $category->getName();
            },
            'description'          => function () use ($category) {
                return $category->getDescription();
            },
            'parent_id'          => function () use ($category) {
                return $category->getData('parent_id');
            },
            'image' => function () use ($category, $that) {
                return $category->getData('thumbnail') ? $that->image->getUrl($category->getData('thumbnail')) : '';
            },
            'imageLazy' => function () use ($category, $that) {
                return $category->getData('thumbnail') ? $that->image->resize($category->getData('thumbnail'), 10, 10) : '';
            },
            'url' => function ($root, $args) use ($that, $category) {
                return $that->url(array(
                    'parent' => $root,
                    'args' => $args,
                    'category' => $category
                ));
            },
            'categories' => function ($root, $args) use ($category) {
                return $this->child(array(
                    'parent' => $root,
                    'args' => $args,
                    'category' => $category
                ));
            },
            'keyword' => function () use ($category) {
                return !empty($category->getUrlKey()) ? $category->getUrlKey().$this->_suffix: "";
            }
        );
    }

    public function getList($args)
    {
        $this->load->model('store/category');

        $collection = $this->model_store_category->getCategories($args);

        $category_total = $collection->getSize();
  
        $categories = array();
        foreach ($collection->getItems() as $category) {
            $categories[] = $this->get(array( 'category' => $category ));
        }

        return array(
            'content'          => $categories,
            'first'            => $args['page'] === 1,
            'last'             => $args['page'] === ceil($category_total / $args['size']),
            'number'           => (int) $args['page'],
            'numberOfElements' => count($categories),
            'size'             => (int) $args['size'],
            'totalPages'       => (int) ceil($category_total / $args['size']),
            'totalElements'    => (int) $category_total,
        );
    }

    public function child($data)
    {
        $this->load->model('store/category');
        $category = $data['category'];

        $product_categories = $category->getChildrenCategories();
        $categories = array();

        foreach ($product_categories as $category) {
            $categories[] = $this->get(array( 'category' => $category ));
        }

        return $categories;
    }

    public function url($data)
    {
        $category = $data['category'];
        $result = $data['args']['url'];

        $result = str_replace("_id", $category->getId(), $result);
        $result = str_replace("_name", $category->getName(), $result);

        if ($category->getUrlKey() != '') {
            $result = '/'.$category->getUrlKey().'.html';
        }

        return $result;
    }
}
