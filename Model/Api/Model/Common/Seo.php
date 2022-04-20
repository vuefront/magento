<?php

namespace Vuefront\Vuefront\Model\Api\Model\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;
use \Vuefront\Blog\Model\Post as Post;
use \Vuefront\Blog\Model\Category as BlogCategory;
use \Vuefront\Brands\Model\Brand as Brand;

class Seo extends Model
{
    private $_categoryFactory;
    private $_categoryCollectionFactory;
    private $_blogCategoryCollectionFactory;
    private $_pageCollectionFactory;
    private $_postCollectionFactory;
    private $_productCollectionFactory;
    private $_manufacturerCollectionFactory;
    private $_scopeConfig;
    private $_suffix;

    public function __construct(
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Cms\Model\ResourceModel\Page\CollectionFactory $pageCollectionFactory,
        \Vuefront\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
        \Vuefront\Blog\Model\ResourceModel\Category\CollectionFactory $blogCategoryCollectionFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Vuefront\Brands\Model\ResourceModel\Brand\CollectionFactory $manufacturerCollectionFactory
    ) {
        $this->_blogCategoryCollectionFactory = $blogCategoryCollectionFactory;
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        $this->_categoryFactory = $categoryFactory;
        $this->_scopeConfig = $scopeConfig;
        $this->_pageCollectionFactory = $pageCollectionFactory;
        $this->_postCollectionFactory = $postCollectionFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_manufacturerCollectionFactory = $manufacturerCollectionFactory;
        $this->_suffix = $this->_scopeConfig->getValue('catalog/seo/category_url_suffix');
    }

    public function searchKeyword($keyword)
    {
        $url_key = str_replace($this->_suffix, '', $keyword);
        $url_key = ltrim($url_key, '/');

        $result = $this->_categoryCollectionFactory->create()->addAttributeToFilter('url_key', $url_key)->load();

        if (count($result->getItems()) > 0) {
            $category = $result->getFirstItem();
            return [
                'type' => 'category',
                'id' => $category->getId(),
                'url' => $keyword
            ];
        }

        $result = $this->_productCollectionFactory->create()->addAttributeToFilter('url_key', $url_key)->load();

        if (count($result->getItems()) > 0) {
            $product = $result->getFirstItem();
            return [
                'type' => 'product',
                'id' => $product->getId(),
                'url' => $keyword
            ];
        }

        $result = $this->_pageCollectionFactory->create()
            ->addFieldToFilter('identifier', ['like' => $url_key])->load();

        if (count($result->getItems()) > 0) {
            $page = $result->getFirstItem();
            return [
                'type' => 'page',
                'id' => $page->getId(),
                'url' => $keyword
            ];
        }

        $manufacturer_url = str_replace('/'.Brand::URL_PREFIX, '', $keyword);
        $manufacturer_url = rtrim($manufacturer_url, Brand::URL_EXT);
        $manufacturer_url = ltrim($manufacturer_url, '/');

        $result = $this->_manufacturerCollectionFactory->create()
            ->addFieldToFilter('keyword', ['like' => $manufacturer_url])->load();

        if (count($result->getItems()) > 0) {
            $manufacturer = $result->getFirstItem();
            return [
                'type' => 'manufacturer',
                'id' => $manufacturer->getId(),
                'url' => $keyword
            ];
        }

        $blog_post_url = str_replace('/'.Post::URL_PREFIX, '', $keyword);
        $blog_post_url = rtrim($blog_post_url, Post::URL_EXT);
        $blog_post_url = ltrim($blog_post_url, '/');

        $result = $this->_postCollectionFactory->create()
            ->addFieldToFilter('keyword', ['like' => $blog_post_url])->load();

        if (count($result->getItems()) > 0) {
             $post = $result->getFirstItem();
             return [
                 'type' => 'blog-post',
                 'id' => $post->getId(),
                 'url' => $keyword
             ];
        }

        $blog_category_url = str_replace('/'.BlogCategory::URL_PREFIX, '', $keyword);
        $blog_category_url = rtrim($blog_category_url, BlogCategory::URL_EXT);
        $blog_category_url = ltrim($blog_category_url, '/');

        $result = $this->_blogCategoryCollectionFactory->create()
            ->addFieldToFilter('keyword', ['like' => $blog_category_url])->load();

        if (count($result->getItems()) > 0) {
            $blogCategory = $result->getFirstItem();
            return [
                'type' => 'blog-category',
                'id' => $blogCategory->getId(),
                'url' => $keyword
            ];
        }

        return [
            'type' => '',
            'id' => 0,
            'url' => $keyword
        ];
    }
}
