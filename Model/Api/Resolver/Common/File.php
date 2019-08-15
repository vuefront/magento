<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class File extends Resolver
{
    private $codename = "d_vuefront";

    public function upload($args)
    {
        throw new \Magento\Framework\Exception\NotFoundException(__('Comming soon'));
    }
}
