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

try {

    $dblook = new connect();

    $str = "SELECT * FROM users";

    $step2 = $dblook->query($str);



    // посмотреть
    $outdb = new tools();
    $outdb->showobj($step2);






}catch (\ErrorException $e){
    echo $e->getMessage();
}