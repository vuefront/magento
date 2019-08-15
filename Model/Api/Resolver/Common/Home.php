<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Home extends Resolver
{
    private $codename = "d_vuefront";

    private $_pageFactory;
    private $_scopeConfig;

    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_scopeConfig = $scopeConfig;
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
}
