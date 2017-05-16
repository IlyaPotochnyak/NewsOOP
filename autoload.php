<?php
/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 16.05.2017
 * Time: 14:25
 */


function __autoload($class)
{
    if (file_exists(__DIR__ . '/controllers/' . $class . '.php')){
        require __DIR__ . '/controllers/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/models/' . $class . '.php')){
        require __DIR__ . '/models/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/classes/' . $class . '.php')){
        require __DIR__ . '/classes/' . $class . '.php';
    }
}