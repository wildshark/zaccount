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
    public $name ='';
    public $email ='';
    public $mobile = '';
    public $lang ='en';

    public function user_login($conn){

        $user = $this->username;
        $pwd = $this->password;
        $language = $this->lang;
        $pwd =md5($pwd);
        $user_token = md5($pwd ." ". $user);
        $sql ="SELECT * FROM `get_user` where token='$user_token'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if ($row['username'] === $user && $row['password'] === $pwd){


                $_SESSION["user-id"] = $row['userID'];
                $_SESSION['token'] = $user_token;
                $_SESSION['language'] = $language;

                $to = $row['email'];
                $subject = "Login to zaccount ". date("dd-mm-YY");
                $body = "User". $user ."just login at ". date("dd-mm-YYY");
                $header = "From : zaccount@zaccount.com";
                mail($to,$subject,$body,$header);

                header("location: index.php?page=dashboard&lang={$language}&token={$user_token}");
            }else{
                session_unset();
                session_destroy();
                header("location: index.php?login=login&lang=en");
            }

        }
    }

     function user_sign_up($conn){

        $f_name = $this->name;
        $email = $this->email;
        $mob = $this->mobile;
        $user = $this->username;
        $pwd = $this->password;
        $language = $this->lang;
        $pwd = md5($pwd);
        $user_token = md5($pwd." ".$user);

         //$lang = self::Language();
         $sql ="INSERT INTO `user` (`fname`,`username`,`email`,`mobile`, `password`, `token`,`language`) 
VALUES ('$f_name','$user','$email','$mob','$pwd','$user_token','$language')";
         $result = $conn->query($sql);
         $user_id = $conn->insert_id;
         if ($result == TRUE){
             $_SESSION["user-id"] = $user_id;
             $_SESSION['token'] = $user_token;
             header("location: index.php?page=dashboard&lang=en&token={$user_token}");
         } else{
             header("location: index.php?login=login&lang=en&error=1");
         }
    }

}

$login = new LogIn_Details();
if ($_POST['submit'] === "sign-up"){

    $login->email =$_POST['email'];
    $login->username = $_POST['username'];
    $login->password =$_POST['password'];
    $login->name = $_POST['full-name'];
    $login->mobile = $_POST['mobile'];
    $login->user_sign_up($conn);

}elseif($_POST['submit'] === "sign-in"){
    if(isset($_POST['username'])){
        $login->username = $_POST['username'];
    }else{
        header("location: index.php?page=login&lang=en");
    }

    if(isset($_POST['password'])){
        $login->password = $_POST['password'];
    }else{
        header("location: index.php?page=login&lang=en");
    }
    $login->user_login($conn);
}
