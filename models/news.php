<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 16.05.2017
 * Time: 11:11
 */

//require_once __DIR__ . '/../classes/DB.php';

class News extends AbstractModel {


    public $id;
    public $title;
    public $newText;
    public $date;

    protected static $table = 'news';
    protected static $class = 'News';


}