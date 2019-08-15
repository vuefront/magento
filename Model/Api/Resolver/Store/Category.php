<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Category extends Resolver
{
    private $_scopeConfig;
    private $_suffix;
    private $_imageFactory;
    private $_fileSystem;

    public function __construct(
        \Magento\Framework\Filesystem $fileSystem,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Image\AdapterFactory $imageFactory
    ) {
        $this->_fileSystem = $fileSystem;
        $this->_scopeConfig = $scopeConfig;
        $this->_imageFactory = $imageFactory;
        $this->_suffix = $this->_scopeConfig->getValue('catalog/seo/category_url_suffix');
    }

    public function get($args)
    {
        $this->load->model('store/category');
        /** @var $category \Magento\Catalog\Model\Category */
        if (!isset($args['category'])) {
            $category = $this->model_store_category->getCategory($args['id']);
        } else {
            $category = $args['category'];
        }

        $that = $this;

        return [
            'id' => function () use ($category) {
                return $category->getId();
            },
            'name' => function () use ($category) {
                return $category->getName();
            },
            'description' => function () use ($category) {
                return $category->getDescription();
            },
            'parent_id' => function () use ($category) {
                return $category->getData('parent_id');
            },
            'image' => function () use ($category, $that) {
                return $category->getData('image') ? $that->image->getUrl($category->getData('image')) : '';
            },
            'imageLazy' => function () use ($category, $that) {
                if ($category->getData('image')) {
                    return $that->image->resize($category->getData('image'), 10, 10);
                } else {
                    return '';
                }
            },
            'url' => function ($root, $args) use ($that, $category) {
                return $that->url([
                    'parent' => $root,
                    'args' => $args,
                    'category' => $category
                ]);
            },
            'categories' => function ($root, $args) use ($category) {
                return $this->child([
                    'parent' => $root,
                    'args' => $args,
                    'category' => $category
                ]);
            },
            'keyword' => function () use ($category) {
                return !empty($category->getUrlKey()) ? $category->getUrlKey() . $this->_suffix : "";
            },
            'meta' => function () use ($category) {
                return [
                    'title' => $category->getMetaTitle() != '' ? $category->getMetaTitle() : $category->getName(),
                    'description' => $category->getMetaDescription(),
                    'keyword' => $category->getMetaKeywords()
                ];
            }
        ];
    }

    public function getList($args)
    {
        $this->load->model('store/category');

        $collection = $this->model_store_category->getCategories($args);

        $category_total = $collection->getSize();

        $categories = [];
        foreach ($collection->getItems() as $category) {
            $categories[] = $this->get(['category' => $category]);
        }

        return [
            'content' => $categories,
            'first' => $args['page'] === 1,
            'last' => $args['page'] === ceil($category_total / $args['size']),
            'number' => (int)$args['page'],
            'numberOfElements' => count($categories),
            'size' => (int)$args['size'],
            'totalPages' => (int)ceil($category_total / $args['size']),
            'totalElements' => (int)$category_total,
        ];
    }

    public function child($data)
    {
        $this->load->model('store/category');
        $category = $data['category'];

        $product_categories = $category->getChildrenCategories();
        $categories = [];

        foreach ($product_categories as $category) {
            $categories[] = $this->get(['category' => $category]);
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
            $result = '/' . $category->getUrlKey() . '.html';
        }

        return $result;
    }
}
