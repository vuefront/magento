<?php

use \Magento\Framework\App\ObjectManager;

class ModelStoreProduct extends Model
{
    public function getProductRelated($product_id)
    {

        $sql = "SELECT linked_product_id as product_id
        FROM `".$this->db->getTableName("catalog_product_link")."` where product_id = '".(int)$product_id."' and link_type_id=1";

        $product_data = $this->db->fetchAll($sql);

        return $product_data;
    }

    public function getProductImages($product_id)
    {
        $product_data = $this->db->fetchAll("SELECT
            g.value as image
        FROM
        `".$this->db->getTableName('catalog_product_entity_media_gallery_value_to_entity')."` ge
        LEFT JOIN `".$this->db->getTableName('catalog_product_entity_media_gallery')."` g on
            ge.value_id = g.value_id
        WHERE
            ge.entity_id = '".(int)$product_id."'");

        return $product_data;
    }

    public function getProductAttributes($product_id)
    {
        $sql = "SELECT
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
            LEFT JOIN eav_attribute AS ea
                ON ce.entity_type_id = ea.entity_type_id and ea.is_user_defined = 1
            LEFT JOIN catalog_product_entity_varchar AS ce_varchar
                ON ce.entity_id = ce_varchar.entity_id
                AND ea.attribute_id = ce_varchar.attribute_id
                AND ea.backend_type = 'varchar'
                AND ce_varchar.value IS NOT NULL
            LEFT JOIN catalog_product_entity_int AS ce_int
                ON ce.entity_id = ce_int.entity_id
                AND ea.attribute_id = ce_int.attribute_id
                AND ea.backend_type = 'int'
                AND ce_int.value IS NOT NULL
            LEFT JOIN catalog_product_entity_text AS ce_text
                ON ce.entity_id = ce_text.entity_id
                AND ea.attribute_id = ce_text.attribute_id
                AND ea.backend_type = 'text'
                AND ce_text.value IS NOT NULL
            LEFT JOIN catalog_product_entity_decimal AS ce_decimal
                ON ce.entity_id = ce_decimal.entity_id
                AND ea.attribute_id = ce_decimal.attribute_id
                AND ea.backend_type = 'decimal'
                AND ce_decimal.value IS NOT NULL
            LEFT JOIN catalog_product_entity_datetime AS ce_datetime
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

    public function getAttributeValue($option_id) {
        return $this->db->fetchOne("SELECT value
            FROM `".$this->db->getTableName('eav_attribute_option_value')."` WHERE option_id='".$option_id."'
        ");
    }

    public function getOptionValues($taxonomy) {
        global $wpdb;
        
        $result = $wpdb->get_results("SELECT 
            t.`name`,
            t.`slug`
        FROM
            `wp_term_taxonomy`  tt
            LEFT JOIN `wp_terms` t ON t.`term_id` = tt.`term_id`
        WHERE tt.taxonomy = '".$taxonomy."' ");

        return $result;
    }
    public function getProductRating($product_id) {
        
        $sql = "SELECT rating_summary
            FROM `".$this->db->getTableName('review_entity_summary')."`
            WHERE entity_pk_value = '".$product_id."' and store_id='".$this->store->getStoreId()."';
        ";
        $result = $this->db->fetchOne($sql);

        $rating = 0;

        if(!empty($result)) {
            $rating = $result['rating_summary'] * 5 / 100;
        }

        return $rating;
    }

    public function getProduct($product_id)
    {
        $sql = "SELECT 
            p.entity_id as product_id, 
            p.entity_id as sort_order, 
            p.sku as model, 
            p.created_at as date_added, 
            k.qty as quantity,
            (
                SELECT value 
                FROM catalog_product_entity_varchar
                WHERE entity_id = p.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM eav_attribute
                    WHERE entity_type_id=4 AND attribute_code='name'
                )
            ) as name,
            (
                SELECT value 
                FROM catalog_product_entity_text
                WHERE entity_id = p.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM eav_attribute
                    WHERE entity_type_id=4 AND attribute_code='description'
                )
            ) as description,
            (
                SELECT value 
                FROM catalog_product_entity_varchar
                WHERE entity_id = p.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM eav_attribute
                    WHERE entity_type_id=4 AND attribute_code='short_description'
                )
            ) as short_description,
            (
                SELECT value 
                FROM catalog_product_entity_varchar
                WHERE entity_id = p.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM eav_attribute
                    WHERE entity_type_id=4 AND attribute_code='thumbnail'
                )
            ) as thumbnail,
            (
                SELECT value 
                FROM catalog_product_entity_varchar
                WHERE entity_id = p.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM eav_attribute
                    WHERE entity_type_id=4 AND attribute_code='image'
                )
            ) as image,
            (
                SELECT value 
                FROM catalog_product_entity_varchar
                WHERE entity_id = p.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM eav_attribute
                    WHERE entity_type_id=4 AND attribute_code='small_image'
                )
            ) as small_image,
            (
                SELECT value 
                FROM catalog_product_entity_decimal
                WHERE entity_id = p.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM eav_attribute
                    WHERE entity_type_id=4 AND attribute_code='price'
                )
            ) as price,
            (
                SELECT value 
                FROM catalog_product_entity_decimal
                WHERE entity_id = p.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM eav_attribute
                    WHERE entity_type_id=4 AND attribute_code='special_price'
                )
            ) as special_price,
            (
                SELECT
                    value
                FROM
                    catalog_product_entity_varchar
                WHERE
                    entity_id = p.entity_id
                    AND attribute_id = (
                        SELECT
                            attribute_id
                        FROM
                            eav_attribute
                        WHERE
                            entity_type_id = 4
                            AND attribute_code = 'url_key' 
                    )
            ) as keyword
            FROM `".$this->db->getTableName('catalog_product_entity')."` p 
            RIGHT JOIN `".$this->db->getTableName('cataloginventory_stock_item')."` k ON p.entity_id = k.item_id 
            WHERE p.entity_id = '".(int)$product_id."'";
        return $this->db->fetchOne($sql);
    }

    public function getProducts($data = array())
    {
        $sql = "SELECT p.entity_id as product_id, p.entity_id as sort_order, p.sku as model, p.created_at as date_added, ps.value as special
            FROM `".$this->db->getTableName('catalog_product_entity')."` p 
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_decimal')."` ps on
                p.entity_id = ps.entity_id
                AND ps.attribute_id = (
                    SELECT
                        attribute_id
                    FROM
                        `".$this->db->getTableName('eav_attribute')."`
                    WHERE
                        entity_type_id = 4
                    AND attribute_code = 'special_price' 
                )
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_varchar')."` pn on
                p.entity_id = pn.entity_id
                AND pn.attribute_id = (
                    SELECT
                        attribute_id
                    FROM
                    `".$this->db->getTableName('eav_attribute')."`
                    WHERE
                        entity_type_id = 4
                    AND attribute_code = 'name' 
                ) 
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_text')."` pd on
                p.entity_id = pd.entity_id
                AND pd.attribute_id = (
                    SELECT
                        attribute_id
                    FROM
                    `".$this->db->getTableName('eav_attribute')."`
                    WHERE
                        entity_type_id = 4
                    AND attribute_code = 'description' 
                ) where p.entity_id NOT IN (
                    SELECT pr.child_id FROM magento2.catalog_product_relation pr
                    left join magento2.catalog_product_entity pe on pe.entity_id = pr.parent_id WHERE pe.type_id='configurable' 
                ) ";
        
        $implode = array();

        if (!empty($data['filter_ids'])) {
            $implode[] = "p.entity_id in ('".implode("' , '", $data['filter_ids'])."')";
        }
    
        if (!empty($data['filter_category_id'])) {
            $implode[] = "'".(int)$data['filter_category_id']."' IN (
                SELECT category_id
                FROM `".$this->db->getTableName('catalog_category_product')."`
                WHERE product_id=p.entity_id
            )";
        }
    
        if (!empty($data['filter_special'])) {
            $implode[] = "ps.value IS NOT NULL";
        }
    
        if (!empty($data['filter_search'])) {
            $implode[] = "(pn.value LIKE '%".html_entity_decode($data['filter_search'], ENT_QUOTES, 'UTF-8')."%' 
            OR pd.value LIKE '%".html_entity_decode($data['filter_search'], ENT_QUOTES, 'UTF-8')."%'
            OR p.sku LIKE '%".html_entity_decode($data['filter_search'], ENT_QUOTES, 'UTF-8')."%')";
        }

		if ( count( $implode ) > 0 ) {
			$sql .= ' AND ' . implode( ' AND ', $implode );
		}

        $sort_data = array(
            'product_id',
            'price',
            'special',
            'rating',
            'date_added',
            'model',
            'sort_order'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY product_id";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
        }

        return $this->db->fetchAll($sql);
    }

    public function getTotalProducts($data = array())
    {
        $sql = "SELECT count(*) as total 
            FROM `".$this->db->getTableName('catalog_product_entity')."` p 
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_decimal')."` ps on
                p.entity_id = ps.entity_id
                AND ps.attribute_id = (
                    SELECT
                        attribute_id
                    FROM
                        `".$this->db->getTableName('eav_attribute')."`
                    WHERE
                        entity_type_id = 4
                    AND attribute_code = 'special_price' 
                )
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_varchar')."` pn on
                p.entity_id = pn.entity_id
                AND pn.attribute_id = (
                    SELECT
                        attribute_id
                    FROM
                    `".$this->db->getTableName('eav_attribute')."`
                    WHERE
                        entity_type_id = 4
                    AND attribute_code = 'name' 
                ) 
            LEFT JOIN `".$this->db->getTableName('catalog_product_entity_text')."` pd on
                p.entity_id = pd.entity_id
                AND pd.attribute_id = (
                    SELECT
                        attribute_id
                    FROM
                    `".$this->db->getTableName('eav_attribute')."`
                    WHERE
                        entity_type_id = 4
                    AND attribute_code = 'description' 
                ) where p.entity_id NOT IN (
                    SELECT pr.child_id FROM magento2.catalog_product_relation pr
                    left join magento2.catalog_product_entity pe on pe.entity_id = pr.parent_id WHERE pe.type_id='configurable'
                ) ";
        $implode = array();

        if (!empty($data['filter_ids'])) {
            $implode[] = "p.entity_id in ('".implode("' , '", $data['filter_ids'])."')";
        }

        if (!empty($data['filter_special'])) {
            $implode[] = "ps.value IS NOT NULL";
        }

        if (!empty($data['filter_search'])) {
            $implode[] = "(pn.value LIKE '%".$data['filter_search']."%' 
            OR pd.value LIKE '%".$data['filter_search']."%'
            OR p.sku LIKE '%".$data['filter_search']."%')";
        }

        if (!empty($data['filter_category_id'])) {
            $implode[] = "'".(int)$data['filter_category_id']."' IN (
                SELECT category_id
                FROM `".$this->db->getTableName('catalog_category_product')."`
                WHERE product_id=p.entity_id
            )";
        }

        if ( count( $implode ) > 0 ) {
			$sql .= ' AND ' . implode( ' AND ', $implode );
		}
        $result = $this->db->fetchOne($sql);

        return !empty($result) ? $result['total'] : 0;
    }
}
