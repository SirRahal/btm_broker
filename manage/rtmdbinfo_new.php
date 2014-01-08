<?
session_start(); 
$username="";
$password="";
$database="rtm";
$host="localhost";
mysql_connect($host, $username, $password);
mysql_select_db($database); 
?> 