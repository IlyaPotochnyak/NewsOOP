<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 16.05.2017
 * Time: 12:56
 */

//require_once __DIR__ . '/../models/News.php';

class NewsController
{
    public function actionAll()
    {

        $items = News::getAll();
        include __DIR__ . '/../views/news/all.php';
    }

    public function actionOne()
    {
//        echo 'actionOne'; die;
     $id = $_GET['id'];
     $item = News::getOne($id);
     include __DIR__ . '/../views/news/one.php';
    }

}