<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.10.2017
 * Time: 16:47
 */

namespace admin\Controller;



class DashboardController extends AdminController {
    public function index()
    {
       // print_r($this->get('config'));
        $this->view->render('dashboard');
    }
}