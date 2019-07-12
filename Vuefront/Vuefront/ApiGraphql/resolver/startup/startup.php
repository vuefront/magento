<?php
require_once VF_SYSTEM_DIR . 'engine/resolver.php';

use GraphQL\GraphQL;
use GraphQL\Utils\BuildSchema;
use GraphQL\Utils\AST;
use GraphQL\Language\Parser;

class ResolverStartupStartup extends Resolver
{
    public function index($input)
    {
        // ob_start();

        if (!empty($_GET['cors'])) {
            if (!empty($_SERVER['HTTP_ORIGIN'])) {
                header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            } else {
                header('Access-Control-Allow-Origin: *');
            }
            header('Access-Control-Allow-Methods: POST, OPTIONS');
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Headers: DNT,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Range,Token,token,Cookie,cookie,content-type');
        }

        $this->load->model('startup/startup');

        try {

            $resolvers = $this->model_startup_startup->getResolvers();
            $cacheFilename = DIR_PLUGIN . 'cached_schema.php';
            if (!file_exists($cacheFilename)) {
                $document = Parser::parse(file_get_contents(DIR_PLUGIN . 'schema.graphql'));
                file_put_contents($cacheFilename, "<?php\nreturn " . var_export(AST::toArray($document), true) . ";\n");
            } else {
                $document = AST::fromArray(require $cacheFilename);
            }

            $schema = BuildSchema::build($document);
            $query = $input['query'];

            $variableValues = isset($input['variables']) ? $input['variables'] : null;
            $result = GraphQL::executeQuery($schema, $query, $resolvers, null, $variableValues);
        } catch (\Exception $e) {
            $result = [
                'error' => [
                    'message' => $e->getMessage()
                ]
            ];
        }

        // ob_clean();

        echo json_encode($result);

    }
}
