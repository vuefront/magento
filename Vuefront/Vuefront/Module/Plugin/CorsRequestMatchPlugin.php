<?php

namespace Vuefront\Vuefront\Module\Plugin;

use Magento\Framework\Webapi\Rest\Request;
use Magento\Webapi\Controller\Rest\Router;

class CorsRequestMatchPlugin
{

    private $request;

    protected $routeFactory;

    public function __construct(
        \Magento\Framework\Webapi\Rest\Request $request,
        \Magento\Framework\Controller\Router\Route\Factory $routeFactory
    ) {
        $this->request = $request;
        $this->routeFactory = $routeFactory;
    }

    public function aroundMatch(
        Router $subject,
        callable $proceed,
        Request $request
    )
    {
        try {
            $returnValue = $proceed($request);
        } catch (\Magento\Framework\Webapi\Exception $e) {
            $requestHttpMethod = $this->request->getHttpMethod();

            if ($requestHttpMethod == 'OPTIONS' && strpos($this->request->getRequestUri(), 'vuefront') > 0) {
                return $this->createRoute();
            } else {
                throw $e;
            }
        }
        return $returnValue;
    }

    protected function createRoute()
    {
        $route = $this->routeFactory->createRoute(
            'Magento\Webapi\Controller\Rest\Router\Route',
            '/V1/vuefront/cors'
        );

        $route->setServiceClass('Vuefront\Vuefront\Module\Api\GraphqlInterface')
            ->setServiceMethod('cors')
            ->setSecure(false)
            ->setAclResources(['anonymous'])
            ->setParameters([]);

        return $route;
    }

}