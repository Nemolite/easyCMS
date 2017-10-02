<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.10.2017
 * Time: 14:31
 */

/**
 * list route
 */
$this->router->add('home','/','HomeController:index');
$this->router->add('home_next','/home','HomeController:next_index');
$this->router->add('news','/news','HomeController:news');
$this->router->add('new_single','/news/(id:int)','HomeController:news');