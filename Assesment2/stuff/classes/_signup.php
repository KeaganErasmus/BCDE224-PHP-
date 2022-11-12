<?php

class Signup extends DBController{

    protected function setUser($uid, $psw, $email){
        $stmt = $this->connect()->prepare('INSERT INTO Users (usersUsername, usersPsw, usersEmail) VALUES (?, ?, ?);');

        $hasedPsw = password_hash($psw, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hasedPsw, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT usersUsername FROM Users WHERE usersUsername = ? OR usersEmail = ?;');

        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }


        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }

        return $resultCheck;
    }

}