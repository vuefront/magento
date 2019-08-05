<?php

namespace Vuefront\Vuefront\Plugin;

use Magento\Framework\Webapi\Request;
use Magento\Framework\Exception\InputException;

class CorsRequestOptionsPlugin
{

    public function aroundGetHttpMethod(
        Request $subject
    ) {
        if (!$subject->isGet() && !$subject->isPost() && !$subject->isPut() && !$subject->isDelete() && !$subject->isOptions()) {
            throw new InputException(__('Request method is invalid.'));
        }
        return $subject->getMethod();
    }

}