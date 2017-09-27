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

try {

//    $di = new DI();
//
//
//    $di->set('test',['db'=>'db_object']);
//
//    $di->set('test2',['mail'=>'mail_object']);
//
//    $cms= new cms($di);
//
//    $cms->run();
    $test = new connect();
    $test->test();


}catch (\ErrorException $e){
    echo $e->getMessage();
}