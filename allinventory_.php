<?
$a=array();
$get_link = "SELECT * FROM `link` WHERE type<=6 ORDER BY id ASC"; 
$link=mysql_query($get_link);
$num2=mysql_numrows($link); 
?>
<br />
<div align="center"><p class="about">Machine Inventory</p></div>
<?php	
	if ($num2>0)  
	echo "<div align=center><p class=click>Click Items Below For More Information</p></div>"; 
else
  echo ""; 
?> 
<br />
<?php	
	if ($num2==0)  
	echo "<br /><br /><br /><div align=center><p class=about>No Items Found Check Back Soon!</p></div>"; 
else
  echo ""; 
?> 
<br />
<?
$j=0;
while ($j < $num2) {
$item_id=mysql_result($link,$j,"item_id");
$type_id=mysql_result($link,$j,"type");
$k=0;
$query = "SELECT * FROM `inventory` WHERE id=$item_id ORDER BY id ASC"; 
$result2=mysql_query($query);
$mfg=mysql_result($result2,$k,"mfg");
$pic1=mysql_result($result2,$k,"pic1"); 
$year=mysql_result($result2,$k,"year");
$sold=mysql_result($result2,$k,"sold");
$model=mysql_result($result2,$k,"model");
$get_type = "SELECT * FROM `type` WHERE type=$type_id"; 
$item_type=mysql_query($get_type);
$num_type=mysql_numrows($item_type);   
$m=0;
while ($m < $num_type) {
$id=mysql_result($item_type,$m,"type");
$title=mysql_result($item_type,$m,"category");
++$m;
}

if (in_array($item_id,$a))
{
}
else
{ 
array_push($a,$item_id);
?>
<div id="content-box">
<?php
	
	if ($sold==Yes)  
	echo "SOLD"; 
else
  echo "<br />"; 
?> 
<a href="index.php?ac=item&type=<?=$id?>&page=<?=$j?>&max=<?=$num2?>&cat=<?=$title?>&machine=1">
<img src="pic/thumbnail/RTM Auction Machines <? echo "$pic1"; ?>.jpg" width="100" height="75" alt="" border="0" /><br /><? echo "$year"; ?> <? echo "$mfg"; ?><br><? echo "$model"; ?></a>
<?
if ($_SESSION['Admin']==1)
{
?>
<br><a href="manage/index.php?ac=edit_item&id=<?=$item_id?>">Edit Item</a>
<?
}

?>
</div>
<?
}
++$j;
} 

?>
