<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.10.2017
 * Time: 9:31
 */

namespace cms\controller;

use engine\controller;

class CmsController extends controller {
    /**
     * HomeController constructor
     * @param \engine\DI\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function header()
    {

    }

}