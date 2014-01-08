<?php
if(empty($_SESSION['LoggedIn']) && empty($_SESSION['Username'])){
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){  
  $username = $_COOKIE['username'];
  $password = $_COOKIE['password'];
  login ($username, $password);
      }
      }
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
welcome($admin, $now);
					 }
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);    
    login ($username, $password);
    welcome ($admin, $now);
}
else
{
$_SESSION['last_page']=curPageURL();
login_form ();   
}
?>