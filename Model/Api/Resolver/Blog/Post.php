<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Blog;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Post extends Resolver
{
    private $blog = false;

    public function __construct(
        \Magento\Framework\Module\Manager $moduleManager
    ) {
        $this->blog = $moduleManager->isOutputEnabled('Vuefront_Blog');
    }

    public function get($args)
    {
        if ($this->blog) {
            $this->load->model('blog/post');
            /** @var $post \Vuefront\Blog\Model\Post */
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
                    return $post->getShortDescription();
                },
                'description' => function () use ($post) {
                    return $post->getDescription();
                },
                'keyword' => function () use ($post) {
                    return $post->getUrl();
                },
                'datePublished' => function () use ($post) {
                    return $post->getDatePublished();
                },
                'rating' => function () use ($post) {
                    return $post->getRating();
                },
                'image' => function () use ($post) {
                    return $post->getImageUrl();
                },
                'imageLazy' => function () use ($post, $that) {
                    if ($post->getData('image')) {
                        return $that->image->resize(
                            'vuefront_blog/post/image'.$post->getData('image'),
                            10,
                            10
                        );
                    } else {
                        return '';
                    }
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
                        'description' => $post->getMetaDescription() ? $post->getMetaDescription() : '',
                        'keyword' => $post->getMetaKeywords() ? $post->getMetaKeywords() : ''
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
            /** @var $collection \Vuefront\Blog\Model\ResourceModel\Post\Collection */
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
            /** @var $post Vuefront\Blog\Model\Post */
            $post = $args['post'];

            $collection = $post->getCategories();

            $categories = [];
            foreach ($collection as $category) {
                $categories[] = $this->load->resolver(
                    'blog/category/get',
                    ['id' => $category]
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
            /** @var $post Vuefront\Blog\Model\Post */
            $post = $args['post'];
            /** @var $collection \Vuefront\Blog\Model\ResourceModel\Post\Collection */
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
            /** @var $post Vuefront\Blog\Model\Post */
            $post = $args['post'];
            /** @var $collection \Vuefront\Blog\Model\ResourceModel\Post\Collection */
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
        /** @var $category_info \Vuefront\Blog\Model\Post */
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
