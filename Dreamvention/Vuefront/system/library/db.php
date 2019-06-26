<?php

use \Magento\Framework\App\ObjectManager;

class DB
{
    private $connection;
    private $resource;
    private $entity_types;
    public function __construct()
    {
        $objectManager = ObjectManager::getInstance();
        $this->resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $this->connection = $this->resource->getConnection();
    }

    public function init()
    {
        $result = $this->fetchAll("SELECT entity_type_id as id, entity_type_code as code FROM `".$this->getTableName('eav_entity_type')."`");
        $this->entity_types = array();

        foreach ($result as $value) {
            $this->entity_types[$value['code']] = $value['id'];
        }
    }

    public function getEntityType($code) {
        if(!empty($this->entity_types[$code])){
            return $this->entity_types[$code];
        }

        return false;
    }

    public function getTableName($name)
    {
        return $this->resource->getTableName($name);
    }

    public function fetchOne($sql)
    {
        $result = $this->connection->fetchAll($sql);
        return !empty($result) ? $result[0] : array();
    }

    public function fetchAll($sql)
    {
        return $this->connection->fetchAll($sql);
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function getLastId()
    {
        return $this->connection->lastInsertId();
    }
}
