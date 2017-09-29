<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 8:23
 */

namespace engine;
use engine\Helper\Common;
//use cms\controller;

use engine\tools;


class cms {
    private $di;

    public $router;

    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * start cms
     */
    public function run()
    {
        $this->router->add('home','/','HomeController:index');
        $this->router->add('news','/news','HomeController:news');



        $this->router->add('product','/user/12','ProductController:index');


//        echo "<pre>";
//        print_r($this->di);
//        echo "</pre>";
//
//
//
//        echo "<pre>";
//        print_r($_SERVER);
//        echo "</pre>";

//        echo Common::getMethod();
//
//        echo Common::getPethUri();

        $routerDispatch = $this->router->dispatch(Common::getMethod(),Common::getPethUri());

        list($class,$action) = explode(':',$routerDispatch->getController(),2);

//        echo "<pre>";
//        print_r($class);
//        echo "</pre>";
//
//        echo "<pre>";
//        print_r($action);
//        echo "</pre>";


        $controller = '\\cms\\controller\\'.$class;
//        print_r($controller);

        $tmp = new $controller($this->di);

        call_user_func_array([$tmp,$action], $routerDispatch->getParametres());

//        echo "<pre>";
//        print_r($routerDispatch);
//        echo "</pre>";

    }

}