<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 02/09/2018
 * Time: 12:26 AM
*/

include_once "config/config.module";
include_once "global/data.connection.module";
include_once "language/en_us.php";
include_once "language/url.module";

if (isset($_REQUEST['page'])){
    //echo"display page";
      require "page.module";
}elseif (isset($_REQUEST['submit'])) {
    require "model/model.module";
}elseif (isset($_GET['login'])){
    if ($_REQUEST['login'] === "login"){
        session_unset();
        session_destroy();
        include_once "template/login.phtml";
    }elseif ($_REQUEST['login']==="register"){
        session_unset();
        session_destroy();
        include_once "template/register.phtml";
    }elseif ($_REQUEST['login'] ==="recovery"){
        session_unset();
        session_destroy();
        include_once "template/recovery.phtml";
    }

}else{
    session_unset();
    session_destroy();
    include_once "template/login.phtml";
}







