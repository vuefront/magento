<?php

require_once VF_SYSTEM_DIR.'engine/model.php';

class ModelBlogReview extends Model
{
    public function getReviews($post_id)
    {
        $sql = "SELECT *
        FROM `".$this->db->getTableName('magefan_blog_comment')."`
        WHERE post_id = '".$post_id."'";
        $result = $this->db->fetchAll($sql);
        return $result;
    }
}
