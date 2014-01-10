<?
if ($machine==1)
{
$query = "SELECT * FROM `link` WHERE type<=6 ORDER BY id ASC LIMIT $page , 1"; 
}
else if (isset($id))
{
$query = "SELECT * FROM `link` WHERE item_id=$id";
$result2=mysql_query($query);
$num2=mysql_numrows($result2);
$i=0;
$type_id=mysql_result($result2,$i,"type");


$get_type = "SELECT * FROM `link` WHERE type=$type_id"; 
$item_type=mysql_query($get_type);
$num_type=mysql_numrows($item_type);   
$m=0;
while ($m < $num_type) {
$id_match=mysql_result($item_type,$m,"item_id");
if ($id_match==$id)
{
$page=$m;
$max=$num_type;
}
++$m;
}
$get_type = "SELECT * FROM `type` WHERE type=$type_id"; 
$item_type=mysql_query($get_type);
$num_type=mysql_numrows($item_type);   
$m=0;
while ($m < $num_type) {
$cat=mysql_result($item_type,$m,"category");
++$m;
} 
}
else
{
$query = "SELECT * FROM `link` WHERE type=$type_id ORDER BY id ASC LIMIT $page , 1";
}
$result2=mysql_query($query);
$k=0;
$item_id=mysql_result($result2,$k,"item_id");

