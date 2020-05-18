<?php

namespace Vuefront\Vuefront\Model\Api\System\Engine;

class Loader
{
    protected $registry;
    protected $resolvers = [];
    protected $models = [];

    public function __construct(
        \Vuefront\Vuefront\Model\Api\System\Engine\Registry $registry,
        \Vuefront\Vuefront\Model\Api\Resolver\Startup\Startup $startup,
        \Vuefront\Vuefront\Model\Api\Resolver\Blog\Category $blogCategory,
        \Vuefront\Vuefront\Model\Api\Resolver\Blog\Post $postBlog,
        \Vuefront\Vuefront\Model\Api\Resolver\Blog\Review $reviewBlog,
        \Vuefront\Vuefront\Model\Api\Resolver\Common\Account $account,
        \Vuefront\Vuefront\Model\Api\Resolver\Common\Contact $contact,
        \Vuefront\Vuefront\Model\Api\Resolver\Common\Country $country,
        \Vuefront\Vuefront\Model\Api\Resolver\Common\File $file,
        \Vuefront\Vuefront\Model\Api\Resolver\Common\Home $home,
        \Vuefront\Vuefront\Model\Api\Resolver\Common\Language $language,
        \Vuefront\Vuefront\Model\Api\Resolver\Common\Page $page,
        \Vuefront\Vuefront\Model\Api\Resolver\Common\Zone $zone,
        \Vuefront\Vuefront\Model\Api\Resolver\Store\Cart $cart,
        \Vuefront\Vuefront\Model\Api\Resolver\Store\Category $category,
        \Vuefront\Vuefront\Model\Api\Resolver\Store\Checkout $checkout,
        \Vuefront\Vuefront\Model\Api\Resolver\Store\Compare $compare,
        \Vuefront\Vuefront\Model\Api\Resolver\Store\Currency $currency,
        \Vuefront\Vuefront\Model\Api\Resolver\Store\Product $product,
        \Vuefront\Vuefront\Model\Api\Resolver\Store\Review $review,
        \Vuefront\Vuefront\Model\Api\Resolver\Store\Wishlist $wishList,
        \Vuefront\Vuefront\Model\Api\Model\Startup\Startup $modelStartup,
        \Vuefront\Vuefront\Model\Api\Model\Blog\Category $modelBlogCategory,
        \Vuefront\Vuefront\Model\Api\Model\Blog\Post $modelBlogPost,
        \Vuefront\Vuefront\Model\Api\Model\Common\Address $modelCommonAddress,
        \Vuefront\Vuefront\Model\Api\Model\Common\Country $modelCommonCountry,
        \Vuefront\Vuefront\Model\Api\Model\Common\Page $modelCommonPage,
        \Vuefront\Vuefront\Model\Api\Model\Common\Zone $modelCommonZone,
        \Vuefront\Vuefront\Model\Api\Model\Store\Category $modelStoreCategory,
        \Vuefront\Vuefront\Model\Api\Model\Store\Compare $modelStoreCompare,
        \Vuefront\Vuefront\Model\Api\Model\Store\Product $modelStoreProduct,
        \Vuefront\Vuefront\Model\Api\Model\Store\Review $modelStoreReview,
        \Vuefront\Vuefront\Model\Api\Model\Store\Wishlist $modelStoreWishlist,
        \Vuefront\Vuefront\Model\Api\Model\Store\Checkout $modelStoreCheckout
    ) {
        $this->resolvers['Blog\Post'] = $postBlog;
        $this->resolvers['Blog\Category'] = $blogCategory;
        $this->resolvers['Blog\Review'] = $reviewBlog;
        $this->resolvers['Common\Account'] = $account;
        $this->resolvers['Common\Contact'] = $contact;
        $this->resolvers['Common\Country'] = $country;
        $this->resolvers['Common\File'] = $file;
        $this->resolvers['Common\Home'] = $home;
        $this->resolvers['Common\Language'] = $language;
        $this->resolvers['Common\Page'] = $page;
        $this->resolvers['Common\Zone'] = $zone;
        $this->resolvers['Store\Cart'] = $cart;
        $this->resolvers['Store\Category'] = $category;
        $this->resolvers['Store\Checkout'] = $checkout;
        $this->resolvers['Store\Compare'] = $compare;
        $this->resolvers['Store\Currency'] = $currency;
        $this->resolvers['Store\Product'] = $product;
        $this->resolvers['Store\Review'] = $review;
        $this->resolvers['Store\Wishlist'] = $wishList;
        $this->resolvers['Startup\Startup'] = $startup;

        $this->models['Startup\Startup'] = $modelStartup;
        $this->models['Blog\Category'] = $modelBlogCategory;
        $this->models['Blog\Post'] = $modelBlogPost;
        $this->models['Common\Address'] = $modelCommonAddress;
        $this->models['Common\Country'] = $modelCommonCountry;
        $this->models['Common\Page'] = $modelCommonPage;
        $this->models['Common\Zone'] = $modelCommonZone;
        $this->models['Store\Category'] = $modelStoreCategory;
        $this->models['Store\Compare'] = $modelStoreCompare;
        $this->models['Store\Product'] = $modelStoreProduct;
        $this->models['Store\Review'] = $modelStoreReview;
        $this->models['Store\Wishlist'] = $modelStoreWishlist;
        $this->models['Store\Checkout'] = $modelStoreCheckout;

        $this->registry = $registry;
    }

    public function resolver($route, $data = [])
    {
        $route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

        $route = explode('/', $route);

        $route = array_map(function ($value) {
            return ucfirst($value);
        }, $route);
        $route = implode('\\', $route);

        $method = 'index';

        if (!class_exists('\Vuefront\Vuefront\Model\Api\Resolver\\' . $route)) {
            $route = explode('\\', $route);
            $method = array_pop($route);
            $route = implode('\\', $route);
        }

        $resolver =  $this->resolvers[$route];
        $resolver->initRegistry($this->registry);
        $output = $resolver->{$method}($data);

        if (!$output instanceof \Exception) {
            return $output;
        }

        return '';
    }

    public function model($route)
    {
        $route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

        $route = explode('/', $route);

        $route = array_map(function ($value) {
            return ucfirst($value);
        }, $route);
        $route = implode('\\', $route);

        $model = $this->models[$route];
        $model->initRegistry($this->registry);

        $route =  str_replace('/', '_', (string)$route);
        $route =  str_replace('\\', '_', (string)$route);
        $route = strtolower($route);
        $this->registry->set('model_' . $route, $model);

        return '';
    }
}
