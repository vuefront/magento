<?php

class ModelCommonPage extends Model
{
    public function getPage($page_id)
    {

        $sql = "SELECT * FROM `".$this->db->getTableName('cms_page')."` WHERE page_id = '".$page_id."'";

        $result = $this->db->fetchOne($sql);

        return $result;
    }

    public function getPages($data = array())
    {
        $sql = "SELECT p.page_id FROM `".$this->db->getTableName('cms_page')."` p LEFT JOIN `".$this->db->getTableName('cms_page_store')."` ps ON ps.page_id = p.page_id WHERE ps.store_id IN ('".$this->store->getStoreId()."', '0')";
        
        $implode = array();

        if (!empty($data['filter_search'])) {
            $implode[] = "(p.title LIKE '%".$data['filter_search']."%' 
            OR p.content LIKE '%".$data['filter_search']."%')";
        }

        if (count($implode) > 0) {
            $sql .= ' AND ' . implode(' AND ', $implode);
        }

        $sql .= " GROUP BY p.page_id";

        $sort_data = array(
            'p.page_id',
            'p.title',
            'p.sort_order'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY p.page_id";
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

    public function getTotalPages($data = array())
    {
        $sql = "SELECT count(*) as total FROM `".$this->db->getTableName('cms_page')."` p LEFT JOIN `".$this->db->getTableName('cms_page_store')."` ps ON ps.page_id = p.page_id WHERE ps.store_id IN ('".$this->store->getStoreId()."', '0')";
        
        $implode = array();

        if (!empty($data['filter_search'])) {
            $implode[] = "(p.title LIKE '%".$data['filter_search']."%' 
            OR p.content LIKE '%".$data['filter_search']."%')";
        }

        if (count($implode) > 0) {
            $sql .= ' AND ' . implode(' AND ', $implode);
        }

        $sql .= " GROUP BY p.page_id";

        $results = $this->db->fetchOne($sql);

        return $results['total'];
    }
}
