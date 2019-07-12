<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/model.php';

/**
 * @property \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $_collectionFactory
 * @property \Magento\Catalog\Model\Product\Visibility $_productVisibility
 * @property Magento\Catalog\Model\CategoryFactory $_categoryFactory
 * @property Magento\Catalog\Model\ProductFactory $_productFactory
 * @property Magento\Catalog\Api\ProductRepositoryInterface $_productRepository
 */
class ModelStoreProduct extends Model
{
    private $_collectionFactory;
    private $_productVisibility;
    private $_productFactory;
    private $_categoryFactory;

    public function __construct($registry)
    {
        parent::__construct($registry);
        $objectManager = ObjectManager::getInstance();
        $this->_collectionFactory = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $this->_productVisibility = $objectManager->get('\Magento\Catalog\Model\Product\Visibility');
        $this->_categoryFactory = $objectManager->get('Magento\Catalog\Model\CategoryFactory');
        $this->_productFactory = $objectManager->get('Magento\Catalog\Model\ProductFactory');
        $this->_productRepository = $objectManager->get('Magento\Catalog\Api\ProductRepositoryInterface');
    }

    public function getProduct($product_id)
    {
        $collection = $this->_collectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addFieldToFilter('entity_id', $product_id);
        return $collection->getFirstItem();
    }

    public function getProducts($data = array())
    {
        if (!empty($data['category_id']) && $data['category_id'] !== 0) {
            $category = $this->_categoryFactory->create()->load($data['category_id']);
            $collection = $category->getProductCollection();
        } else {
            $collection = $this->_collectionFactory->create();
        }

        $collection->setVisibility($this->_productVisibility->getVisibleInSiteIds());
        $collection->addAttributeToSelect('*');

        if ($data['size'] != '-1') {
            $collection->setPage($data['page'], $data['size']);
        }

        if (!empty($data['ids'])) {
            $collection->addAttributeToFilter('entity_id', ['in' => $data['ids']]);
        }

        if (!empty($data['special'])) {
            $collection->addAttributeToFilter(
                'special_price',
                ['gt' => 0],
                'left'
            )->addAttributeToFilter(
                'special_from_date',
                ['or' =>
                    [
                        0 =>
                            [
                                'date' => true,
                                'to' => date('Y-m-d', time()) . ' 23:59:59'
                            ],
                        1 => [
                            'is' => new \Zend_Db_Expr('null')
                        ],
                    ]
                ],
                'left'
            )->addAttributeToFilter(
                'special_to_date',
                [
                    'or' =>
                        [
                            0 =>
                                [
                                    'date' => true,
                                    'from' => date('Y-m-d', time()) . ' 00:00:00'
                                ],
                            1 => [
                                'is' => new \Zend_Db_Expr('null')
                            ],
                        ]
                ],
                'left'
            );
        }

        if (!empty($data['search'])) {
            $collection->addAttributeToFilter(
                [
                    ['attribute' => 'name', 'like' => '%' . $data['search'] . '%'],
                    ['attribute' => 'description', 'like' => '%' . $data['search'] . '%'],
                    ['attribute' => 'sku', 'like' => '%' . $data['search'] . '%']
                ]
            );
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }

        $sort_data = array(
            'id' => 'entity_id',
            'name' => 'name',
            'price' => 'price',
            'special' => 'special_price',
            'rating' => 'price',
            'date_added' => 'created_at',
            'model' => 'sku',
            'sort_order' => 'position'
        );

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "position";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }
}
