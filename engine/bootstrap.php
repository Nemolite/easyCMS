<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 7:47
 */

use engine\cms;
use engine\DI\DI;

try {

    $di = new DI();

    $cms= new cms();

    $cms->run();

}catch (\ErrorException $e){
    echo $e->getMessage();
}