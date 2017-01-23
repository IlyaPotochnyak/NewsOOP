<?php

// require_once __DIR__ . '/../classes/DB.php';
/**
 *
 */
class News extends AbstractModel
{
  public $id;
  public $date;
  public $u_date;
  public $title;
  public $text;

protected static $table = 'news';
protected static $class = 'news';

  
}


 ?>
