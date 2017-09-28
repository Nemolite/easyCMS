<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.09.2017
 * Time: 8:23
 */

namespace engine;

use engine\tools;


class cms {
    private $di;

    public function __construct($di)
    {
        $this->di = $di;
    }

    /**
     * start cms
     */
    public function run()
    {
        echo "<pre>";
      print_r($this->di);
        echo "</pre>";
    }

}