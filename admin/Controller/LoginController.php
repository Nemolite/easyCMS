<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.10.2017
 * Time: 16:45
 */

namespace admin\Controller;

use engine\controller;
use engine\DI\DI;

class LoginController extends controller {

    public function  __construct(DI $di)
    {
        parent::__construct($di);
    }

    public function form()
    {

       $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;

        print_r($params);
    }
}