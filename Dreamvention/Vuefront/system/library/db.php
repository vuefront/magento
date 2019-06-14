<?php 
use \Magento\Framework\App\ObjectManager;
class DB {
    private $connection;
    private $resource;
    public function __construct() {
        $objectManager  = ObjectManager::getInstance();
        $this->resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $this->connection = $this->resource->getConnection();
    }

    public function getTableName($name) {
        return $this->resource->getTableName($name);
    }

    public function fetchOne($sql) {
        $result = $this->connection->fetchAll($sql);
        return !empty($result) ? $result[0] : array();
    }

    public function fetchAll($sql) {
        return $this->connection->fetchAll($sql);
    }
}