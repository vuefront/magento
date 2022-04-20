<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Blog;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Category extends Resolver
{
    private $blog = false;

    public function __construct(
        \Magento\Framework\Module\Manager $moduleManager
    ) {
        $this->blog = $moduleManager->isOutputEnabled('Vuefront_Blog');
    }

    public function get($data)
    {
        if ($this->blog) {
            $this->load->model('blog/category');

            /** @var $category \Vuefront\Blog\Model\Category */
            if (!isset($data['category'])) {
                $category = $this->model_blog_category->getCategory($data['id']);
            } else {
                $category = $data['category'];
            }

            $that = $this;

            return [
                'id' => function () use ($category) {
                    return $category->getId();
                },
                'name' => function () use ($category) {
                    return $category->getTitle();
                },
                'description' => function () use ($category) {
                    return $category->getDescription();
                },
                'parent_id' => function () use ($category) {
                    return $category->getParentId();
                },
                'keyword' => function () use ($category) {
                    return $category->getUrl();
                },
                'image' => function () use ($category) {
                    return $category->getImageUrl();
                },
                'imageLazy' => function () use ($category, $that) {
                    if ($category->getData('image')) {
                        return $that->image->resize(
                            'vuefront_blog/category/image'.$category->getData('image'),
                            10,
                            10
                        );
                    } else {
                        return '';
                    }
                },
                'url' => function ($root, $args) use ($category) {
                    return $this->url([
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
                'meta' => function () use ($category) {
                    return [
                        'title' => $category->getMetaTitle() != '' ? $category->getMetaTitle() : $category->getTitle(),
                        'description' => $category->getMetaDescription() ? $category->getMetaDescription() : '',
                        'keyword' => $category->getMetaKeywords() ? $category->getMetaKeywords() : ''
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
            $this->load->model('blog/category');
            $filter_data = [
                'limit' => $args['size'],
                'start' => ($args['page'] - 1) * $args['size'],
                'sort' => $args['sort'],
                'order' => $args['order']
            ];

            if ($args['parent'] !== -1) {
                $filter_data['filter_parent_id'] = $args['parent'];
            }
            /** @var $collection \Vuefront\Blog\Model\ResourceModel\Category\Collection */
            $collection = $this->model_blog_category->getCategories($args);

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
        } else {
            return [
                'content' => []
            ];
        }
    }

    public function child($data)
    {
        $this->load->model('blog/category');
        /** @var $category \Vuefront\Blog\Model\Category */
        $category = $data['category'];

        /** @var $blog_categories \Vuefront\Blog\Model\ResourceModel\Category\Collection */
        $blog_categories = $this->model_blog_category->getCategories(['parent' => $category->getId(), 'size' => -1]);

        $categories = [];

        foreach ($blog_categories->getItems() as $categoryChild) {
            $categories[] = $this->get(['category' => $categoryChild]);
        }

        return $categories;
    }

    public function url($data)
    {
        /** @var $category_info \Vuefront\Blog\Model\Category */
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
