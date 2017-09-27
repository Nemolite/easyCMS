<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 10:14
 */
namespace engine\core\database;

use engine\tools;

class connect {
     public function test()
     {
         define('BIRD', 'Dodo bird');

// Обрабатываем без секций
         $ini_array = parse_ini_file("config.ini");

         $disp = new tools();
         $disp->show($ini_array);


// Обрабатываем с секциями
         $ini_array = parse_ini_file("config.ini", true);
         $disp->show($ini_array);
     }
}