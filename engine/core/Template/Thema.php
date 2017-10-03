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

    protected $data = [];

    public function header($name  = null)
    {
            $name = (string) $name;
            $file = 'header';


        if($name !== '')
        {
           $file = sprintf('header-%s',$name);
            //$file = sprintf(self::RULES_NAME_FILE['header'],$name);
        }


        $this->loadTemplateFile($file);
    }

    public function footer($name  = '')
    {

        $name = (string) $name;
        $file = 'footer';


        if($name !== '')
        {
            $file = sprintf('footer-%s',$name);
        }


        $this->loadTemplateFile($file);



    }

    public function sidebar($name  = '')
    {

        $name = (string) $name;
        $file = 'sidebar';


        if($name !== '')
        {
            $file = sprintf('sidebar-%s',$name);
        }


        $this->loadTemplateFile($file);

    }

    public function block($name = '',$data =[])
    {

        $name = (string) $name;

        if($name !== '')
        {
            $this->loadTemplateFile($name,$data);
        }



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

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}