$query = "SELECT * FROM `inventory` WHERE id=$item_id ORDER BY id ASC"; 
$result2=mysql_query($query);
$num2=mysql_numrows($result2);
$i=0;
while ($i < $num2) {
$idp=mysql_result($result2,$i,"id");
$part_number=mysql_result($result2,$i,"part_number");
$year=mysql_result($result2,$i,"year");
$mfg=mysql_result($result2,$i,"mfg");
$model=mysql_result($result2,$i,"model");
$part_name=mysql_result($result2,$i,"part_name");
$price2=mysql_result($result2,$i,"price");
$pic1=mysql_result($result2,$i,"pic1"); 

$disc_a1=mysql_result($result2,$i,"disc_a1");
$disc_a2=mysql_result($result2,$i,"disc_a2");
$disc_b1=mysql_result($result2,$i,"disc_b1");
$disc_b2=mysql_result($result2,$i,"disc_b2");
$disc_c1=mysql_result($result2,$i,"disc_c1");
$disc_c2=mysql_result($result2,$i,"disc_c2");
$disc_d1=mysql_result($result2,$i,"disc_d1");
$disc_d2=mysql_result($result2,$i,"disc_d2"); 

$disc_e1=mysql_result($result2,$i,"disc_e1");
$disc_e2=mysql_result($result2,$i,"disc_e2");
$disc_f1=mysql_result($result2,$i,"disc_f1");
$disc_f2=mysql_result($result2,$i,"disc_f2");
$disc_g1=mysql_result($result2,$i,"disc_g1");
$disc_g2=mysql_result($result2,$i,"disc_g2");
$disc_h1=mysql_result($result2,$i,"disc_h1");
$disc_h2=mysql_result($result2,$i,"disc_h2"); 

$memo=mysql_result($result2,$i,"memo");
$type=mysql_result($result2,$i,"type");
$date=mysql_result($result2,$i,"date");
$sold=mysql_result($result2,$i,"sold");
$include=mysql_result($result2,$i,"include");
$shipping=mysql_result($result2,$i,"shipping");
$shipping2=mysql_result($result2,$i,"shipping2");
$qty=mysql_result($result2,$i,"qty");
$offer=mysql_result($result2,$i,"offer");
if(isset ($_GET['accept'])){ 
$price = $_GET['accept'];
$mailid = $_GET['mailid'];
}
else
$price = $price2;
?>
<br />

<div align="center"> 
<table width="50%">  
<tr>
<td align="left" width="25%">
<? 
 if ($page<>0){
 ?>   
<a href="index.php?ac=item&type=<?=$type_id?>&page=<?=$page-1?>&max=<?=$max?>&cat=<?=$cat?><?if ($machine==1){echo"&machine=1";}?>"><p>PREVIOUS ITEM</p></a>
 <?
 }
 ?>
</td>
<td align="center" width="50%"><a href="<?if ($machine==1){echo"index.php?ac=machine";}else {?>index.php?ac=inventory&type=<?=$type_id?>&cat=<?=$cat?><?}?>"><p><?if ($machine==1){echo"MACHINE INVENTORY";}else {echo $cat;}?></p></a></td>
<td align="right" width="25%">
 <? 
 if ($page+1<>$max){
 ?>
   
<a href="index.php?ac=item&type=<?=$type_id?>&page=<?=$page+1?>&max=<?=$max?>&cat=<?=$cat?><?if ($machine==1){echo"&machine=1";}?>"><p>NEXT ITEM</p></a>
 <?
 }
 ?>
 </td> 
</tr>
</table> 
</div>
<div align="center">
<?
if ($_SESSION['Admin']==1)
{
?>
<a href="manage/index.php?ac=edit_item&id=<?=$idp?>">Edit Item</a>
<?
}

?>
<h2>
<? echo "$year",' ',"$mfg",' ',"$model",' ',"$part_name"; ?>

</h2>
 <?php
	
	if ($include==Yes)  
	echo "<h3>Price: $ $price USD</h3>"; 
else
  echo ""; 
?>  

<?php
	
	if ($sold==Yes)  
	echo "<h3>SOLD</h3>"; 
else
  echo ""; 
?>  



<a href="pic/normal/RTM Auction Machines <? echo "$pic1"; ?>.jpg">
<img src="pic/normal/RTM Auction Machines <? echo "$pic1"; ?>.jpg" width="320" height="240" alt="" border="2" /></a>

<h2>
<? echo "$year",' ',"$mfg",' ',"$model",' ',"$part_name"; ?>
</h2>

BTM Part Number:  <? echo "$part_number"; ?>
<br /><br />

<table cellspacing="'4" Cellpadding="6" Border="2" width="75%">
<tr>
<td colspan="2"><h2><? echo "$year",' ',"$mfg",' ',"$model",' ',"$part_name"; ?></h2></td>
</tr>
<? 
if (strlen($disc_a1)!=0 || strlen($disc_a2)!=0 )
{
?>
<tr>
<td align="left"><? echo "$disc_a1"; ?></td>
<td align="left"><? echo "$disc_a2"; ?></td>
</tr>
<?
}
?>
<? 
if (strlen($disc_b1)!=0 || strlen($disc_b2)!=0 )
{
?>
<tr>
<td align="left"><? echo "$disc_b1"; ?></td>
<td align="left"><? echo "$disc_b2"; ?></td>
</tr>
<?
}
?>
<? 
if (strlen($disc_c1)!=0 || strlen($disc_c2)!=0 )
{
?>
<tr>
<td align="left"><? echo "$disc_c1"; ?></td>
<td align="left"><? echo "$disc_c2"; ?></td>
</tr>
<?
}
?>
<? 
if (strlen($disc_d1)!=0 || strlen($disc_d2)!=0 )
{
?>

<tr>
<td align="left"><? echo "$disc_d1"; ?></td>
<td align="left"><? echo "$disc_d2"; ?></td>
</tr>
<?
}
?>
<? 
if (strlen($disc_e1)!=0 || strlen($disc_e2)!=0 )
{
?>
<tr>
<td align="left"><? echo "$disc_e1"; ?></td>
<td align="left"><? echo "$disc_e2"; ?></td>
</tr>
<?
}
?>
<? 
if (strlen($disc_f1)!=0 || strlen($disc_f2)!=0 )
{
?>
<tr>
<td align="left"><? echo "$disc_f1"; ?></td>
<td align="left"><? echo "$disc_f2"; ?></td>
</tr>
<?
}
?>
<? 
if (strlen($disc_g1)!=0 || strlen($disc_g2)!=0 )
{
?>
<tr>
<td align="left"><? echo "$disc_g1"; ?></td>
<td align="left"><? echo "$disc_g2"; ?></td>
</tr>
<?
}
?>
<? 
if (strlen($disc_h1)!=0 || strlen($disc_h2)!=0 )
{
?>
<tr>
<td align="left"><? echo "$disc_h1"; ?></td>
<td align="left"><? echo "$disc_h2"; ?></td>
</tr>
<?php
}	
	if ($qty>=1)  
	echo "<tr><td align=left>QTY</td><td align=left>$qty</td></tr>"; 
else
  echo ""; 
?>  

</table>

<br /><br /><br />
<table cellspacing="0" cellpadding="0" border="0">
<tr>
	<td align="left"><h2><u>Equipped With:</u></h2></td>
</tr>
<tr>
	<td align="left"><textarea cols="75%" rows="15"><? echo "$memo"; ?></textarea><br /><br /></td>
</tr>
</table>
<br />
<A NAME="quote"></a>
  <?php
	if ($sold<>Yes) 
	if ($include==Yes)  
	echo "<h3>Selling Price: $ $price USD</h3>"; 
	
	if ($shipping>0)  
	echo "Shipping:  $ $shipping USD"; 
	
	if ($shipping2>0)  
	echo "<br /><p>Each Additional:  $ $shipping2 USD</p>"; 
?> 
<A NAME="request"></a>
<br /><br />
<?
if ($type<=6)	
include("quoteform.php");
else
if ($sold<>Yes) {
include("buyoption.php");
if ($offer==Yes)
include("offerform.php");
}
?>
</div>
<?
++$i;
} 
?>
<br /><br />
<div align="center"><h2>All machinery is sold AS IS unless otherwise 
stated.<br />  Prices listed do not include shipment of 
machinery.<br />  All prices listed are US dollars. </h2></div>

