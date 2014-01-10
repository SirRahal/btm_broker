<?
if (isset($_POST['remember'])) {
setcookie("username", $_POST['username'], time()+60*60*24*365, '/', 'www.btmbroker.com');
setcookie("password",  md5($_POST['password']),   time()+60*60*24*365, '/', 'www.btmbroker.com');
}
include("manage/rtmdbinfo_new.php");
include "manage/functions.php";
include "manage/define.php";

$login = $_GET['login'];
$id = $_GET['id'];
$cat = $_GET['cat'];
$type_id = $_GET['type'];
$page= $_GET['page'];
$max = $_GET['max'];
$machine = $_GET['machine'];
$ordernum = $_GET['order'];
$year = $_GET['year'];
$mfg = $_GET['mfg'];
$model = $_GET['model'];
$part_name = $_GET['part_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Used CNC Machinery, Mazak, Metalworking machinery, Used Industrial Machinery"/>
<meta name="description" content="BTM Broker"/>
<title>BTM Broker</title>
</title>
<style type="text/css" media="all">@import "css/index.css";</style>
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
<div align="center"><?include("sei.html");?></div>
<?
switch(@$_GET['ac'])
{
default:
include "home.php";
break;
case 'contact': 
 include "contact_.php";
break; 
case 'about': 
include "about_.php";
break; 
case 'item': 
include "item_.php";
break;    
case 'inventory': 
include "inventory_.php";
break; 
case 'machine': 
include "allinventory_.php";
break; 
case 'fail': 
include "login_fail.php";
break;       
case 'transfer': 
include "inventory_transfer.php";
break;       
} 
?> 	
</div>
<div id="Menu">
<?
if ($login=='yes'){
  include("login.php"); 
}
else if ($_SESSION['Admin']==1)
{
  include("login.php"); 
}
?>
<a href="index.php?login=yes" class="hide"><p>Please Select From Our Many Catagories Below To View Our Inventory</p></a>
		<div id="Menu-box">
		<? include ("left_menu.php");?>
	</div>	
</div>
<div id="footer">
<img src="onepixel.jpg" width="1" height="200" alt="" border="0" /><br />
<p>These pages, and logos are the property of BTM Broker<br /> and may not
be reproduced without the express written consent of <br />BTM Broker
are subject to prior sales.
</p>

</div>
  <div id="bottom">
 <p> If you find any broken links or have a comment about this web site please contact<br /> <a href="mailto:admin@btmbroker.com">admin@btmbroker.com</a>
 </p>
 </div>

</body>
</html>