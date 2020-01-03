<?php

namespace Vuefront\Vuefront\Model;

use Magento\Framework\App\Action\Context;
use Vuefront\Vuefront\Api\GraphqlInterface;

class GraphqlModel implements GraphqlInterface
{
    private $scopeConfig;
    private $context;
    private $response;
    private $redirect;
    private $url;
    private $driver;
    protected $request;
    protected $startup;
    protected $collectionFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\Webapi\Rest\Response $response,
        \Magento\Framework\Webapi\Rest\Request $request,
        \Magento\Framework\Filesystem\Driver\File $driver,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productFactory,
        \Vuefront\Vuefront\Model\Api\System\Startup $startup
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->context = $context;
        $this->response = $response;
        $this->request = $request;
        $this->redirect = $context->getRedirect();
        $this->url = $url;
        $this->startup = $startup;
        $this->driver = $driver;
        $this->collectionFactory = $productFactory;
    }

    public function checkCors()
    {
        if (!empty($this->request->get('cors'))) {
            if (!empty($this->request->getServer('HTTP_ORIGIN'))) {
                $this->response->setHeader('Access-Control-Allow-Origin', $this->request->getServer('HTTP_ORIGIN'));
            } else {
                $this->response->setHeader('Access-Control-Allow-Origin', '*');
            }
            $this->response->setHeader('Access-Control-Allow-Methods', 'POST, OPTIONS, GET');
            $this->response->setHeader('Access-Control-Allow-Credentials', 'true');
            $this->response->setHeader(
                'Access-Control-Allow-Headers',
                'DNT,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,' .
                'Content-Type,Range,Token,token,Cookie,cookie,content-type,Authorization'
            );
        }
    }

    public function cors()
    {
        $this->checkCors();
        return '';
    }

    public function graphql()
    {
        $this->checkCors();

        $enable = $this->scopeConfig
            ->getValue('vuefront/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if ($enable) {
            $output = $this->startup->start($this->request->getBodyParams(), $this->driver);

            return $output;
        } else {
            $norouteUrl = $this->url->getUrl('noroute');
            $this->response->setRedirect($norouteUrl);
            return;
        }
    }
}
