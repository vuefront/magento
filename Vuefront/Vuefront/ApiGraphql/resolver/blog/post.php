<?php

require_once VF_SYSTEM_DIR . 'engine/resolver.php';

class ResolverBlogPost extends Resolver
{
    private $blog = false;

    public function __construct($registry)
    {
        parent::__construct($registry);
        $moduleManager = \Magento\Framework\App\ObjectManager::getInstance()->get('\Magento\Framework\Module\Manager');

        $this->blog = $moduleManager->isOutputEnabled('Magefan_Blog');
    }

    public function get($args)
    {
        if ($this->blog) {
            $this->load->model('blog/post');
            /** @var $post Magefan\Blog\Model\Post */
            if (!isset($args['post'])) {
                $post = $this->model_blog_post->getPost($args['id']);
            } else {
                $post = $args['post'];
            }

            $that = $this;

            return array(
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
                    return $that->load->resolver('blog/post/categories', array(
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ));
                },
                'next' => function ($root, $args) use ($post, $that) {
                    return $that->load->resolver('blog/post/next', array(
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ));
                },
                'prev' => function ($root, $args) use ($that, $post) {
                    return $that->load->resolver('blog/post/prev', array(
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ));
                },
                'reviews' => function ($root, $args) use ($post, $that) {
                    return $that->load->resolver('blog/review/get', array(
                        'parent' => $root,
                        'args' => $args,
                        'post' => $post
                    ));
                },
                'meta' => function() use ($post) {
                    return array(
                        'title' => $post->getMetaTitle() != '' ? $post->getMetaTitle() : $post->getTitle(),
                        'description' => $post->getMetaDescription(),
                        'keyword' => $post->getMetaKeywords()
                    );
                }
            );
        } else {
            return array();
        }
    }

    public function getList($args)
    {
        if ($this->blog) {
            $this->load->model('blog/post');
            $filter_data = array(
                'limit' => $args['size'],
                'start' => ($args['page'] - 1) * $args['size'],
                'sort' => $args['sort'],
                'order' => $args['order']
            );

            if ($args['category_id'] !== 0) {
                $filter_data['filter_category_id'] = $args['category_id'];
            }
            /** @var $collection \Magefan\Blog\Model\ResourceModel\Post\Collection */
            $collection = $this->model_blog_post->getPosts($args);
            $product_total = $collection->getSize();

            $posts = array();

            foreach ($collection->getItems() as $post) {
                $posts[] = $this->get(array('post' => $post));
            }

            return array(
                'content' => $posts,
                'first' => $args['page'] === 1,
                'last' => $args['page'] === ceil($product_total / $args['size']),
                'number' => (int)$args['page'],
                'numberOfElements' => count($posts),
                'size' => (int)$args['size'],
                'totalPages' => (int)ceil($product_total / $args['size']),
                'totalElements' => (int)$product_total,
            );
        } else {
            return array(
                'content' => array()
            );
        }
    }

    public function categories($args)
    {
        if ($this->blog) {
            /** @var $post Magefan\Blog\Model\Post */
            $post = $args['post'];

            $collection = $post->getParentCategories();

            $categories = array();
            foreach ($collection->getItems() as $category) {
                $categories[] = $this->load->resolver(
                    'blog/category/get',
                    array('category' => $category)
                );
            }
            return $categories;
        } else {
            return array();
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
            return $this->get(array('post' => $collection->getFirstItem()));
        } else {
            return array();
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
            return $this->get(array('post' => $collection->getFirstItem()));
        } else {
            return array();
        }
    }
}
