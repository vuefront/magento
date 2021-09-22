<?php

namespace Vuefront\Vuefront\Model\ResourceModel\Settings;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init(
            \Vuefront\Vuefront\Model\Settings::class,
            \Vuefront\Vuefront\Model\ResourceModel\Settings::class
        );
    }
}
