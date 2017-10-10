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

     protected $view;

     protected $config;

     protected $db;

     protected $request;

     public function __construct(DI $di)
     {
       $this->di = $di;
       $this->view  = $this->di->get('view');
       $this->config  = $this->di->get('config');
       $this->request  = $this->di->get('request');
       $this->db  = $this->di->get('db');
     }

     public function __get($key)
     {
         return $this->di->get($key);
     }

}