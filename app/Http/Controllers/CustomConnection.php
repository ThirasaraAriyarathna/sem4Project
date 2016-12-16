<?php

/**
 * Created by PhpStorm.
 * User: Saarrah I  Isthikar
 * Date: 12/13/2016
 * Time: 1:06 AM
 */


namespace App\Http\Controllers;

class CustomConnection
{
    public static function db_connect()

    {
        $server_name = "localhost";
        $username = "root";
        $password = "";
        $db = "ministry_of_education";
        $conn = new \mysqli($server_name, $username, $password, $db);


// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function insert($entity){

        $connection = CustomConnection::db_connect();
        $table = $entity->getTableName();
        $fieldNames = $entity->getFieldNames();
        $values = [];
        foreach ($fieldNames as $field){
            $method = 'get'.$field;
            $values [] = $entity->$method();
        }

        $values = implode("','", $values);
        $fields = implode(',', $fieldNames);
        $query = "INSERT INTO " . $table . "("  .$fields. ")" . "VALUES ('"  . $values . "')";
        //$query = "insert into user values ('Thirasara','thira','admin')";
        mysqli_query($connection, $query);
        return $query;
    }
}

