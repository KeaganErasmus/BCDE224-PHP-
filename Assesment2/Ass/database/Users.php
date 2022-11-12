<?php

// Fetch Users data
class Users{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->conn)){
            return null;
        }

        $this->db = $db; 
    }

    public function getUsersData($table = 'Users'){
        $result = $this->db->conn->query("Select * from {$table}");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
}