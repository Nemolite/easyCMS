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
use engine\core\Auth\Auth;

class LoginController extends controller {

    protected $auth;

    public function  __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();
    }

    public function form()
    {
       print_r($_COOKIE);
       $this->view->render('login');
    }

    public function authAdmin()
    {

        $params = $this->request->post;

        echo "<pre>";
        print_r($params);
        echo "</pre>";

        $query = $this->db-> query('
        SELECT *
        FROM `user`
         WHERE email ="' . $params['email'] . '"
         AND password = "' . md5($params['password']) .'"
         LIMIT 1
        ');

        echo "<pre>";
        print_r($query);
        echo "<pre>";

        exit;
        //$this->auth->authorize('assa');

       // print_r($params);

        // WHERE email =' . $params['email'] . '
        // AND password = ' . md5($params['password']) . '
        // LIMIT 1
    }
}