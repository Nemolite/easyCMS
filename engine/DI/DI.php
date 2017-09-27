<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 7:49
 */

namespace engine\DI;


class DI {
    /**
     * @var array
     */
    private $continer = [];

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value){
        $this->continer[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return bool
     */

    public function get($key){
        return $this->has($key);
    }

    /**
     * @param $key
     * @return bool
     */
    public  function has($key){

        return isset($this->continer[$key]);
    }

}