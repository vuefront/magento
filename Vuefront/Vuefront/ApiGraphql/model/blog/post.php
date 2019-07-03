<?php

require_once VF_SYSTEM_DIR.'engine/model.php';

class ModelBlogPost extends Model
{
    public function getPost($post_id)
    {
        $sql = "SELECT p.*
            FROM `".$this->db->getTableName('magefan_blog_post')."` p
            WHERE p.post_id = '".$post_id."'";

        $result = $this->db->fetchOne($sql);

        return $result;
    }

    public function getPosts($data = array())
    {
        $sql = "SELECT p.post_id as ID
            FROM `".$this->db->getTableName('magefan_blog_post')."` p";

        $implode = array();

        if (!empty($data['filter_category_id'])) {
            $implode[] = "'" . (int) $data['filter_category_id'] . "' IN (
                SELECT pc.category_id
                FROM `".$this->db->getTableName('magefan_blog_post_category')."` pc
                WHERE pc.post_id = p.post_id
            )";
        }

        if (count($implode) > 0) {
            $sql .= ' WHERE ' . implode(' AND ', $implode);
        }

        $sql .= " GROUP BY ID";

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

    public function getTotalPosts($data = array())
    {
        global $wpdb;

        $sql = "SELECT count(*) as total
            FROM `".$this->db->getTableName('magefan_blog_post')."` p";

        $implode = array();

        if (!empty($data['filter_category_id'])) {
            $implode[] = "'" . (int) $data['filter_category_id'] . "' IN (
                SELECT pc.category_id
                FROM `".$this->db->getTableName('magefan_blog_post_category')."` pc
                WHERE pc.post_id = p.post_id
            )";
        }

        if (count($implode) > 0) {
            $sql .= ' WHERE ' . implode(' AND ', $implode);
        }

        $result = $this->db->fetchOne($sql);

        return $result['total'];
    }
}
