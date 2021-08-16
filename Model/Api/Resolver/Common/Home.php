<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Home extends Resolver
{
    private $codename = "d_vuefront";

    private $_pageFactory;
    private $_scopeConfig;
    private $_sessionFactory;

    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Customer\Model\Session $sessionFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_scopeConfig = $scopeConfig;
        $this->_sessionFactory = $sessionFactory;
    }

    public function get($args)
    {
        $page_id = $this->_scopeConfig
            ->getValue('web/default/cms_home_page', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $page = $this->_pageFactory->create()->load($page_id);
        return [
            'meta' => [
                'title' => $page->getMetaTitle() !== '' ? $page->getTitle() : $page->getTitle(),
                'description' => $page->getMetaDescription(),
                'keyword' => $page->getMetaKeywords()
            ]
        ];
    }
    public function searchUrl($args)
    {
        $this->load->model('common/seo');

        $result = $this->model_common_seo->searchKeyword($args['url']);

        return $result;
    }

    public function updateApp($args)
    {
        $this->load->model('common/vuefront');
        $this->moedl->editApp($args['name'], $args['settings']);

        return $this->model_common_vuefront->getApp($args['name']);
    }

    public function authProxy($args)
    {
        $this->load->model('common/d_vuefront');

        if (!$this->_sessionFactory->isLoggedIn()) {
            return;
        }
        $customer = $this->_sessionFactory->getCustomer();
        $app_info = $this->model_common_vuefront->getApp($args['app']);
        $url = str_replace(':id', $customer->getId(), $app_info['authUrl']);
        $result = $this->model_common_vuefront->request($url, [
            'customer_id' => $customer->getId(),
        ], $app_info['jwt']);

        if (!$result) {
            return '';
        }

        return $result['token'];
    }
}
