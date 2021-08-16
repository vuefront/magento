<?php

namespace Vuefront\Vuefront\Model\Api\Model\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Vuefront extends Model
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

    public function editApp($name, $appSetting)
    {
        $appSetting['codename'] = $name;


        $app = $this->_appsFactory->create()->getCollection();
        $app->addFieldToSelect('*');
        $app->addFieldToFilter('codename', ['like' => $name]);
        $result = $app->load();

        $model = $result->getFirstItem();

        foreach ($appSetting as $key => $value) {
            $model->setData($key, $value);
        }

        $model->save();
    }

    public function getApp($name)
    {
        $collection = $this->_appsFactory->create()->getCollection();

        foreach ($collection as $key => $value) {
            $data = $value->getData();

            if ($data['codename'] == $codename) {
                return $value->getData();
            }
        }

        return false;
    }

    public function getAppsForEvent()
    {
        $collection = $this->_appsFactory->create()->getCollection();

        $result = [];
        foreach ($collection as $key => $value) {
            if (!empty($value['eventUrl'])) {
                $result[] = $value;
            }
        }

        return $result;
    }

    public function pushEvent($name, $data)
    {
        $apps = $this->getAppsForEvent();

        foreach ($apps as $key => $value) {
            $output = $this->request($value['eventUrl'], [
                'name' => $name,
                'data' => $data,
            ]);

            if ($output) {
                $data = $output;
            }
        }

        return $data;
    }

    public function request($url, $data, $token = false)
    {
        $this->_curl->addHeader('Content-type', 'application/json');

        if ($token) {
            $this->_curl->addHeader('Authorization', ' Bearer '.$token);
        }

        $this->_curl->post($url, $this->_jsonSerializer->serialize($data));

        $result = $this->_curl->getBody();

        $result = $this->_jsonSerializer->unserialize($result);

        return $result;
    }
}
