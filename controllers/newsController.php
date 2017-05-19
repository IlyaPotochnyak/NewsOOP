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

        $news = News::getAll();
        $view = new View();


        $view->items = $news;



        $view->display('news/all.php');

//        include __DIR__ . '/../views/news/all.php';
    }

    public function actionOne()
    {
//        echo 'actionOne'; die;
     $id = $_GET['id'];
     $item = News::getOne($id);

        $view->assign('item', $item);
        $view->display('news/one.php');
//     include __DIR__ . '/../views/news/one.php';
    }

}