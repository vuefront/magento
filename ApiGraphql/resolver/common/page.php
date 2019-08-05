<?php

require_once VF_SYSTEM_DIR . 'engine/resolver.php';

class ResolverCommonPage extends Resolver
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

        return array(
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
            'meta' => function() use ($page) {
                return array(
                    'title' => $page->getMetaTitle() != '' ? $page->getMetaTitle() : $page->getTitle(),
                    'description' => $page->getMetaDescription(),
                    'keyword' => $page->getMetaKeywords()
                );
            }
        );
    }

    public function getList($args)
    {
        $this->load->model('common/page');

        /** @var $collection \Magento\Cms\Model\ResourceModel\Page\Collection */
        $collection = $this->model_common_page->getPages($args);

        $page_total = $collection->getSize();

        $pages = array();

        foreach ($collection->getItems() as $page) {
            $pages[] = $this->get(array('page' => $page));
        }

        return array(
            'content' => $pages,
            'first' => $args['page'] === 1,
            'last' => $args['page'] === ceil($page_total / $args['size']),
            'number' => (int)$args['page'],
            'numberOfElements' => count($pages),
            'size' => (int)$args['size'],
            'totalPages' => (int)ceil($page_total / $args['size']),
            'totalElements' => (int)$page_total,
        );
    }
}