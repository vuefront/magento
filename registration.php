<?php

use Magento\Framework\Component\ComponentRegistrar;
define('VF_DIR', realpath(__DIR__.'/ApiGraphql').'/');
define('VF_SYSTEM_DIR', realpath(__DIR__.'/ApiGraphql/system').'/');

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Vuefront_Vuefront', __DIR__);
