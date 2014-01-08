<?php
session_start(); 
$username="";
$password="";
$database="btm_broker";
$host="localhost";
mysql_connect($host, $username, $password);
mysql_select_db($database)or die("'not connected'". mysql_error());
mysql_select_db($database)or die("error happened2");
?>

