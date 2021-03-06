<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Country extends Resolver
{
    private $codename = "d_vuefront";

    public function get($args)
    {
        $this->load->model('common/country');

        /** @var $country \Magento\Directory\Model\Country */
        if (!isset($args['country'])) {
            $country = $this->model_common_country->getCountry($args['id']);
        } else {
            $country = $args['country'];
        }

        return [
            'id' => function () use ($country) {
                return $country->getId();
            },
            'name' => function () use ($country) {
                return $country->getName();
            }
        ];
    }

    public function getList($args)
    {
        $this->load->model('common/country');
        $countries = [];

        /** @var $collection \Magento\Directory\Model\ResourceModel\Country\Collection */
        $collection = $this->model_common_country->getCountries($args);
        $country_total = $collection->getSize();

        foreach ($collection->getItems() as $value) {
            $countries[] = $this->get(['country' => $value]);
        }

        return [
            'content' => $countries,
            'first' => $args['page'] === 1,
            'last' => $args['page'] === ceil($country_total / $args['size']),
            'number' => (int)$args['page'],
            'numberOfElements' => count($countries),
            'size' => (int)$args['size'],
            'totalPages' => (int)ceil($country_total / $args['size']),
            'totalElements' => (int)$country_total,
        ];
    }
}
