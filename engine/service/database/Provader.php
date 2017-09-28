<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2017
 * Time: 13:40
 */

namespace engine\service\database;

use engine\core\database\connect;
use engine\service\AbstractProvader;


class Provader extends AbstractProvader {


    public $serviceName = 'db';


     public function init()
     {
         $db = new connect();

         $this->di->set($this->serviceName,$db);
     }

}