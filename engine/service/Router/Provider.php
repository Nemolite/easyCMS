<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2017
 * Time: 15:28
 */

namespace engine\service\Router;

use engine\core\Router\Router;
use engine\service\AbstractProvader;


class Provider extends AbstractProvader{

    public $serviceName = 'router';


    public function init()
    {
        $router = new Router('cms/');

        $this->di->set($this->serviceName,$router);
    }
}