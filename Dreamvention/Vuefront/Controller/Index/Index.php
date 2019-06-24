<?php

namespace Dreamvention\Vuefront\Controller\Index;

use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action implements CsrfAwareActionInterface
{
    private $scopeConfig;
    private $context;
    private $response;
    private $redirect;
    private $url;

    public function __construct(
        Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\UrlInterface $url
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->context = $context;
        $this->response = $context->getResponse();
        $this->redirect = $context->getRedirect();
        $this->url = $url;
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
        $enable = $this->scopeConfig->getValue('vuefront/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if ($enable) {
            require_once realpath(__DIR__ . '/../../system/startup.php');
            start();
        } else {
            $norouteUrl = $this->url->getUrl('noroute');
            $this->response->setRedirect($norouteUrl);
            return;
        }
    }
}
