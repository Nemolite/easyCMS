<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 7:47
 */
require_once __DIR__.'/../vendor/autoload.php';
use engine\cms;
use engine\DI\DI;
use engine\core\database\connect;
use engine\tools;
use engine\service\database;

try {

    $di = new DI();

    $services = require __DIR__. '/config/service.php';

    // Init servises
    foreach( $services as $service)
    {
        $provider = new $service($di);
        $provider->init();
    };

    $cms = new cms($di);
    $cms->run();

}catch (\ErrorException $e){
    echo $e->getMessage();
}