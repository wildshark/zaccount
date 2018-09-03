<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 02/09/2018
 * Time: 5:28 PM
 */

class login{

    protected $username;
    protected $password;

    public function user_login($conn){

        $this->username;
        $this->password;

    }

    public function  user_sign_up($conn){

    }

}

$obj = new login();
$obj->user_login($username,$password);
$username = $_POST['username'];
$password = $_POST['password'];
