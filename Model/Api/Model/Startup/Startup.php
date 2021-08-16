<?php

namespace Vuefront\Vuefront\Model\Api\Model\Startup;

use \GraphQL\Language\Parser;
use \Vuefront\Vuefront\Model\Api\System\Engine\Model;
use Vuefront\Vuefront\Model\Api\System\Library\SafeException;

class Startup extends Model
{
    private $moduleReader;
    private $read;
    private $settingsFactory;
    private $request;

    public function __construct(
        \Vuefront\Vuefront\Model\SettingsFactory $settingsFactory,
        \Magento\Framework\Module\Dir\Reader $moduleReader,
        \Magento\Framework\Filesystem\Directory\ReadFactory $read,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->moduleReader = $moduleReader;
        $this->read = $read;
        $this->settingsFactory = $settingsFactory;
        $this->request = $request;
    }

    public function checkAccess()
    {
        if (!$this->request->has('accessKey')) {
            return false;
        }

        $collection = $this->settingsFactory->create()->getCollection();

        $accessKey = '';

        foreach ($collection as $key => $value) {
            $data = $value->getData();
            if ($data['key'] == 'accessKey') {
                $accessKey = $data['value'];
            }
        }

        $result = false;

        if (!empty($accessKey)) {
            if ($this->request->get('accessKey') == $accessKey) {
                $result = true;
            }
        }

        return $result;
    }

    public function getSchema()
    {
        $etcDir = $this->moduleReader->getModuleDir(
            \Magento\Framework\Module\Dir::MODULE_ETC_DIR,
            'Vuefront_Vuefront'
        );
        $rawSchema = $this->read->create($etcDir)->readFile('schema.graphql');
        return $rawSchema;
    }

    public function getAdminSchema()
    {
        $etcDir = $this->moduleReader->getModuleDir(
            \Magento\Framework\Module\Dir::MODULE_ETC_DIR,
            'Vuefront_Vuefront'
        );
        $rawSchema = $this->read->create($etcDir)->readFile('schemaAdmin.graphql');
        return $rawSchema;
    }

    public function parseSchema($source)
    {
        return Parser::parse($source);
    }

    public function mergeSchemas($files)
    {
        $rootQueryType = '';
        $types = '';
        $rootMutationType = '';
        foreach ($files as $value) {
            preg_match('/type\s+RootQueryType\s\{\s*\n([^\}]+)/', $value, $matched);
            if (!empty($matched[1])) {
                $rootQueryType = $rootQueryType.PHP_EOL.$matched[1];
            }
            preg_match('/type\s+RootMutationType\s\{\s*\n([^\}]+)/', $value, $mutationMatched);
            if (!empty($mutationMatched[1])) {
                $rootMutationType = $rootMutationType.PHP_EOL.$mutationMatched[1];
            }
            preg_match('/([a-zA-Z0-9\=\s\}\_\-\@\{\:\[\]\(\)\!\"]+)type RootQueryType/', $value, $typesMatched);
            if (!empty($typesMatched[1])) {
                $types = $types.PHP_EOL.$typesMatched[1];
            }
        }

        return "${types}".PHP_EOL.'type RootQueryType {'
            .PHP_EOL."${rootQueryType}".PHP_EOL.'}'.PHP_EOL.'type RootMutationType {'
            .PHP_EOL."${rootMutationType}".PHP_EOL.'}';
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
