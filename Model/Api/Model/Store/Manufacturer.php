<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;
use \Vuefront\Brands\Model\ResourceModel\Brand\CollectionFactory as BrandCollectionFactory;
use \Vuefront\Brands\Model\Brand;
use \Vuefront\Brands\Model\BrandFactory;
use \Vuefront\Brands\Model\ResourceModel\Brand as ResourceBrand;

class Manufacturer extends Model
{
    /**
     * @var BrandCollectionFactory
     */
    private $_collectionFactory;
    /**
     * @var BrandFactory
     */
    private $_manufacturerFactory;

    /**
     * @var ResourceBrand
     */
    private $_resourceBrand;

    public function __construct(
        BrandCollectionFactory $collectionFactory,
        BrandFactory $manufacturerFactory,
        ResourceBrand $resourceBrand
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_manufacturerFactory = $manufacturerFactory;
        $this->_resourceBrand = $resourceBrand;
    }

    public function getManufacturer($manufacturer_id)
    {
        return $this->_manufacturerFactory->create()->load($manufacturer_id);
    }

    public function getManufacturerByProduct($product_id)
    {
        $table = $this->_resourceBrand->getTable('vuefront_brands_brand_product');
        $brandData = $this->_resourceBrand->getConnection()->
            select()->
            from($table)->
            where('product_id='.$product_id)->
            query()->
            fetch();
        $brandId = 0;
        if ($brandData) {
            $brandId = $brandData['brand_id'];
        }

        return $brandId;
    }

    public function getManufacturers($data = [])
    {
        $collection = $this->_collectionFactory->create();

        $collection->addFieldToSelect('*');

        if (!empty($data['search'])) {
            $collection->addFieldToFilter('name', ['like' => '%' . $data['search'] . '%']);
        }

        if ($data['size'] != '-1') {
            $collection->setPageSize($data['size']);
            $collection->setCurPage($data['page']);
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }

        $sort_data = [
            'id' => 'brand_id',
            'sort_order' => 'date_added'
        ];

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "date_added";
        }

        $collection->setOrder("`" . $sort . "`", $order);

        $collection->load();

        return $collection;
    }
}
