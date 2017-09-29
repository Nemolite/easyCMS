<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2017
 * Time: 16:02
 */

namespace engine;

use engine\DI\DI;

 abstract class controller {
     /**
      * @var \engine\DI\DI
      */
     protected $di;

     protected $db;

     public function __construct(DI $di)
     {
        $di->di = $di;
     }

}