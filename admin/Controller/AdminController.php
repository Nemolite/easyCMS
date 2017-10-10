<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.10.2017
 * Time: 9:31
 */

namespace admin\Controller;

use engine\controller;
use engine\core\Auth\Auth;

class AdminController extends controller {

    //
    protected $auth;



    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        $this->checkAuthorization();

        if (isset($this->request->get['logout']))
        {
            $this->auth->unAuthorize();
        }

    }

    public  function checkAuthorization()
    {
        if ($this->auth->hashUser()!==null)
        {
            $this->auth->authorize($this->auth->hashUser());
        }

        if (!$this->auth->autorized()) //and $this->request->server['REQUEST_URI']!=='/admin/login/
        {
            //redirect
            header('Location: /admin/login/',true,301);
            exit;
        }

    }



}