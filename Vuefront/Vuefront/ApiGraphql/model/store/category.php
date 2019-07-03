<?php

require_once VF_SYSTEM_DIR.'engine/model.php';

class ModelStoreCategory extends Model
{

    public function getCategory($category_id)
    {
        $sql = "SELECT 
            c.entity_id as category_id, 
            c.entity_id as sort_order, 
            c.parent_id as parent_id,
            c.created_at as date_added, 
            (
                SELECT value 
                FROM `" . $this->db->getTableName('catalog_category_entity_varchar') . "`
                WHERE entity_id = c.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM `" . $this->db->getTableName('eav_attribute') . "`
                    WHERE entity_type_id='".$this->db->getEntityType('catalog_category')."' AND attribute_code='name'
                )
            ) as name,
            (
                SELECT value 
                FROM `" . $this->db->getTableName('catalog_category_entity_text') . "`
                WHERE entity_id = c.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM `" . $this->db->getTableName('eav_attribute') . "`
                    WHERE entity_type_id='".$this->db->getEntityType('catalog_category')."' AND attribute_code='description'
                )
            ) as description,
            (
                SELECT value 
                FROM `" . $this->db->getTableName('catalog_category_entity_varchar') . "`
                WHERE entity_id = c.entity_id AND attribute_id = (
                    SELECT attribute_id 
                    FROM `" . $this->db->getTableName('eav_attribute') . "`
                    WHERE entity_type_id='".$this->db->getEntityType('catalog_category')."' AND attribute_code='image'
                )
            ) as image,
            (
                SELECT value
                FROM `" . $this->db->getTableName('catalog_category_entity_varchar') . "`
                WHERE entity_id = c.entity_id AND attribute_id = ( 
                    SELECT attribute_id
                    FROM `" . $this->db->getTableName('eav_attribute') . "`
                    WHERE entity_type_id='".$this->db->getEntityType('catalog_category')."' AND attribute_code = 'url_key' 
                    )
            ) as keyword
            FROM `" . $this->db->getTableName('catalog_category_entity') . "` c
            WHERE c.entity_id = '" . (int)$category_id . "'";
        return $this->db->fetchOne($sql);
    }

    public function getCategories($data = array())
    {
        $sql = "SELECT c.entity_id as category_id, position as sort_order 
            FROM `" . $this->db->getTableName('catalog_category_entity') . "` c
            LEFT JOIN `" . $this->db->getTableName('catalog_category_entity_int') . "` ca on
                c.entity_id = ca.entity_id
                AND ca.attribute_id = (
                SELECT
                    attribute_id
                FROM
                    `" . $this->db->getTableName('eav_attribute') . "`
                WHERE
                    entity_type_id = '".$this->db->getEntityType('catalog_category')."'
                    AND attribute_code = 'is_active' )
            WHERE ca.value = 1";

        $implode = array();

        if (isset($data['filter_parent_id'])) {
            $implode[] = "c.parent_id = '" . (int)$data['filter_parent_id'] . "'";
        }

        if (count($implode) > 0) {
            $sql .= ' AND ' . implode(' AND ', $implode);
        }

        $sql .= " GROUP BY c.entity_id";

        $sort_data = array(
            'c.entity_id',
            'sort_order'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY c.entity_id";
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

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $results = $this->db->fetchAll($sql);

        return $results;
    }

    public function getTotalCategories($data = array())
    {
        $sql = "SELECT count(*) as total FROM `" . $this->db->getTableName('catalog_category_entity') . "` c 
        LEFT JOIN `" . $this->db->getTableName('catalog_category_entity_int') . "` ca on
            c.entity_id = ca.entity_id
            AND ca.attribute_id = (
            SELECT
                attribute_id
            FROM
                `" . $this->db->getTableName('eav_attribute') . "`
            WHERE
                entity_type_id = '".$this->db->getEntityType('catalog_category')."'
                AND attribute_code = 'is_active' )
        WHERE ca.value = 1";

        $implode = array();

        if (isset($data['filter_parent_id'])) {
            $implode[] = "c.parent_id = '" . (int)$data['filter_parent_id'] . "'";
        }

        if (count($implode) > 0) {
            $sql .= ' AND ' . implode(' AND ', $implode);
        }

        $results = $this->db->fetchOne($sql);

        return $results['total'];
    }
}