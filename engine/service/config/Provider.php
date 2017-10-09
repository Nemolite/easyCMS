<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.10.2017
 * Time: 15:38
 */

namespace engine\service\config;

use engine\core\config\config;
use engine\service\AbstractProvader;


class Provider extends AbstractProvader
{
    public $serviceName = 'config';

    function init()
    {
        $config['main'] = config::file('main');
        $config['database'] = config::file('database');

        $this->di->set($this->serviceName,$config);
    }
}