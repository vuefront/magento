<?php

class ModelBlogCategory extends Model
{
    public function getCategory($category_id)
    {
        $sql = "SELECT c.*, IFNULL(SUBSTRING_INDEX(c.path, '/', -1), 0) as parent_id
            FROM `".$this->db->getTableName('magefan_blog_category')."` c
            left join `".$this->db->getTableName('magefan_blog_category_store')."` cs on c.category_id = cs.category_id
            where c.is_active = '1' and c.`category_id` = '" . (int) $category_id . "'";

        $sql .= " GROUP BY c.category_id";

        $result = $this->db->fetchOne($sql);

        return $result;
    }

    public function getCategories($data = array())
    {
        $sql = "SELECT c.category_id as ID
            FROM `".$this->db->getTableName('magefan_blog_category')."` c
            left join `".$this->db->getTableName('magefan_blog_category_store')."` cs on c.category_id = cs.category_id
            where c.is_active = '1'";

        $implode = array();

        if (isset($data['filter_parent_id'])) {
            $implode[] = "IFNULL(SUBSTRING_INDEX(c.path, '/', -1), 0) = '" . (int) $data['filter_parent_id'] . "'";
        }

        if (count($implode) > 0) {
            $sql .= ' AND ' . implode(' AND ', $implode);
        }

        $sql .= " GROUP BY c.category_id";

        $sort_data = array(
            'ID'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY ID";
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
        
        $results = $this->db->fetchAll($sql);

        return $results;
    }

    public function getTotalCategories($data = array())
    {
        $sql = "SELECT count(*) as total
            FROM `".$this->db->getTableName('magefan_blog_category')."` c
            left join `".$this->db->getTableName('magefan_blog_category_store')."` cs on c.category_id = cs.category_id
            where c.is_active = '1'";

        $implode = array();

        if (isset($data['filter_parent_id'])) {
            $implode[] = "IFNULL(SUBSTRING_INDEX(c.path, '/', -1), 0) = '" . (int) $data['filter_parent_id'] . "'";
        }

        if (count($implode) > 0) {
            $sql .= ' AND ' . implode(' AND ', $implode);
        }

        $result = $this->db->fetchOne($sql);

        return $result['total'];
    }
}
