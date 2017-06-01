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

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __isset($k)
    {
        return isset($this->data[$k]);
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
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findOneByColumn($column, $value)
    {

        $db = new DB;
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE ' . $column . '=:value';
        $res=  $db->query($sql, [':value' => $value]);

        if (empty($res)) {

            throw new ModelException('Ничего не найдено');
        }


            return $res;


    }

    protected function insert()
    {
        $cols = array_keys($this->data);

        $data = [];
        foreach ($cols as $col) {

            $data[':' . $col] = $this->data[$col];
        }


        $sql = '
          INSERT INTO ' . static::$table . ' 
          (' . implode(', ', $cols) .') 
          VALUES 
          (' . implode(', ', array_keys($data)) .')           
          ';



        $db = new DB();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();

    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v){
            if ('date' == $k){
                continue;
            }
            $data[':'.$k] = $v;
            if ('id' == $k){
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }


        $sql = '
        UPDATE ' . static::$table .
            ' SET ' . implode(', ', $cols) .
            ' WHERE id=:id';
//        echo $sql;die;

        $db = new DB();

        $db->execute($sql, $data);


    }

    public function save()
    {
        if (!isset($this->id)){
            $this->insert();
        }
        else {
            $this->update();
        }
    }

    
}