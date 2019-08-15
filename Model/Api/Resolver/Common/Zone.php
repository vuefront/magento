<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Zone extends Resolver
{
    private $codename = "d_vuefront";

    public function get($args)
    {
        $this->load->model('common/zone');

        /** @var $zone \Magento\Directory\Model\Region */
        if (!isset($args['zone'])) {
            $zone = $this->model_common_zone->getZone($args['id']);
        } else {
            $zone = $args['zone'];
        }

        return [
            'id' => function () use ($zone) {
                return $zone->getId();
            },
            'name' => function () use ($zone) {
                return $zone->getName();
            },
            'countryId' => function () use ($zone) {
                return $zone->getCountryId();
            }
        ];
    }

    public function getList($args)
    {
        $this->load->model('common/zone');
        $zones = [];

        /** @var $collection \Magento\Directory\Model\ResourceModel\Region\Collection */
        $collection = $this->model_common_zone->getZones($args);
        $zone_total = $collection->getSize();

        foreach ($collection->getItems() as $value) {
            $zones[] = $this->get(['zone' => $value]);
        }

        return [
            'content' => $zones,
            'first' => $args['page'] === 1,
            'last' => $args['page'] === ceil($zone_total / $args['size']),
            'number' => (int)$args['page'],
            'numberOfElements' => count($zones),
            'size' => (int)$args['size'],
            'totalPages' => (int)ceil($zone_total / $args['size']),
            'totalElements' => (int)$zone_total,
        ];
    }
}
