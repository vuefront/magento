<?php

namespace Vuefront\Vuefront\Model\ResourceModel\Apps;

class Collection
    extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init(
            'Vuefront\Vuefront\Model\Apps',
            'Vuefront\Vuefront\Model\ResourceModel\Apps'
        );
    }
}
