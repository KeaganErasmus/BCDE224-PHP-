<?php
// Fetch product data
class Product extends DBController{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->conn)){
            return null;
        }

        $this->db = $db; 
    }

    public function getProductData($table = 'Product'){
        $result = $this->db->conn->query("Select * from {$table}");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
}