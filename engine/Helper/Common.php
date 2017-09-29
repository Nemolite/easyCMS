<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.09.2017
 * Time: 8:24
 */

namespace engine\Helper;


class Common
{
    function isPost()
    {
        if($_SERVER[REQUEST_METHOD] == 'POST')
        {
            return true;
        }
        return false;
    }

    function getMethod()
    {
        return $_SERVER[REQUEST_METHOD];
    }

    function getPethUri()
    {
        $pachUri = $_SERVER[REQUEST_URI];

        if ($position = strpos($pathUri,'?'))
        {
            $pachUri = substr($pathUri,0,$position);
        }
        return $pachUri;
    }
}