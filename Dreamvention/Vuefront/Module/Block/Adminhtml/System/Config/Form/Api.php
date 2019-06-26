<?php

namespace Dreamvention\Vuefront\Module\Block\Adminhtml\System\Config\Form;

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
    )
    {
        parent::__construct($context, $data);
        $this->moduleList = $moduleList;

        $this->_storeManager = $storeManager;
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $logo = $this->getViewFileUrl('Dreamvention_Vuefront::images/logo.png');
        $url = $this->_storeManager->getStore()->getBaseUrl();
        $html = '<div>
            <div class="image-wrapper" style="text-align: center;">
                <img src="' . $logo . '" alt="" style="width:200px;">
            </div>
            <div style="padding:10px;background-color:#f8f8f8;border:1px solid #ddd;margin-bottom:7px;">
                Url for access to API: <a href="' . $url . 'rest/V1/vuefront/graphql" target="_blank">' . $url . 'rest/V1/vuefront/graphql</a>
            </div>
        </div>';

        return $html;
    }
}
