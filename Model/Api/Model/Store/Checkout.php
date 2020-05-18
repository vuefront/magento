<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Checkout extends Model
{
    private $_appsFactory;

    private $_jsonSerializer;

    private $_curl;

    public function __construct(
        \Vuefront\Vuefront\Model\AppsFactory $appsFactory,
        \Magento\Framework\HTTP\Client\Curl $curl,
        \Magento\Framework\Serialize\Serializer\Json $jsonSerializer
    ) {
        $this->_appsFactory = $appsFactory;
        $this->_curl = $curl;
        $this->_jsonSerializer = $jsonSerializer;
    }

    public function getJwt($codename) {

        $collection = $this->_appsFactory->create()->getCollection();

        $jwt = '';

        foreach ($collection as $key => $value) {
            $data = $value->getData();

            if($data['codename'] == $codename) {
                $jwt = $data['jwt'];
            }
        }

        return $jwt;
    }

    public function requestCheckout($query, $variables) {
        $jwt = $this->getJwt('vuefront-checkout-app');

        $requestData = array(
            'operationName' => null,
            'variables' => $variables,
            'query' => $query
        );

        $headr = array();

        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: '.$jwt;

        $this->_curl->addHeader('Content-type', 'application/json');
        $this->_curl->addHeader('Authorization', $jwt);
        $this->_curl->post('https://api.checkout.vuefront.com/graphql', $this->_jsonSerializer->serialize($requestData));

        $result = $this->_curl->getBody();

        $result = $this->_jsonSerializer->unserialize($result);

        return $result['data'];
    }
}
