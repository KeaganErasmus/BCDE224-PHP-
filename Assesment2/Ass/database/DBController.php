<?php

class DBController{
    // Database connection
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'agoradb';

    // connection property
    public $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (mysqli_connect_errno()){
            die("Fail" . mysqli_connect_error());
        }
    }

    public function __destruct(){
        $this->closeConnection();
    }

    // Close connection
    protected function closeConnection(){
        if ($this->conn != null){
            $this->conn->close();
            $this->conn = null;
        }
    }
}