<?php

namespace Vuefront\Vuefront\Model\ResourceModel;

class Settings extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('vuefront_settings', 'setting_id');
    }
}
