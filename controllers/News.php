<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 16.05.2017
 * Time: 12:56
 */

//require_once __DIR__ . '/../models/News.php';

namespace Application\Controllers;

use Application\Models\News as NewsModel;

class News
{
    public function actionAll()
    {
        $items = NewsModel::findAll();


        $view = new \View();
        $view->items = $items;
//        var_dump($view);die;
        $view->display('news/all.php');


    }



    public function actionOne()
    {
//        echo 'actionOne'; die;
     $id = $_GET['id'];
//     $item = News::getOne($id);



        $view->assign('item', $item);
        $view->display('news/one.php');
//     include __DIR__ . '/../views/news/one.php';
    }

}