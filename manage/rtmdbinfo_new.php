<?php
session_start();


if ('localhost' == $_SERVER['HTTP_HOST']) {  //this is my local host
    $host="localhost";
    $username="root";
    $password="";
    $database="btm_broker";
    }else{
    $host = 'localhost';
    $username = 'machinre_sari';
    $password = 'G00342899';
    $database = 'machinre_btm_broker';
}


$db = mysql_connect($host,$username,$password);
mysql_select_db($database, $db) or die( "Unable to select database,
          make sure it exists and that the username and password are
          correct and then run this page again.");

?>

