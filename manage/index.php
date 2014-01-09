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
<title>BTM Broker</title>
<style type="text/css" media="all">@import "../css/index.css";</style>

</head>
<body>

<style>
    .menubar{
        width:100%;
        height:36px;
        background: #666;
        border-bottom:1px solid #000;
        margin:0 auto;
    }
    .menuitems{
        font-family: 'Droid Serif',serif;
        width: 1165px;
        margin:0 auto;
    }
    .menuitems a{
        padding:8px;
        float: left;
        margin-left: 10px;
        color: white;
        font-size:14px;
        font-weight: normal;
        display: block
    }
    .menuitem a:hover{
        color: #C3BBAD;
        opacity: 1;
        cursor:pointer;
        background: #666;
    }
    .banner{
        border-bottom:1px solid #000;
        background:#333;
        padding:2rem 0;
        margin:0;
        height:26px;
        z-index: 10000;
    }
    .banner_image{
        width: 1155px;
        margin: 0 auto;
    }
</style>

<div class="menubar">

    <div class="menuitems">
        <div class="menuitem"><a href="http://www.btmindustrial.com/">Home</a></div>
        <div class="menuitem"><a href="http://auctions.btmindustrial.com/auctionlist.aspx">Auctions</a></div>
        <div class="menuitem"><a href="http://www.btmbroker.com/">Broker</a></div><!--
        <div class="menuitem"><a href="http://www.btmindustrial.com/what-we-do/asset-disposition">Asset Dispostion</a></div>
        <div class="menuitem"><a href="http://www.btmindustrial.com/decommission-line-removal">Decommission & Line Removal</a></div>
        <div class="menuitem"><a href="http://www.btmindustrial.com/machinery-moving-rigging">Machinery Moving & Rigging</a></div>-->
        <div class="menuitem"><a href="http://www.btmindustrial.com/contact-us">Contact Us</a></div>
    </div>
</div>
<div class="banner">
    <div class="banner_image">
        <img src="../BTM_BROKER_BANNER.png" width="305" style="margin-top: -12px;"/>
    </div>
</div>

<div id="Content">
<div align="center"><?php include("seim.html");?></div>
<?php
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
<?php
include("../login.php");
?> 
<div id="Menu-box">
<?php include ("left_menu.php");?>
</div>
</div>
<!--END MENU SECTION HERE-->	
</body>
</html>
<?php
}
else{

echo "<div align='center'><br><br><p>Sorry, you are not allowed access to this part of BTM Broker.com.<br><br> Please Click <a href=\"../index.php\">Home Page</a>.</p></div>";

}
}

?>
