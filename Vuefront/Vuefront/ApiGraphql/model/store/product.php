<?php
use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR.'engine/model.php';

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
        $this->_productFactory = $objectManager->get('Magento\Catalog\Model\Product');
    }

    public function getProductImages($product_id)
    {
        $sql = "SELECT
            g.value as image
        FROM
        `".$this->db->getTableName('catalog_product_entity_media_gallery_value_to_entity')."` ge
        LEFT JOIN `".$this->db->getTableName('catalog_product_entity_media_gallery')."` g on
            ge.value_id = g.value_id
        WHERE
            ge.entity_id = '".(int)$product_id."'";

        $product_data = $this->db->fetchAll($sql);

        return $product_data;
    }

    public function getProductReview($product_id)
    {
        $sql = "SELECT r.created_at as date_added, rd.nickname as author, rd.detail as content, rov.value as rating
            FROM `".$this->db->getTableName('review')."` r
            LEFT JOIN `".$this->db->getTableName('review_detail')."` rd ON r.review_id = rd.review_id
            LEFT JOIN `".$this->db->getTableName('rating_option_vote')."` rov ON rov.review_id = r.review_id
            WHERE r.entity_pk_value = '".(int)$product_id."' AND rd.store_id='".$this->store->getStoreId()."'";

        $result = $this->db->fetchAll($sql);
        return $result;
    }

    public function getProductOptions($product_id)
    {
        $sql = "select pe.entity_id as product_id
            from `".$this->db->getTableName('catalog_product_entity')."` pe
            left join `".$this->db->getTableName('catalog_product_relation')."` pr on pe.entity_id = pr.child_id
            where pr.parent_id = '".(int)$product_id."'";
        $result = $this->db->fetchAll($sql);

        return $result;
    }

    public function getSimpleProductOptions($product_id)
    {
        $sql = "SELECT o.option_id, o.product_id, o.`type`, ot.title
                    FROM `".$this->db->getTableName('catalog_product_option')."` o
                    left join `".$this->db->getTableName('catalog_product_option_title')."` ot ON o.option_id = ot.option_id 
                    where o.product_id = '".(int)$product_id."'";

        $result = $this->db->fetchAll($sql);

        return $result;
    }

    public function getOptionValues($option_id)
    {
        $sql = "SELECT ovt.option_type_title_id as option_value_id, ovt.title as name
            FROM `".$this->db->getTableName('catalog_product_option_type_title')."` ovt
            left join `".$this->db->getTableName('catalog_product_option_type_value')."` ov on ov.option_type_id = ovt.option_type_id
            where ov.option_id = '".(int)$option_id."'";

        $result = $this->db->fetchAll($sql);

        return $result;
    }

    public function getProductAttributes($product_id)
    {
        $sql = "SELECT
            ea.attribute_id as id,
            ea.frontend_label as name,
            CASE ea.backend_type
            WHEN 'varchar' THEN ce_varchar.value
            WHEN 'int' THEN ce_int.value
            WHEN 'text' THEN ce_text.value
            WHEN 'decimal' THEN ce_decimal.value
            WHEN 'datetime' THEN ce_datetime.value
            ELSE ea.backend_type
            END AS value
        FROM (
            select cpe.sku, eas.entity_type_id, cpe.entity_id 
                    FROM `".$this->db->getTableName('catalog_product_entity')."` AS cpe, eav_attribute_set AS eas
                    WHERE cpe.attribute_set_id=eas.attribute_set_id) AS ce
            LEFT JOIN `".$this->db->getTableName('eav_attribute')."` AS ea
                ON ce.entity_type_id = ea.entity_type_id and ea.is_user_defined = 1
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_varchar')."` AS ce_varchar
                ON ce.entity_id = ce_varchar.entity_id
                AND ea.attribute_id = ce_varchar.attribute_id
                AND ea.backend_type = 'varchar'
                AND ce_varchar.value IS NOT NULL
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_int')."` AS ce_int
                ON ce.entity_id = ce_int.entity_id
                AND ea.attribute_id = ce_int.attribute_id
                AND ea.backend_type = 'int'
                AND ce_int.value IS NOT NULL
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_text')."` AS ce_text
                ON ce.entity_id = ce_text.entity_id
                AND ea.attribute_id = ce_text.attribute_id
                AND ea.backend_type = 'text'
                AND ce_text.value IS NOT NULL
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_decimal')."` AS ce_decimal
                ON ce.entity_id = ce_decimal.entity_id
                AND ea.attribute_id = ce_decimal.attribute_id
                AND ea.backend_type = 'decimal'
                AND ce_decimal.value IS NOT NULL
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_datetime')."` AS ce_datetime
                ON ce.entity_id = ce_datetime.entity_id
                AND ea.attribute_id = ce_datetime.attribute_id
                AND ea.backend_type = 'datetime'
                AND ce_datetime.value IS NOT NULL
        where ce.entity_id = '".$product_id."'  and CASE ea.backend_type
            WHEN 'varchar' THEN ce_varchar.value
            WHEN 'int' THEN ce_int.value
            WHEN 'text' THEN ce_text.value
            WHEN 'decimal' THEN ce_decimal.value
            WHEN 'datetime' THEN ce_datetime.value
            ELSE ea.backend_type
            END IS NOT NULL";

        return $this->db->fetchAll($sql);
    }

    public function getAttributeValue($option_id)
    {
        return $this->db->fetchOne("SELECT value
            FROM `".$this->db->getTableName('eav_attribute_option_value')."` WHERE option_id='".$option_id."'
        ");
    }
    
    public function getProductRating($product_id)
    {
        $sql = "SELECT rating_summary
            FROM `".$this->db->getTableName('review_entity_summary')."`
            WHERE entity_pk_value = '".$product_id."' and store_id='".$this->store->getStoreId()."'";
        $result = $this->db->fetchOne($sql);

        $rating = 0;

        if (!empty($result)) {
            $rating = $result['rating_summary'] * 5 / 100;
        }

        return $rating;
    }

    public function getProduct($product_id)
    {
        return $this->_productFactory->load($product_id);
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
                ['gt'=>0],
                'left'
            )->addAttributeToFilter(
                'special_from_date',
                ['or' =>
                    [
                        0 =>
                        [
                            'date' => true,
                            'to' => date('Y-m-d', time()).' 23:59:59'
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
                                'from' => date('Y-m-d', time()).' 00:00:00'
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
                    ['attribute' => 'name', 'like' => '%'.$data['search'].'%'],
                    ['attribute' => 'description', 'like' => '%'.$data['search'].'%'],
                    ['attribute' => 'sku', 'like' => '%'.$data['search'].'%']
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
            'special' => 'price',
            'rating' => 'price',
            'date_added' => 'created_at',
            'model' => 'sku',
            'sort_order' => 'entity_id'
        );

        if (isset($data['sort']) && in_array($data['sort'], array_keys($sort_data))) {
            $sort = $sort_data[$data['sort']];
        } else {
            $sort = "entity_id";
        }

        $collection->setOrder($sort, $order);

        $collection->load();

        return $collection;
    }
}
