<?php

namespace Dreamvention\Vuefront\Module\Model;

use \Dreamvention\Vuefront\Module\Api\GraphqlInterface;
use Magento\Framework\App\Action\Context;

require_once realpath(__DIR__ . '/../../system/startup.php');

class GraphqlModel implements GraphqlInterface
{
    private $scopeConfig;
    private $context;
    private $response;
    private $redirect;
    private $url;
    protected $request;

    public function __construct(
        Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\Webapi\Rest\Response $response,
        \Magento\Framework\Webapi\Rest\Request $request
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->context = $context;
        $this->response = $response;
        $this->request = $request;
        $this->redirect = $context->getRedirect();
        $this->url = $url;
    }

    public function checkCors()
    {
        if (! empty($_GET['cors'])) {
            if (! empty($_SERVER['HTTP_ORIGIN'])) {
                $this->response->setHeader('Access-Control-Allow-Origin', $_SERVER['HTTP_ORIGIN']);
            } else {
                $this->response->setHeader('Access-Control-Allow-Origin', '*');
            }
            $this->response->setHeader('Access-Control-Allow-Methods', 'POST, OPTIONS');
            $this->response->setHeader('Access-Control-Allow-Credentials', 'true');
            $this->response->setHeader('Access-Control-Allow-Headers', 'DNT,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Range,Token,token,Cookie,cookie,content-type');
        }
    }

    public function cors()
    {
        $this->checkCors();
        return;
    }

    public function graphql()
    {
        $enable = $this->scopeConfig->getValue('vuefront/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if ($enable) {
            start();
            exit;

        } else {
            $norouteUrl = $this->url->getUrl('noroute');
            $this->response->setRedirect($norouteUrl);
            return;
        }
    }
}
