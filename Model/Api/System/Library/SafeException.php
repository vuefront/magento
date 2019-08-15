<?php
namespace Vuefront\Vuefront\Model\Api\System\Library;

use \GraphQL\Error\ClientAware;

class SafeException extends \Exception implements ClientAware
{
    public function isClientSafe()
    {
        return true;
    }

    public function getCategory()
    {
        return 'businessLogic';
    }
}
