<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.09.2017
 * Time: 10:23
 */

namespace cms\controller;


class HomeController extends CmsController
{


    public function index()
    {
        echo 'Index Pages';
    }

    public function news($id)
    {
       // echo 'News Pages'.$id;
        echo $id;
    }

    public function next_index()
    {
        echo 'Next Index Pages';
    }

}