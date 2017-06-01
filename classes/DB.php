<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 16.05.2017
 * Time: 10:43
 */
class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {


        $this->dbh = new PDO('mysql:dbname=news;host=localhost', 'root', '');
    }

    /**
     * @param string $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }


    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);

    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

//    public function queryAll($sql, $class = 'stdClass')
//    {
//        $res = mysql_query($sql);
//        if (false === $res) {
//            return false;
//        }
//
//        $ret =[];
//
//        while ($row = mysql_fetch_object($res,$class)) {
//            $ret[]= $row;
//        }
//
//        return $ret;
//
//    }
//
//    public function queryOne($sql, $class = 'stdClass')
//    {
//        return $this->queryAll($sql, $class)[0];
//        
//    }

}