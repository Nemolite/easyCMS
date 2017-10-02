<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.10.2017
 * Time: 14:35
 */

namespace engine\core\Template;


class view {

    public function __construct()
    {
        //
    }

    public function render($template, $vars = [])
    {
        $templatePath = ROOT_DIR.'/content/themes/default/'.$template.'.php';

        if (!is_file( $templatePath))
        {
            throw new \InvalidArgumentException
            (sprintf('Temlate "%s" not found in "%s"',$template,$templatePath));
        }

        extract($vars);

        ob_start();

        ob_implicit_flush();

        try {

            require $templatePath;

        }catch (\Exception $e){
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();

    }

}