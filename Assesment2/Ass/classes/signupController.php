<?php

class SignupController{
    private $uid;
    private $psw;
    private $psw_repeat;
    private $email;
    private $acc_type;

    public function __construct($uid, $psw, $psw_repeat, $email, $acc_type){
        $this->uid = $uid;
        $this->psw = $psw;
        $this->psw_repeat = $psw_repeat;
        $this->email = $email;
        $this->acc_type = $acc_type;

    }
}