<?php

namespace model;

use connect\connect;
use log\Log;

class Film
{

    private function connect()
    {
        $object = new connect();
        $object = $object->getConnection();

        return $object;
    }

    public function create($table, array $data)
    {
        $fields = array_keys($data);
        $values = array_values($data);

        $queryFields = '';
        $queryValues = '';
        for($i = 0 ; $i < count($fields); $i++){
            if($i <  count($fields)-1){
            $queryFields .= '`'.$fields[$i].'`,';
                $queryValues.= "'".$values[$i]."',";
            }else{
                $queryFields .= '`'.$fields[$i].'`';
                $queryValues.= "'".$values[$i]."'";
            }
        }
        $stmt = $this->connect()->prepare("INSERT INTO `$table`($queryFields) VALUES ($queryValues)");
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }


    public function delete($table, $field, $value)
    {

        $stmt = $this->connect()->prepare("DELETE FROM   $table    WHERE   $field = $value");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}