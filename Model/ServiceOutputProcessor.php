<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Vuefront\Vuefront\Model;

use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Reflection\MethodsMap;
use Magento\Framework\Reflection\TypeProcessor;

/**
 * Data object converter for REST
 */
class ServiceOutputProcessor extends \Magento\Framework\Webapi\ServiceOutputProcessor
{
    public function process($data, $serviceClassName, $serviceMethodName)
    {
        /** @var string $dataType */
        $dataType = $this->methodsMapProcessor->getMethodReturnType($serviceClassName, $serviceMethodName);

        if ($serviceClassName == \Vuefront\Vuefront\Api\GraphqlInterface::class) {
            return $data;
        } elseif ($serviceClassName == \Vuefront\Vuefront\Api\InformationInterface::class) {
            return $data;
        } else {
            return $this->convertValue($data, $dataType);
        }
    }
}
