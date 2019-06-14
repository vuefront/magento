<?php

use \Magento\Framework\App\ObjectManager;

class ModelStoreProduct extends Model
{
    public function getProductRelated($product_id)
    {
        $product_data = $this->db->fetchAll("SELECT child_id as product_id
        FROM `".$this->db->getTableName('catalog_product_relation')."` WHERE parent_id = '".(int)$product_id."'");

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
        global $wpdb;

        $result = $wpdb->get_row("SELECT pm.`meta_value` AS attributes FROM `wp_postmeta` pm WHERE pm.`post_id` = '".(int)$product_id."' AND pm.`meta_key` = '_product_attributes'");

        $attribute_data = unserialize($result->attributes);

        return $attribute_data;
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

    public function getVariationLowPrice($product_id)
    {
        global $wpdb;

        $sql ="SELECT 
        p.`ID`,
        (pm.`meta_value` + 0) AS price
       FROM
         wp_posts p 
         LEFT JOIN wp_postmeta pm 
           ON (
             pm.post_id = p.ID 
             AND pm.meta_key = '_regular_price'
           ) 
       WHERE p.`post_parent` = '".(int)$product_id."' 
       ORDER BY price ASC
       LIMIT 0, 1";

        $result = $wpdb->get_row($sql);

        return $result->ID;
    }

    public function getProducts($data = array())
    {
        $objectManager  = ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('catalog_product_entity');

        $sql = "SELECT entity_id as product_id, entity_id as sort_order, sku as model, created_at as date_added FROM `".$tableName."`";

        $implode = array();

        if (!empty($data['filter_ids'])) {
            $implode[] = "entity_id in ('".implode("' , '", $data['filter_ids'])."')";
        }
    
        if (!empty($data['filter_category_id'])) {
        //     $implode[] = "'".(int)$data['filter_category_id']."' IN (SELECT t.`term_id` FROM wp_term_relationships rel
        //     LEFT JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
        //     LEFT JOIN wp_terms t ON t.term_id = tax.term_id
        //     WHERE rel.`object_id` = p.ID AND tax.`taxonomy` = 'product_cat')";
        }
    
        if (!empty($data['filter_special'])) {
        //     $implode[] = "(ps.meta_value IS NOT NULL AND (ps.meta_value + 0) > 0)";
        }
    
        // if (!empty($data['filter_search'])) {
        //     $implode[] = "(p.post_title LIKE '%".$data['filter_search']."%' 
        //     OR p.post_content LIKE '%".$data['filter_search']."%'
        //     OR ps2.meta_value LIKE '%".$data['filter_search']."%')";
        // }

		if ( count( $implode ) > 0 ) {
			$sql .= ' WHERE ' . implode( ' AND ', $implode );
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
        return $connection->fetchAll($sql);
        // global $wpdb;
        // $sql = "SELECT 
        //     p.ID, 
        //     p.post_title, 
        //     (p.menu_order + 0) as sort_order,
        //     (pm.meta_value + 0) AS price,
        //     (ps.meta_value + 0) AS special,
        //     (pr.meta_value + 0) AS rating,
        //     p.post_date AS date_added,
        //     ps2.meta_value as model
        // FROM wp_posts p
        // LEFT JOIN wp_postmeta pm ON (pm.post_id = p.ID AND pm.meta_key = '_regular_price')
        // LEFT JOIN wp_postmeta ps ON (ps.post_id = p.ID AND ps.meta_key = '_sale_price')
        // LEFT JOIN wp_postmeta pr ON (pr.post_id = p.ID AND pr.meta_key = '_wc_average_rating')
        // LEFT JOIN wp_postmeta ps2 ON (ps2.post_id = p.ID AND ps2.meta_key = '_sku')
        // WHERE p.post_type = 'product' AND p.post_status = 'publish'";

        // $implode = array();

        // if (!empty($data['filter_ids'])) {
        //     $implode[] = "p.ID in ('".implode("' , '", $data['filter_ids'])."')";
        // }

        // if (!empty($data['filter_category_id'])) {
        //     $implode[] = "'".(int)$data['filter_category_id']."' IN (SELECT t.`term_id` FROM wp_term_relationships rel
        //     LEFT JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
        //     LEFT JOIN wp_terms t ON t.term_id = tax.term_id
        //     WHERE rel.`object_id` = p.ID AND tax.`taxonomy` = 'product_cat')";
        // }

        // if (!empty($data['filter_special'])) {
        //     $implode[] = "(ps.meta_value IS NOT NULL AND (ps.meta_value + 0) > 0)";
        // }

        // if (!empty($data['filter_search'])) {
        //     $implode[] = "(p.post_title LIKE '%".$data['filter_search']."%' 
        //     OR p.post_content LIKE '%".$data['filter_search']."%'
        //     OR ps2.meta_value LIKE '%".$data['filter_search']."%')";
        // }

        // if (count($implode) > 0) {
        //     $sql .= ' AND ' . implode(' AND ', $implode);
        // }

        // $sql .= " GROUP BY p.ID";

        // $sort_data = array(
        //     'p.ID',
        //     'price',
        //     'special',
        //     'rating',
        //     'date_added',
        //     'model',
        //     'sort_order'
        // );

        // if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
        //     $sql .= " ORDER BY " . $data['sort'];
        // } else {
        //     $sql .= " ORDER BY p.ID";
        // }

        // if (isset($data['order']) && ($data['order'] == 'DESC')) {
        //     $sql .= " DESC";
        // } else {
        //     $sql .= " ASC";
        // }

        // if (isset($data['start']) || isset($data['limit'])) {
        //     if ($data['start'] < 0) {
        //         $data['start'] = 0;
        //     }

        //     if ($data['limit'] < 1) {
        //         $data['limit'] = 20;
        //     }

        //     $sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
        // }

        // $results = $wpdb->get_results($sql);

        // return $results;
    }

    public function getTotalProducts($data = array())
    {
        $sql = "SELECT count(*) as total FROM `".$this->db->getTableName('catalog_product_entity')."`";
        $implode = array();

        if (!empty($data['filter_ids'])) {
            $implode[] = "entity_id in ('".implode("' , '", $data['filter_ids'])."')";
        }
        if ( count( $implode ) > 0 ) {
			$sql .= ' WHERE ' . implode( ' AND ', $implode );
		}
        $result = $this->db->fetchOne($sql);
        return !empty($result) ? $result['total'] : 0;
        // global $wpdb;

        // $sql = "SELECT count(*) as total 
        // from wp_posts p
        // LEFT JOIN wp_postmeta ps ON (ps.post_id = p.ID AND ps.meta_key = '_sale_price') 
        // LEFT JOIN wp_postmeta ps2 ON (ps2.post_id = p.ID AND ps2.meta_key = '_sku')
        // where p.post_type='product' AND post_status = 'publish'";

        // $implode = array();

        // if (!empty($data['filter_ids'])) {
        //     $implode[] = "p.ID in ('".implode("' , '", $data['filter_ids'])."')";
        // }

        // if (!empty($data['filter_category_id'])) {
        //     $implode[] = "'".(int)$data['filter_category_id']."' IN (SELECT t.`term_id` FROM wp_term_relationships rel
        //     LEFT JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
        //     LEFT JOIN wp_terms t ON t.term_id = tax.term_id
        //     WHERE rel.`object_id` = p.ID AND tax.`taxonomy` = 'product_cat')";
        // }

        // if (!empty($data['filter_special'])) {
        //     $implode[] = "(ps.meta_value IS NOT NULL AND (ps.meta_value + 0) > 0)";
        // }

        // if (!empty($data['filter_search'])) {
        //     $implode[] = "(p.post_title LIKE '%".$data['filter_search']."%' 
        //     OR p.post_content LIKE '%".$data['filter_search']."%'
        //     OR ps2.meta_value LIKE '%".$data['filter_search']."%')";
        // }

        // if (count($implode) > 0) {
        //     $sql .= ' AND ' . implode(' AND ', $implode);
        // }

        // $result = $wpdb->get_row($sql);

        // return $result->total;
    }

    public function getCurrencySymbol($currency = '')
    {
        if (! $currency) {
            $currency = get_option( 'woocommerce_currency' );
        }

        $symbols = apply_filters('woocommerce_currency_symbols', array(
            'AED' => 'د.إ',
            'AFN' => '؋',
            'ALL' => 'L',
            'AMD' => 'AMD',
            'ANG' => 'ƒ',
            'AOA' => 'Kz',
            'ARS' => '$',
            'AUD' => '$',
            'AWG' => 'ƒ',
            'AZN' => 'AZN',
            'BAM' => 'KM',
            'BBD' => '$',
            'BDT' => '৳ ',
            'BGN' => 'лв.',
            'BHD' => '.د.ب',
            'BIF' => 'Fr',
            'BMD' => '$',
            'BND' => '$',
            'BOB' => 'Bs.',
            'BRL' => 'R$',
            'BSD' => '$',
            'BTC' => '฿',
            'BTN' => 'Nu.',
            'BWP' => 'P',
            'BYR' => 'Br',
            'BZD' => '$',
            'CAD' => '$',
            'CDF' => 'Fr',
            'CHF' => 'CHF',
            'CLP' => '$',
            'CNY' => '¥',
            'COP' => '$',
            'CRC' => '₡',
            'CUC' => '$',
            'CUP' => '$',
            'CVE' => '$',
            'CZK' => 'Kč',
            'DJF' => 'Fr',
            'DKK' => 'DKK',
            'DOP' => 'RD$',
            'DZD' => 'د.ج',
            'EGP' => 'EGP',
            'ERN' => 'Nfk',
            'ETB' => 'Br',
            'EUR' => '€',
            'FJD' => '$',
            'FKP' => '£',
            'GBP' => '£',
            'GEL' => 'ლ',
            'GGP' => '£',
            'GHS' => '₵',
            'GIP' => '£',
            'GMD' => 'D',
            'GNF' => 'Fr',
            'GTQ' => 'Q',
            'GYD' => '$',
            'HKD' => '$',
            'HNL' => 'L',
            'HRK' => 'Kn',
            'HTG' => 'G',
            'HUF' => 'Ft',
            'IDR' => 'Rp',
            'ILS' => '₪',
            'IMP' => '£',
            'INR' => '₹',
            'IQD' => 'ع.د',
            'IRR' => '﷼',
            'IRT' => 'تومان',
            'ISK' => 'kr.',
            'JEP' => '£',
            'JMD' => '$',
            'JOD' => 'د.ا',
            'JPY' => '¥',
            'KES' => 'KSh',
            'KGS' => 'сом',
            'KHR' => '៛',
            'KMF' => 'Fr',
            'KPW' => '₩',
            'KRW' => '₩',
            'KWD' => 'د.ك',
            'KYD' => '$',
            'KZT' => 'KZT',
            'LAK' => '₭',
            'LBP' => 'ل.ل',
            'LKR' => 'රු',
            'LRD' => '$',
            'LSL' => 'L',
            'LYD' => 'ل.د',
            'MAD' => 'د.م.',
            'MDL' => 'MDL',
            'MGA' => 'Ar',
            'MKD' => 'ден',
            'MMK' => 'Ks',
            'MNT' => '₮',
            'MOP' => 'P',
            'MRO' => 'UM',
            'MUR' => '₨',
            'MVR' => '.ރ',
            'MWK' => 'MK',
            'MXN' => '$',
            'MYR' => 'RM',
            'MZN' => 'MT',
            'NAD' => '$',
            'NGN' => '₦',
            'NIO' => 'C$',
            'NOK' => 'kr',
            'NPR' => '₨',
            'NZD' => '$',
            'OMR' => 'ر.ع.',
            'PAB' => 'B/.',
            'PEN' => 'S/.',
            'PGK' => 'K',
            'PHP' => '₱',
            'PKR' => '₨',
            'PLN' => 'zł',
            'PRB' => 'р.',
            'PYG' => '₲',
            'QAR' => 'ر.ق',
            'RMB' => '¥',
            'RON' => 'lei',
            'RSD' => 'дин.',
            'RUB' => '₽',
            'RWF' => 'Fr',
            'SAR' => 'ر.س',
            'SBD' => '$',
            'SCR' => '₨',
            'SDG' => 'ج.س.',
            'SEK' => 'kr',
            'SGD' => '$',
            'SHP' => '£',
            'SLL' => 'Le',
            'SOS' => 'Sh',
            'SRD' => '$',
            'SSP' => '£',
            'STD' => 'Db',
            'SYP' => 'ل.س',
            'SZL' => 'L',
            'THB' => '฿',
            'TJS' => 'ЅМ',
            'TMT' => 'm',
            'TND' => 'د.ت',
            'TOP' => 'T$',
            'TRY' => '₺',
            'TTD' => '$',
            'TWD' => 'NT$',
            'TZS' => 'Sh',
            'UAH' => '₴',
            'UGX' => 'UGX',
            'USD' => '$',
            'UYU' => '$',
            'UZS' => 'UZS',
            'VEF' => 'Bs F',
            'VND' => '₫',
            'VUV' => 'Vt',
            'WST' => 'T',
            'XAF' => 'Fr',
            'XCD' => '$',
            'XOF' => 'Fr',
            'XPF' => 'Fr',
            'YER' => '﷼',
            'ZAR' => 'R',
            'ZMW' => 'ZK',
        ));

        $currency_symbol = isset($symbols[ $currency ]) ? $symbols[ $currency ] : '';

        return apply_filters('woocommerce_currency_symbol', $currency_symbol, $currency);
    }
}
