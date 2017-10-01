<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2017
 * Time: 16:08
 */

namespace engine\core\Router;


class URLDispatcher {
    /**
     * @var array
     */
    private $method = [
        'GET',
        'POST'
    ];
    /**
     * @var array
     */
    private $routes = [
        'GET'=> [],
        'POST'=> []
    ];
    /**
     * @var array
     */
    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    /**
     * @param $key
     * @param $pattern
     */
    public function addPatteren($key ,$pattern )
    {
        $this->patterns[$key] = $pattern;
    }

    /**
     * @param $method
     * @return array
     */
    private function routes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }


    public function register($method,$pattern,$controller)

    {
        print_r($pattern);
        echo "<br>";

        $convert = $this->convertPattern($pattern);


        $method = strtoupper($method);
        //$this->routes[$method][$pattern] = $controller;
        $this->routes[$method][$convert] = $controller;
    }

    private function convertPattern($pattern)
    {
        if(strpos($pattern, '(')=== false)
        {
            return $pattern;
        }

        $ideal= '#\((\w+):(\w+)\)#';
        return preg_replace_callback($ideal,[$this, 'replacePatteren'],$pattern);
    }

    private function replacePatteren($matches)
    {
        echo "<pre>";
        print_r($matches);
        echo "</pre>";

        echo "<br>";
        $ret = '(?<'.$matches[1].'>'.strtr($matches[2],$this->patterns).')';
        print_r($ret);
        echo "<br>";

        return $ret;
    }

    private function processParam($parameters)
    {
        foreach($parameters as $key => $value)
        {
            if (is_int($key))
            {
                unset($parameters[$key]);
            }
        }

        return $parameters;
    }




    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */

    public function dispatch($method, $uri)
    {
        $routers = $this->routes(strtoupper($method));

        if(array_key_exists($uri, $routers))
        {
            return new DispatchedRoute($routers[$uri]);
        }

        return $this->doDispatch($method, $uri);
    }

    private function doDispatch($method, $uri)
    {
        foreach($this->routes($method) as $route => $controller)
        {
            $pattern = '#^'.$route.'$#s';

            if(preg_match($pattern,$uri, $parameters))
            {
                return new DispatchedRoute($controller,$this->processParam($parameters));
            }
        }
    }


}