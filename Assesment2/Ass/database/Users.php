<?php
// Fetch Users data
class Users extends DBController{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->conn)){
            return null;
        }

        $this->db = $db; 
    }

    public function getUsersData($table){
        $result = $this->db->conn->query("Select * from {$table}");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getSellerProductData($seller){
        $result = $this->db->conn->query("
        SELECT Listing.listingID, Product.productCode, Product.productName, Product.productImage, Seller.sellerFName
        FROM listing
        INNER JOIN Product ON Product.productCode = Listing.productCode
        INNER JOIN Seller ON Seller.sellerID = Listing.sellerID
        WHERE Seller.sellerID like '$seller';
        ");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
}