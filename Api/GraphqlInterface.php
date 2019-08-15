<?php

namespace Vuefront\Vuefront\Api;

interface GraphqlInterface
{
    /**
     * Get graphql
     * @return string
     * @api
     */
    public function graphql();

    /**
     * Cors check
     * @return array
     * @api
     */
    public function cors();
}
