<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2017
 * Time: 16:17
 */

namespace engine\core\Router;


class DispatchedRoute
{
   private $controller;
   private $parametres;

    /**
     * @param $controller
     * @param array $parametres
     */
    public function __construct ($controller ,$parametres = [] )
    {
        $this->controller = $controller;
        $this->parametres = $parametres;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getParametres()
    {
        return $this->parametres;
    }
}