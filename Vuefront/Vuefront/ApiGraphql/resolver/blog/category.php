<?php

require_once VF_SYSTEM_DIR . 'engine/resolver.php';

class ResolverBlogCategory extends Resolver
{
    private $blog = false;

    public function __construct($registry)
    {
        parent::__construct($registry);
        $moduleManager = \Magento\Framework\App\ObjectManager::getInstance()->get('\Magento\Framework\Module\Manager');

        $this->blog = $moduleManager->isOutputEnabled('Magefan_Blog');
    }

    public function get($data)
    {
        if ($this->blog) {
            $this->load->model('blog/category');
            /** @var $category Magefan\Blog\Model\Category */
            if (!isset($data['category'])) {
                $category = $this->model_blog_category->getCategory($data['id']);
            } else {
                $category = $data['category'];
            }

            return array(
                'id' => function () use ($category) {
                    return $category->getId();
                },
                'name' => function () use ($category) {
                    return $category->getTitle();
                },
                'description' => function () use ($category) {
                    return $category->getContent();
                },
                'parent_id' => function () use ($category) {
                    return $category->getParentId();
                },
                'keyword' => function () use ($category) {
                    return $category->getUrl();
                },
                'image' => '',
                'imageLazy' => '',
                 'url'            => function ($root, $args) use ($category) {
                     return $this->url(array(
                         'parent' => $root,
                         'args'   => $args,
                         'category' => $category
                     ));
                 },
                'categories' => function ($root, $args) use ($category) {
                    return $this->child(array(
                        'parent' => $root,
                        'args' => $args,
                        'category' => $category
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
            $this->load->model('blog/category');
            $filter_data = array(
                'limit' => $args['size'],
                'start' => ($args['page'] - 1) * $args['size'],
                'sort' => $args['sort'],
                'order' => $args['order']
            );

            if ($args['parent'] !== -1) {
                $filter_data['filter_parent_id'] = $args['parent'];
            }

            /** @var $collection \Magefan\Blog\Model\ResourceModel\Category\Collection */
            $collection = $this->model_blog_category->getCategories($args);

            $category_total = $collection->getSize();

            $categories = array();

            foreach ($collection->getItems() as $category) {
                $categories[] = $this->get(array('category' => $category));
            }

            return array(
                'content' => $categories,
                'first' => $args['page'] === 1,
                'last' => $args['page'] === ceil($category_total / $args['size']),
                'number' => (int)$args['page'],
                'numberOfElements' => count($categories),
                'size' => (int)$args['size'],
                'totalPages' => (int)ceil($category_total / $args['size']),
                'totalElements' => (int)$category_total,
            );
        } else {
            return array(
                'content' => array()
            );
        }
    }

    public function child($data)
    {
        $this->load->model('blog/category');
        /** @var $category \Magefan\Blog\Model\Category */
        $category = $data['category'];

        /** @var $blog_categories \Magefan\Blog\Model\ResourceModel\Category\Collection */
        $blog_categories = $this->model_blog_category->getCategories(array('parent' => $category->getId(), 'size' => -1));

        $categories = array();

        foreach ($blog_categories->getItems() as $categoryChild) {
            $categories[] = $this->get(array('category' => $categoryChild));
        }

        return $categories;
    }

    public function url($data)
    {
        /** @var $category_info Magefan\Blog\Model\Category */
        $category_info = $data['category'];
        $result = $data['args']['url'];

        $result = str_replace("_id", $category_info->getId(), $result);
        $result = str_replace("_name", $category_info->getTitle(), $result);

        if ($category_info->getUrl() != "") {
            $result = '/' . $category_info->getUrl();
        }

        return $result;
    }
}
