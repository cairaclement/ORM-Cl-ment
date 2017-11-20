<?php

namespace model;

use connect\connect;
use log\Log;

class Orm
{

    private function connect()
    {
        $object = new connect();
        $object = $object->getConnection();
        return $object;
    }



    public function getAll($table)
    {

        $stmt = $this->connect()->prepare("SELECT * FROM ".$table);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if(empty($result)) {
            $result = 'Table non valide';
        }
        return $result;
    }

    public function selectById($table, $id)
    {

        $stmt = $this->connect()->prepare("SELECT * FROM ".$table." WHERE id = ".$id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if(empty($result)) {
            $result = 'Table Name not found or invalid id';
        }
        return $result;
    }

    public function orderBy($table, $param)
    {

        $stmt = $this->connect()->prepare("SELECT * FROM ".$table." ORDER BY ".$param);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if(empty($result)){
            $result = 'Mauvaise table et/ou colonne';
        }
        return $result;
    }

    public function leftJoin($table1,$field1,$table2,$field2,$identifier1,$identifier2)
    {

        $stmt = $this->connect()->prepare("SELECT $table1.$field1 , $table2.$field2 FROM  $table1 LEFT JOIN  $table2  ON  $table1.$identifier1  =  $table2.$identifier2");
        $stmt->execute();
        $result = $stmt->fetchAll();

        if(empty($result)){
            $result = 'Invalid parameter, check order //TableName1-row1 TableName2-row2 identifier1-identifier2';
        }

        return $result;
    }

    public function countAll($table)
    {

        $stmt = $this->connect()->prepare("SELECT COUNT(*) FROM ".$table);
        $stmt->execute();
        $result = $stmt->fetch();

        if(empty($result)){
            $result = 'Table Name not found';
        }

        return $result;
    }


}