<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 08/09/2018
 * Time: 5:12 PM
 */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://usercountry.com/v1.0/json/173.194.192.101');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);
echo $result;

