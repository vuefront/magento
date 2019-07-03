<?php

namespace Vuefront\Vuefront\Api;
interface GraphqlInterface
{
    /**
     * Get graphql
     * @api
     * @return string
     */
    public function graphql();

    /**
     * Cors check
     * @api
     * @return string
     */
    public function cors();
}