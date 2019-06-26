<?php

namespace Dreamvention\Vuefront\Block\Adminhtml\System\Config\Form;

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
            <div class="input-wrapper" style="max-width: 50%; margin: 0 auto;">
                <input type="text" value=" ' . $url . 'vuefront/index/index" readonly class="input-text">
            </div>
        </div>';

        return $html;
    }
}
