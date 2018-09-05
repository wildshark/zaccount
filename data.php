<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 05/09/2018
 * Time: 6:18 AM
 */

header("Content-Type: application/json");

include_once "config/config.module";
include_once "global/data.connection.module";

$d ="SELECT * FROM get_chart";
$result = $conn->query($d);
if ($result->num_rows > 0){
   $data = array();
   foreach ($result as $row){
        $data[] = $row;
   }
}

$result->close();
$conn->close();
print json_encode($data);
?>
