<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.10.2017
 * Time: 14:09
 */

namespace engine\core\Template;


class Thema {
//    const RULES_NAME_FILE = [
//        'header'=>'header-%s',
//        'footer'=>'footer-%s',
//        'sidebar'=>'sidebar-%s',
//    ];

    public $url = '';

    public function header($name  = null)
    {
            $name = (string) $name;
            $file = 'header';


        if($name !== '')
        {
            $file = sprintf('header-%s',$name);
        }


        $this->loadTemplateFile($file);
    }

    public function footer($name  = '')
    {

    }

    public function sidebar($name  = '')
    {

    }

    public function block($name = '',$data =[])
    {

    }

    private function loadTemplateFile($nameFile,$data = [])
    {
       $templateFile = ROOT_DIR. '/content/themes/default/'.$nameFile.'.php';

        if (is_file($templateFile)){
            extract($data);
            require_once $templateFile;
        }
        else
        {
            throw new \Exception(
                sprintf('View file $s does not exist',$templateFile)
            );
        }
    }
}