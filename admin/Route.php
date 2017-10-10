<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.10.2017
 * Time: 16:23
 */

$this->router->add('login','/admin/login/','LoginController:form');
$this->router->add('auth-admin','/admin/auth/','LoginController:authAdmin','POST');
$this->router->add('dashboard','/admin/','dashboardController:index');