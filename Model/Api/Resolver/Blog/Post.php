<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Blog;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Post extends Resolver
{
    private $blog = false;

    public function __construct(
        \Magento\Framework\Module\Manager $moduleManager
    ) {
        $this->blog = $moduleManager->isOutputEnabled('Magefan_Blog');
    }

    public function get($args)
    {
        if ($this->blog) {
            $this->load->model('blog/post');
            /** @var $post \Magefan\Blog\Model\Post */
            if (!isset($args['post'])) {
                $post = $this->model_blog_post->getPost($args['id']);
            } else {
                $post = $args['post'];
            }

            $that = $this;

            return [
                'id' => function () use ($post) {
                    return $post->getId();
                },
                'name' => function () use ($post) {
                    return $post->getTitle();
                },
                'title' => function () use ($post) {
                    return $post->getTitle();
                },
                'shortDescription' => function () use ($post) {
                    return $post->getShortContent();
                },
                'description' => function () use ($post) {
                    return $post->getContent();
                },
                'keyword' => function () use ($post) {
                    return $post->getUrl();
                },
                'datePublished' => function () use ($post) {
                    return $post->getPublishDate('l d F Y');
                },
                'rating' => null,
                'image' => function () use ($post) {
                    return $post->getFeaturedImage() ? $post->getFeaturedImage() : '';
                },
                'imageLazy' => function () use ($post, $that) {
                    if ($post->getData('featured_img')) {
                        $thumbLazy = $that->image->resize($post->getData('featured_img'), 10, 10, '');
                    } else {
                        $thumbLazy = '';
                    }
                    return $thumbLazy;
                },
                'categories' => function ($root, $args) use ($post, $that) {
                    return $that->load->resolver('blog/post/categories', [
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ]);
                },
                'url' => function ($root, $args) use ($post, $that) {
                    return $that->url([
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ]);
                },
                'next' => function ($root, $args) use ($post, $that) {
                    return $that->load->resolver('blog/post/next', [
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ]);
                },
                'prev' => function ($root, $args) use ($that, $post) {
                    return $that->load->resolver('blog/post/prev', [
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ]);
                },
                'reviews' => function ($root, $args) use ($post, $that) {
                    return $that->load->resolver('blog/review/get', [
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ]);
                },
                'meta' => function () use ($post) {
                    return [
                        'title' => $post->getMetaTitle() != '' ? $post->getMetaTitle() : $post->getTitle(),
                        'description' => $post->getMetaDescription(),
                        'keyword' => $post->getMetaKeywords()
                    ];
                }
            ];
        } else {
            return [];
        }
    }

    public function getList($args)
    {
        if ($this->blog) {
            $this->load->model('blog/post');
            $filter_data = [
                'limit' => $args['size'],
                'start' => ($args['page'] - 1) * $args['size'],
                'sort' => $args['sort'],
                'order' => $args['order']
            ];

            if ($args['category_id'] !== 0) {
                $filter_data['filter_category_id'] = $args['category_id'];
            }
            /** @var $collection \Magefan\Blog\Model\ResourceModel\Post\Collection */
            $collection = $this->model_blog_post->getPosts($args);
            $product_total = $collection->getSize();

            $posts = [];

            foreach ($collection->getItems() as $post) {
                $posts[] = $this->get(['post' => $post]);
            }

            return [
                'content' => $posts,
                'first' => $args['page'] === 1,
                'last' => $args['page'] === ceil($product_total / $args['size']),
                'number' => (int)$args['page'],
                'numberOfElements' => count($posts),
                'size' => (int)$args['size'],
                'totalPages' => (int)ceil($product_total / $args['size']),
                'totalElements' => (int)$product_total,
            ];
        } else {
            return [
                'content' => []
            ];
        }
    }

    public function categories($args)
    {
        if ($this->blog) {
            /** @var $post Magefan\Blog\Model\Post */
            $post = $args['post'];

            $collection = $post->getParentCategories();

            $categories = [];
            foreach ($collection->getItems() as $category) {
                $categories[] = $this->load->resolver(
                    'blog/category/get',
                    ['category' => $category]
                );
            }
            return $categories;
        } else {
            return [];
        }
    }

    public function prev($args)
    {
        if ($this->blog) {
            $this->load->model('blog/post');
            /** @var $post Magefan\Blog\Model\Post */
            $post = $args['post'];
            /** @var $collection \Magefan\Blog\Model\ResourceModel\Post\Collection */
            $collection = $this->model_blog_post->getPrevPost($post->getId());
            if ($collection->getSize() == 0) {
                return null;
            }
            return $this->get(['post' => $collection->getFirstItem()]);
        } else {
            return [];
        }
    }

    public function next($args)
    {
        if ($this->blog) {
            $this->load->model('blog/post');
            /** @var $post Magefan\Blog\Model\Post */
            $post = $args['post'];
            /** @var $collection \Magefan\Blog\Model\ResourceModel\Post\Collection */
            $collection = $this->model_blog_post->getNextPost($post->getId());
            if ($collection->getSize() == 0) {
                return null;
            }
            return $this->get(['post' => $collection->getFirstItem()]);
        } else {
            return [];
        }
    }
    public function url($data)
    {
        /** @var $category_info \Magefan\Blog\Model\Post */
        $category_info = $data['post'];
        $result = $data['args']['url'];

        $result = str_replace("_id", $category_info->getId(), $result);
        $result = str_replace("_name", $category_info->getTitle(), $result);

        if ($category_info->getUrl() != "") {
            $result = '/' . $category_info->getUrl();
        }

        return $result;
    }
}
