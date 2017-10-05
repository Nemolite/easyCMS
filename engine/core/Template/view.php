<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.10.2017
 * Time: 14:35
 */

namespace engine\core\Template;

use engine\core\Template\Thema;


class view {

    protected $thema;

    public function __construct()
    {
        $this->thema = new Thema();
    }

    public function render($template, $vars = [])
    {
        $templatePath = $this->getTempLatePath($template, ENV);

        if (!is_file( $templatePath))
        {
            throw new \InvalidArgumentException
            //выводим отформатированное сообщение об отсутствии шаблона
            (sprintf('Temlate "%s" not found in "%s"',$template,$templatePath));
        }



        $this->thema->setData($vars);
        //extract — Импортирует переменные из массива в текущую таблицу символов
        extract($vars);

        ob_start();

        //включаем неявный сброс
        ob_implicit_flush();

        try {

            require $templatePath;

        }catch (\Exception $e){
            //  если ошибка отключаем и очищаем буфер при этом данные будут стерты
            ob_end_clean();
            throw $e;
        }
        // ob_get_flush — Сброс буфера вывода,
        // возвращая его содержимое и
        // отключение буферизации вывода
        // данные будут выведены
        echo ob_get_clean();

    }

    private function getTempLatePath($template,$env = null)
    {
        switch ($env)
        {
            case 'admin':
                return ROOT_DIR. '/View/'.$template.'.php';
            case 'cms':
                return ROOT_DIR. '/content/themes/default/'.$template.'.php';
            default:
                return ROOT_DIR. '/View/'.$template.'.php';
        }
    }

}