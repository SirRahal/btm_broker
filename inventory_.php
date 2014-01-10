<?
$get_link = "SELECT * FROM `link` WHERE type=$type_id ORDER BY id ASC"; 
$link=mysql_query($get_link);
$num2=mysql_numrows($link);
?>
<br />

<?
if ($_SESSION['Admin']==1)
{
?>
<div align="center"><a href="manage/index.php?ac=edit_inventory&type=<?=$type?>&cat=<?=$cat?>" class="hide"><p class="about"><?=$cat?> - (<?=$num2?>)</p></a></div>
<?
}
else
{
?>
<div align="center"><p class="about"><?=$cat?> - (<?=$num2?>)</p></div>
<?
}
?>
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
$k=0;
$query = "SELECT * FROM `inventory` WHERE id=$item_id ORDER BY id ASC"; 
$result2=mysql_query($query);
$id=mysql_result($result2,$k,"id");
$mfg=mysql_result($result2,$k,"mfg");
$pic1=mysql_result($result2,$k,"pic1"); 
$year=mysql_result($result2,$k,"year");
$sold=mysql_result($result2,$k,"sold");
$model=mysql_result($result2,$k,"model");
$part_name=mysql_result($result2,$k,"part_name");
?>
<div id="content-box">
<?php	
	if ($sold==Yes)  
	echo "SOLD"; 
else
  echo "<br />"; 
?> 
<a href="index.php?ac=item&type=<?=$type_id?>&page=<?=$j?>&max=<?=$num2?>&cat=<?=$cat?>&year=<?=$year?>&mfg=<?=$mfg?>&model=<?=$model?>&part_name=<?=$part_name?>">
<img src="pic/thumbnail/RTM Auction Machines <? echo "$pic1"; ?>.jpg" width="100" height="75" alt="" border="0" /><br /><? echo "$year"; ?> <? echo "$mfg"; ?><br><? echo "$model"; ?></a>
<?
if ($_SESSION['Admin']==1)
{
?>
<br><a href="manage/index.php?ac=edit_item&id=<?=$id?>">Edit Item</a>
<?
}

?>
</div>






<?
++$j;
} 

?>






