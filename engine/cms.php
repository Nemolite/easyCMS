<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 8:23
 */

namespace engine;
use engine\core\Router\DispatchedRoute;
use engine\Helper\Common;
//use cms\controller;

use engine\tools;


class cms {
    private $di;

    public $router;

    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * start cms
     */
    public function run()
    {
        try {
       require_once __DIR__.'/../cms/Route.php';

        $routerDispatch = $this->router->dispatch(Common::getMethod(),Common::getPethUri());

        if ($routerDispatch==null)
        {
            $routerDispatch = new DispatchedRoute('ErrorController:page404');
        }



        list($class,$action) = explode(':',$routerDispatch->getController(),2);
        $controller = '\\cms\\controller\\'.$class;
        $objectController = new $controller($this->di);
        $parametres = $routerDispatch->getParametres();

//         echo "<pre>";
//         print_r($parametres);
//            echo "</pre>";

            call_user_func_array([$objectController,$action],$parametres );

        }catch (\Exception $e){
            echo $e->getMessage();
            exit;
        }

    }

}