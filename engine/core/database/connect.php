<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 10:14
 */
namespace engine\core\database;

use PDO;
use engine\tools; // debug

use engine\core\config\config;

class connect {

    private  $dbconnect;

    public function __construct()
    {
        $this->setConnect();
    }

    /**
     * @return $this
     */


     public function setConnect()
     {
         $ini_array = parse_ini_file("config.ini");

         $dsn = 'mysql:dbname='.$ini_array[dbname].';host='.$ini_array[host];

         $user = $ini_array[username];
         $password = $ini_array[userpass];

         $this->dbconnect  = new PDO($dsn, $user, $password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

         return $this;

     }


    /**
     * @return array
     */
    public function query($sql,$value=[]){

        $line = $this->dbconnect->prepare($sql);

        $line->execute($value);

        $result = $line->fetchAll(PDO::FETCH_OBJ);

        if($result=== false){
            return [];
        }

        return $result;

    }

}

