<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Startup;

use Vuefront\Vuefront\Model\Api\System\Engine\Resolver;
use \GraphQL\GraphQL;
use \GraphQL\Utils\BuildSchema;

class Startup extends Resolver
{
    public function index($input)
    {
        $this->load->model('startup/startup');

        try {
            $query = $input['query'];
            $sources = [$this->model_startup_startup->getSchema()];
            if ($this->model_startup_startup->checkAccess()) {
                $sources[] = $this->model_startup_startup->getAdminSchema();
            }

            $source = $this->model_startup_startup->mergeSchemas($sources);
            $source = $this->model_startup_startup->parseSchema($source);
            $resolvers = $this->model_startup_startup->getResolvers();

            $schema = BuildSchema::build($source);

            $variableValues = isset($input['variables']) ? $input['variables'] : null;
            $result = GraphQL::executeQuery($schema, $query, $resolvers, null, $variableValues)->toArray();
        } catch (\Exception $e) {
            $result = [
                'error' => [
                    'message' => $e->getMessage()
                ]
            ];
        }

        $this->response->setOutput($result);
    }
}
