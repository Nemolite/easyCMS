<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.10.2017
 * Time: 21:02
 */

namespace engine\service\Request;

use engine\service\AbstractProvader;
use engine\core\Request\request;


class Provider extends AbstractProvader {

    public $serviceName = 'request';

    public function  init()
    {
        $request = new Request();

        $this->di->set($this->serviceName,$request);
    }

}