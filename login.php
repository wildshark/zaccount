<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 02/09/2018
 * Time: 5:28 PM
 */
include_once "config/config.module";
include_once "global/data.connection.module";

class LogIn_Details{

    public $username ='';
    public $password ='';
    public $fname ='';
    public $sname ='';
    public $email ='';
    public $mobile = '';
    public $address ='';

    private function generate_token(){
        $user =md5($this->username);
        $password =md5($this->password);
        $token = md5($user && $password);

        return $token;
    }

    public function user_login(){

        $this->username;
        $this->password;
        $user_token =md5($this->username && $this->password);
        //$sql =""
    }

     function user_sign_up($conn){

        $f_name = $this->fname;
        $l_name = $this->sname;
        $email = $this->email;//$_POST['email'];
        $mob = $this->mobile;
        $pwd =$this->password; //$_POST['password'];

         $token = self::generate_token();

         //$lang = self::Language();
         $sql ="INSERT INTO `user` (`fname`,`sname`,`email`,`mobile`, `password`, `token`) 
VALUES ('$f_name','$l_name','$email','$mob','$pwd','$token')";
         $result = $conn->query($sql);

         if ($result == TRUE){
             header("location: index.php?page=expenses&lang=en");
         } else{
             header("location: index.php?page=expenses&lang=en&error=1");
         }
    }

}

$login = new LogIn_Details();
/**
if(isset($_POST['email'])){
    $login->username = $_POST['email'];
}else{
    echo"no email";
}

if(isset($_POST['password'])){
    $login->password = $_POST['email'];
}else{
    echo"no email";
}

//$login->password = $_POST['password'];
$login->user_login();
**/

//$login->user_sign_up();
$login->email =$_POST['email'];
$login->password =$_POST['password'];
$login->fname = $_POST['fname'];
$login->sname = $_POST['sname'];
$login->mobile = $_POST['mobile'];
//$login->address = $_POST['address'];


$login->user_sign_up($conn);