<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 02/09/2018
 * Time: 12:26 AM
 */
include_once "config/config.module";
include_once "global/data.connection.module";
include_once "global/function.module";
include_once "language/url.module";
include_once "language/language.module";


if (isset($_REQUEST['page'])){
    //echo"display page";
      require "page.module";
}elseif (isset($_REQUEST['submit'])) {
    require "model/model.module";
}else{
  //  require "language/en_us.php";
  //  require "template/dashboard.phtml";
}


