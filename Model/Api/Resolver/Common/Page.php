<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Page extends Resolver
{
    public function get($args)
    {
        $this->load->model('common/page');

        /** @var $page \Magento\Cms\Model\Page */
        if (!isset($args['page'])) {
            $page = $this->model_common_page->getPage($args['id']);
        } else {
            $page = $args['page'];
        }

        return [
            'id' => function () use ($page) {
                return $page->getId();
            },
            'title' => function () use ($page) {
                return $page->getTitle();
            },
            'name' => function () use ($page) {
                return $page->getTitle();
            },
            'description' => function () use ($page) {
                return $page->getContent();
            },
            'sort_order' => function () use ($page) {
                return $page->getSortOrder();
            },
            'keyword' => function () use ($page) {
                return $page->getIdentifier();
            },
            'url' => function ($root, $args) use ($page) {
                return $this->url([
                    'parent' => $root,
                    'args' => $args,
                    'page' => $page
                ]);
            },
            'meta' => function () use ($page) {
                return [
                    'title' => $page->getMetaTitle() != '' ? $page->getMetaTitle() : $page->getTitle(),
                    'description' => $page->getMetaDescription(),
                    'keyword' => $page->getMetaKeywords()
                ];
            }
        ];
    }

    public function getList($args)
    {
        $this->load->model('common/page');

        /** @var $collection \Magento\Cms\Model\ResourceModel\Page\Collection */
        $collection = $this->model_common_page->getPages($args);

        $page_total = $collection->getSize();

        $pages = [];

        foreach ($collection->getItems() as $page) {
            $pages[] = $this->get(['page' => $page]);
        }

        return [
            'content' => $pages,
            'first' => $args['page'] === 1,
            'last' => $args['page'] === ceil($page_total / $args['size']),
            'number' => (int)$args['page'],
            'numberOfElements' => count($pages),
            'size' => (int)$args['size'],
            'totalPages' => (int)ceil($page_total / $args['size']),
            'totalElements' => (int)$page_total,
        ];
    }

    public function url($data)
    {
        /** @var $page_info \Magento\Cms\Model\Page */
        $page_info = $data['page'];
        $result = $data['args']['url'];

        $result = str_replace("_id", $page_info->getId(), $result);
        $result = str_replace("_name", $page_info->getTitle(), $result);

        if ($page_info->getIdentifier() != "") {
            $result = '/' . $page_info->getIdentifier();
        }

        return $result;
    }
}
