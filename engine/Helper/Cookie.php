<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.10.2017
 * Time: 13:36
 */

namespace engine\Helper;


class Cookie {

    public static function  set ($key, $value, $time = 3136000)
    {
        setcookie($key, $value, time() + $time , '/');
    }

    public static function get($key)
    {
       if ( isset($_COOKIE[$key]) )
       {
           return $_COOKIE[$key];
       }
        return null;
    }

    /**
     * @param $key
     */
    public static function delete($key)
    {
        if ( isset($_COOKIE[$key]) )
            {
              self::set($key, '',-3600);
                unset($_COOKIE[$key]);
            }
    }

}