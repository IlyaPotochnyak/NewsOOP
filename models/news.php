<?php

require_once __DIR__ . '/../classes/DB.php';
/**
 *
 */
class News
{
  public $id;
  public $date;
  public $u_date;
  public $title;
  public $text;

   public static function getAll()
  {
    $db = new DB;
    return $db->query('SELECT * FROM news', News);
  }
}


 ?>