<?php

namespace Vuefront\Vuefront\Module\Block\Adminhtml\System\Config\Form;

use Magento\Framework\View\Result\PageFactory;
use Magento\Store\Model\ScopeInterface;

class Api extends \Magento\Config\Block\System\Config\Form\Field
{
    protected $moduleList;

    protected $metadata;

    protected $_storeManager;
    protected $_resultPageFactory;


    public function __construct(
        \Magento\Framework\Module\ModuleListInterface $moduleList,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        PageFactory $resultPageFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->moduleList = $moduleList;

        $this->_storeManager = $storeManager;
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $logo = $this->getViewFileUrl('Vuefront_Vuefront::images/logo.png');
        $url = $this->_storeManager->getStore()->getBaseUrl();
        $html = '<div>
            <div class="image-wrapper" style="text-align: center;">
                <img src="' . $logo . '" alt="" style="width:200px;">
            </div>
            <div style="padding:10px;background-color:#f8f8f8;border:1px solid #ddd;margin-bottom:7px;">
                CMS Connect URL: <a href="' . $url . 'rest/V1/vuefront/graphql" target="_blank">' . $url . 'rest/V1/vuefront/graphql</a>
            </div>
            <div style="margin-bottom: 5px;">
                This is your CMS Connect URL link that shares your Store data via GraphQL. When installing VueFront via the command line, you will be prompted to enter this URL. Simply copy and paste it into the command line. 
            </div>
            <div style="margin-bottom: 20px;">
                Read more about the <a href="https://vuefront.com/cms/magento.html" target="_blank">CMS Connect for Magento</a>
            </div>
            <hr/>
            <div style="float: none; font-size: 14px; font-weight: 600;margin-bottom: 10px;">
                Blog support
            </div>
            <div>
                VueFront relies on the free <a href="https://marketplace.magento.com/magefan-module-blog.html
" target="_blank">Blog Module</a> by MegaFan to implement blog support. The blog feature is optional and VueFront will work fine without it. You can install it via Composer or Magento Marketplace.
            </div>
        </div>';

        return $html;
    }
}
