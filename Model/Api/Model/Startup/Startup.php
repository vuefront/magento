<?php

namespace Vuefront\Vuefront\Model\Api\Model\Startup;

use \GraphQL\Language\Parser;
use \Vuefront\Vuefront\Model\Api\System\Engine\Model;
use Vuefront\Vuefront\Model\Api\System\Library\SafeException;

class Startup extends Model
{
    private $moduleReader;
    private $read;

    public function __construct(
        \Magento\Framework\Module\Dir\Reader $moduleReader,
        \Magento\Framework\Filesystem\Directory\ReadFactory $read
    ) {
        $this->moduleReader = $moduleReader;
        $this->read = $read;
    }

    public function getSchema()
    {
        $etcDir = $this->moduleReader->getModuleDir(
            \Magento\Framework\Module\Dir::MODULE_ETC_DIR,
            'Vuefront_Vuefront'
        );
        $rawSchema = $this->read->create($etcDir)->readFile('schema.graphql');
        return Parser::parse($rawSchema);
    }

    public function getResolvers()
    {

        $etcDir = $this->moduleReader->getModuleDir(
            \Magento\Framework\Module\Dir::MODULE_ETC_DIR,
            'Vuefront_Vuefront'
        );
        $rawMapping = $this->read->create($etcDir)->readFile('mapping.json');
        $mapping = json_decode($rawMapping, true);
        $result = [];
        foreach ($mapping as $key => $value) {
            $that = $this;
            $result[$key] = function ($root, $args, $context) use ($value, $that) {
                try {
                    return $that->load->resolver($value, $args);
                } catch (\Exception $e) {
                    throw new SafeException($e->getMessage());
                }
            };
        }

        return $result;
    }
}
