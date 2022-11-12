<?php

class SignupController extends Signup{
    private $uid;
    private $psw;
    private $psw_repeat;
    private $email;

    public function __construct($uid, $psw, $psw_repeat, $email){
        $this->uid = $uid;
        $this->psw = $psw;
        $this->psw_repeat = $psw_repeat;
        $this->email = $email;
    }

    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->invalidUid() == false){
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->pswMatch() == false){
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->userExist() == false){
            header("location: ../index.php?error=userExist");
            exit();
        }

        $this->setUser($this->uid, $this->psw, $this->email);
    }

    private function emptyInput(){
        $result;

        if(empty($this->uid || $this->psw || $this->psw_repeat || $this->email || $this->acc_type)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    private function invalidUid(){
        $result;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    private function invalidEmail(){
        $result;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    private function pswMatch(){
        $result;

        if($this->psw !== $this->psw_repeat){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    private function userExist(){
        $result;

        if(!$this->checkUser($this->uid, $this->email)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

}