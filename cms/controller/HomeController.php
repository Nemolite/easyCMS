<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.09.2017
 * Time: 10:23
 */

namespace cms\controller;

use engine\controller;

class HomeController extends controller
{
    public function __construct($di)
    {
      parent::__construct($di);
    }

    public function index()
    {
        echo 'Index Pages';
    }

    public function news()
    {
        echo 'News Pages';
    }

}