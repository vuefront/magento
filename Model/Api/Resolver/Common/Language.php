<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Language extends Resolver
{
    private $codename = "d_vuefront";

    public function get()
    {
        $languages = [];

        $languages[] = [
            'name' => 'English',
            'code' => 'en-gb',
            'image' => '',
            'active' => true
        ];

        return $languages;
    }

    public function edit($args)
    {
        return $this->get();
    }
}
