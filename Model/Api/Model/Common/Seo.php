<?php

namespace Vuefront\Vuefront\Model\Api\Model\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;
use Magefan\Blog\Model\Url;
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
    private $_url;

    public function __construct(
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Cms\Model\ResourceModel\Page\CollectionFactory $pageCollectionFactory,
        \Magefan\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
        \Magefan\Blog\Model\ResourceModel\Category\CollectionFactory $blogCategoryCollectionFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magiccart\Shopbrand\Model\ResourceModel\Shopbrand\CollectionFactory $manufacturerCollectionFactory,
        Url $url
    ) {
        $this->_blogCategoryCollectionFactory = $blogCategoryCollectionFactory;
        $this->_url = $url;
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

        $result = $this->_manufacturerCollectionFactory->create()
            ->addFieldToFilter('urlkey', ['like' => $url_key])->load();

        if (count($result->getItems()) > 0) {
            $manufacturer = $result->getFirstItem();
            return [
                'type' => 'manufacturer',
                'id' => $manufacturer->getId(),
                'url' => $keyword
            ];
        }

        $blog_post_url = ltrim($keyword, '/'.$this->_url->getRoute());
        $blog_post_url = ltrim($blog_post_url, '/'.$this->_url->getRoute('post'));
        $blog_post_url = rtrim($blog_post_url, $this->_url->getUrlSufix('post'));
        $blog_post_url = ltrim($blog_post_url, '/');

        $result = $this->_postCollectionFactory->create()
            ->addFieldToFilter('identifier', ['like' => $blog_post_url])->load();

        if (count($result->getItems()) > 0) {
            $post = $result->getFirstItem();
            return [
                'type' => 'blog-post',
                'id' => $post->getId(),
                'url' => $keyword
            ];
        }

        $blog_category_url = ltrim($keyword, '/'.$this->_url->getRoute());
        $blog_category_url = ltrim($blog_category_url, '/'.$this->_url->getRoute('category'));
        $blog_category_url = rtrim($blog_category_url, $this->_url->getUrlSufix('category'));
        $blog_category_url = ltrim($blog_category_url, '/');

        $result = $this->_blogCategoryCollectionFactory->create()
            ->addFieldToFilter('identifier', ['like' => $blog_category_url])->load();

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
