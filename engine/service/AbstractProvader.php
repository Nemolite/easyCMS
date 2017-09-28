<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2017
 * Time: 13:27
 */

namespace engine\service;

 abstract class AbstractProvader {

   protected  $di;

     public function __construct(\engine\DI\DI $di)
     {
         $this->di=$di;
     }

     abstract function init();


}