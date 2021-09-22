<?php

namespace Vuefront\Vuefront\Model;

class Settings extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Vuefront\Vuefront\Model\ResourceModel\Settings::class);
    }
}
