<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.10.2017
 * Time: 14:47
 */

namespace engine\service\View;

use engine\service\AbstractProvader;
use engine\core\Template\view;


class Provider extends AbstractProvader {



    public $serviceName = 'view';


    public function init()
    {
        $view = new view();

        $this->di->set($this->serviceName,$view);
    }

}