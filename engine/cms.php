<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 8:23
 */

namespace engine;
use admin\Controller\LoginController;
use engine\core\Router\DispatchedRoute;
use engine\Helper\Common;

use cms\controller\AdminController;
use engine\tools;


class cms  {
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
       require_once __DIR__.'/../'. mb_strtolower(ENV) .'/Route.php';

        $routerDispatch = $this->router->dispatch(Common::getMethod(),Common::getPethUri());

        if ($routerDispatch==null)
        {
            $routerDispatch = new DispatchedRoute('ErrorController:page404');
        }



        list($class,$action) = explode(':',$routerDispatch->getController(),2);
        $controller = '\\'. ENV .'\\controller\\'.$class;

         //   echo "<pre>";
         //   print_r($controller);
         //   echo "</pre>";

        $objectController = new $controller($this->di);
           // var_dump($objectController);


        $parametres = $routerDispatch->getParametres();

         //echo "<pre>";
         //print_r($parametres);
         //echo "</pre>";

            call_user_func_array([$objectController,$action],$parametres );

        }catch (\Exception $e){
            echo $e->getMessage();
            exit;
        }

    }

}