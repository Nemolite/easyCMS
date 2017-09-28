<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 8:23
 */

namespace engine;

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
        echo "<pre>";
        print_r($this->di);
        echo "</pre>";


    }

}