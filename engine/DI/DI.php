<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 7:49
 */

namespace engine\DI;


class DI {

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
     * @return mixed
     */
    public function get($key){
        return $this->continer[$key];
    }

    /**
     * @param $key
     * @return mixed
     */
    public  function get($key){
        return $this->has($key);
    }

}