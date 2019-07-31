<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/resolver.php';
/**
 * @property \Magento\Cms\Model\PageFactory $_pageFactory
 * @property \Magento\Framework\App\Config\ScopeConfigInterface $_scopeConfig
 */
class ResolverCommonHome extends Resolver
{
    private $codename = "d_vuefront";

    private $_pageFactory;
    private $_scopeConfig;

    public function __construct($registry)
    {
        parent::__construct($registry);
        $objectManager = ObjectManager::getInstance();
        $this->_pageFactory = $objectManager->get('\Magento\Cms\Model\PageFactory');
        $this->_scopeConfig = $objectManager->get('\Magento\Framework\App\Config\ScopeConfigInterface');
    }

    public function get($args)
    {
        $page_id = $this->_scopeConfig->getValue('web/default/cms_home_page', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $page = $this->_pageFactory->create()->load($page_id);
        return array(
            'meta' => array(
                'title' => $page->getMetaTitle() !== ''? $page->getTitle() : $page->getTitle(),
                'description' => $page->getMetaDescription(),
                'keyword' => $page->getMetaKeywords()
            )
        );
    }
}