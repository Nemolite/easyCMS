<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.10.2017
 * Time: 16:45
 */

namespace admin\Controller;

class LoginController extends AdminController {

    public function form()
    {
       print_r($this->request->server['HTTP_HOST']);
       $this->view->render('login');
    }

}