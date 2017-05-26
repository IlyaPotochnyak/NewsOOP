<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 19.05.2017
 * Time: 16:04
 */
class View
    implements Countable
{

    protected $data = [];

//    public function assign($name, $value)
//    {
//        $this->data[$name] = $value;
//    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function render($template) {

        foreach ($this->data as $key => $val) {
            $$key = $val;
        }

        ob_start();

        include __DIR__ . '/../views/' . $template;

        $content = ob_get_contents();
//        var_dump($content); die;

        ob_end_clean();

        return $content;

    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function count()
    {

       return count($this->data);
    }
}