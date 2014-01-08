<?php 
include("rtmdbinfo_new.php");
include "functions.php";
include "define.php";
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
$admin=$_SESSION['Admin'];
$now=manage; 
if ($admin==1){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>RELIABLE TOOL &amp; MACHINE, INC.</title>
<style type="text/css" media="all">@import "../css/index.css";</style>

</head>
<body>

<!-- START OF HEADER SECTION -->
<div id="Header">


<a href="../index.php"><img src="../home_logo.jpg" width="327" height="100" alt="" border="0" align="left"/>
<img src="../home_right.jpg" width="479" height="100" alt="" border="0"align="right" /></a>
</div>
<!-- END OF HEADER SECTION -->
<!-- START OF MAIN CONTENT SECTION -->
<div id="Content">
<div align="center"><?include("seim.html");?></div>
<?
switch(@$_GET['ac'])
{
default:
include "home.php";
break;
case 'add_cat': 
 include "add_category.php";
break; 
case 'edit_cat': 
include "edit_category.php";
break; 
case 'add_item': 
include "item.php";
break;    
case 'edit_item': 
include "item.php";
break; 
case 'edit_inventory': 
include "edit_inventory.php";
break;       
case 'upload_pic': 
include "upload_pic.php";
break;
case 'upload_pic1': 
echo "<br><br><br><br>";
include "upload1.php";
break;
case 'upload_pic2': 
echo "<br><br><br><br>";
include "upload2.php";
break;
case 'view_offers': 
include "view_offers.php";
break;
case 'view_quote': 
include "view_quote_request.php";
break;
case 'multi_cat': 
include "multi_cat.php";
break;
case 'template': 
include "template.php";
break;                
} 
?>
</div>
<!--END OF MAIN CONTENT SECTION-->

<!--START MENU SECTION HERE-->
<div id="Menu">
<?
include("../login.php");
?> 
<div id="Menu-box">
<? include ("left_menu.php");?>
</div>
</div>
<!--END MENU SECTION HERE-->	
</body>
</html>
<?
}
else{

echo "<div align='center'><br><br><p>Sorry, you are not allowed access to this part of reliabletoolmachine.com.<br><br> Please Click <a href=\"../index.php\">Home Page</a>.</p></div>";

}
}

?>
