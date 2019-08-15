<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Startup;

use Vuefront\Vuefront\Model\Api\System\Engine\Resolver;
use \GraphQL\GraphQL;
use \GraphQL\Utils\BuildSchema;
use \GraphQL\Utils\AST;
use \GraphQL\Language\Parser;

class Startup extends Resolver
{
    public function index($input)
    {
        $this->load->model('startup/startup');

        try {

            $resolvers = $this->model_startup_startup->getResolvers();

            $document = $this->model_startup_startup->getSchema();

            $schema = BuildSchema::build($document);
            $query = $input['query'];

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
