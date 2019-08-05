<?php
namespace Vuefront\Vuefront\Controller\Adminhtml\Setting;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        return $resultPage = $this->resultPageFactory->create(false, array('test'=>'test'));
    }
}
?>