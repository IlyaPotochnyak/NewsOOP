<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 16.05.2017
 * Time: 14:40
 */
//abstract class AbstractModel
//    implements I_Model
//{
//
//    protected static $table;
//    protected static $class;
//
//    public static function getAll() {
//
//        $db = new DB;
//
//        return $db->queryAll('SELECT * FROM '. static::$table, static::$class);
//    }
//
//    public static function getOne($id)
//    {
//        $db = new DB();
//
//        return $db->queryOne('SELECT * FROM ' . static::$table . ' WHERE id='. $id, static::$class);
//    }
//
//
//
//}

abstract class AbstractModel
{
    static protected $table;

    /**
     * @return mixed
     */
    public static function getTable()
    {
        return static::$table;
    }

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::getTable();
        $db = new DB;
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOne($id)
    {
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE id=:id';
        $db = new DB;
        return $db->query($sql, [':id' => $id]);
    }

    
}