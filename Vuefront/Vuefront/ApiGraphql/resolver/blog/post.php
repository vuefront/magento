<?php

require_once VF_SYSTEM_DIR.'engine/resolver.php';

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
            $post = $this->model_blog_post->getPost($args['id']);

            if ($post['featured_img']) {
                $thumb     = $this->image->getUrl($post['featured_img'], '');
                $thumbLazy = $this->image->resize($post['featured_img'], 10, 10, '');
            } else {
                $thumb = '';
                $thumbLazy = '';
            }

            $date_format = '%A %d %B %Y';

            return array(
                'id'               => $post['post_id'],
                'name'            => $post['title'],
                'title'            => $post['title'],
                'shortDescription' => $post['short_content'],
                'description'      => $post['content'],
                'keyword'          => $post['identifier'],
                'image'            => $thumb,
                'imageLazy'        => $thumbLazy,
                'rating'           => null,
                'datePublished'    => iconv(
                    mb_detect_encoding(strftime($date_format, strtotime($post['publish_time']))),
                    "utf-8//IGNORE",
                    strftime($date_format, strtotime($post['publish_time']))
                ),
                'categories' => function ($root, $args) {
                    return $this->load->resolver('blog/post/categories', array(
                        'parent' => $root,
                        'args' => $args
                    ));
                },
                'next' => function ($root, $args) {
                    return $this->load->resolver('blog/post/next', array(
                        'parent' => $root,
                        'args' => $args
                    ));
                },
                'prev' => function ($root, $args) {
                    return $this->load->resolver('blog/post/prev', array(
                        'parent' => $root,
                        'args' => $args
                    ));
                },
                'reviews' => function ($root, $args) {
                    return $this->load->resolver('blog/review/get', array(
                        'parent' => $root,
                        'args' => $args
                    ));
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
            'start'         => ($args['page'] - 1) * $args['size'],
            'sort'        => $args['sort'],
            'order'          => $args['order']
        );

            if ($args['category_id'] !== 0) {
                $filter_data['filter_category_id'] = $args['category_id'];
            }
        
            $results = $this->model_blog_post->getPosts($filter_data);
            $product_total = $this->model_blog_post->getTotalPosts($filter_data);

            $posts = array();

            foreach ($results as $post) {
                $posts[] = $this->get(array( 'id' => $post['ID'] ));
            }

            return array(
                'content'          => $posts,
                'first'            => $args['page'] === 1,
                'last'             => $args['page'] === ceil($product_total / $args['size']),
                'number'           => (int) $args['page'],
                'numberOfElements' => count($posts),
                'size'             => (int) $args['size'],
                'totalPages'       => (int) ceil($product_total / $args['size']),
                'totalElements'    => (int) $product_total,
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
            $this->load->model('blog/category');
            $post = $args['parent'];

            $result = $this->model_blog_category->getCategoryByPostId($post['id']);
            $categories = array();
            foreach ($result as $category) {
                $categories[] =$this->load->resolver(
                    'blog/category/get',
                    array('id' => $category['category_id'])
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
            $post = $args['parent'];
            $prev_post_info = $this->model_blog_post->getPrevPost($post['id']);
            if (empty($prev_post_info)) {
                return null;
            }
            return $this->get(array('id' => $prev_post_info['post_id']));
        } else {
            return array();
        }
    }

    public function next($args)
    {
        if ($this->blog) {
            $this->load->model('blog/post');
            $post = $args['parent'];


            $next_post_info = $this->model_blog_post->getNextPost($post['id']);
            if (empty($next_post_info)) {
                return null;
            }
            return $this->get(array('id' => $next_post_info['post_id']));
        } else {
            return array();
        }
    }
}
