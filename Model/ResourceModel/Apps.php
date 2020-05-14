<?php

namespace Vuefront\Vuefront\Model\ResourceModel;

class Apps extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('vuefront_apps', 'app_id');
    }
}
