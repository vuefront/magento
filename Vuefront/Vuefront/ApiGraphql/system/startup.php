<?php
define('DIR_PLUGIN', realpath(__DIR__.'/../').'/');

require_once(DIR_PLUGIN . 'system/engine/action.php');
require_once(DIR_PLUGIN . 'system/engine/actionType.php');
require_once(DIR_PLUGIN . 'system/engine/type.php');
require_once(DIR_PLUGIN . 'system/engine/loader.php');
require_once(DIR_PLUGIN . 'system/engine/registry.php');
require_once(DIR_PLUGIN . 'system/engine/proxy.php');
require_once(DIR_PLUGIN . 'system/library/db.php');
require_once(DIR_PLUGIN . 'system/library/image.php');
require_once(DIR_PLUGIN . 'system/library/store.php');
require_once(DIR_PLUGIN . 'system/library/currency.php');
require_once(DIR_PLUGIN . 'system/library/response.php');

function start() {
    $registry = new Registry();

    $db = new DB();
    $registry->set('db', $db);
    $registry->get('db')->init();

    $currency = new Currency();
    $registry->set('currency', $currency);

    $image = new Image();
    $registry->set('image', $image);

    $response = new Response();
    $registry->set('response', $response);

    $store = new Store();
    $registry->set('store', $store);

    $loader = new Loader($registry);
    $registry->set('load', $loader);

    $registry->get('load')->resolver('startup/session');
    $registry->get('load')->resolver('startup/startup');

    return $registry->get('response')->getOutput();
}