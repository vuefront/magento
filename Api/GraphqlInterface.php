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
     * Get callback
     * @return string
     * @api
     */
    public function callback();

    /**
     * Cors check
     * @return array
     * @api
     */
    public function cors();
}
