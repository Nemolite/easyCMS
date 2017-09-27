<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 9:47
 */

namespace engine;


class tools {
   public function show($viwe)
    {
        echo "<pre>";
        print_r($viwe);
        echo "</pre>";
        var_dump($viwe);
    }

    public function showobj($viwe)
    {
        if(is_object($viwe)||is_array($viwe)){
            foreach ($viwe as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    echo $key1;
                    echo "=";
                    echo $value1;
                    echo "<br>";
                }
            }
        }

    }
}