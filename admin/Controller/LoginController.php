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

        if ($this->auth->hashUser()!==null)
        {
            $this->auth->authorize($this->auth->hashUser());
        }

        if ($this->auth->autorized())
        {
            header('Location: /admin/',true, 301);
        }
    }

    public function form()
    {
  
       $this->view->render('login');
    }

    public function authAdmin()
    {

        $params = $this->request->post;


        $query = $this->db-> query('
        SELECT *
        FROM `user`
         WHERE email ="' . $params['email'] . '"
         AND password = "' . md5($params['password']) .'"
         LIMIT 1
        ');

        if(!empty($query))
        {
            $user = $query[0];


            if ($user['role']=='admin')
            {
                $hash = md5($user['id'].$user['email'].$user['password'].$this->auth->salt());

                $this->db->execute('
                    UPDATE user
                    SET hash = "'.$hash.'"
                    WHERE id='.$user['id'].'

                ');

                $this->auth->authorize($hash);

                header('Location: /admin/login/',true, 301);
                exit;
            }

        }


    }
}