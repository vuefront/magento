<?php
namespace Dreamvention\Vuefront\Controller\Index;

use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action implements CsrfAwareActionInterface
{
    public function __construct(
        Context $context
  ) {
        return parent::__construct($context);
    }

        
    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        return null;
    }

    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }


    public function execute()
    {
        require_once realpath(__DIR__.'/../../system/startup.php');
        start();
    }
}
