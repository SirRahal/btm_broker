<?php
$get_link = "SELECT * FROM `link` WHERE type=$type_id ORDER BY id ASC"; 
$link=mysql_query($get_link);
$num2=mysql_numrows($link);
?>
<br />

<?php
if ($_SESSION['Admin']==1)
{
?>
<div align="center"><a href="manage/index.php?ac=edit_inventory&type=<?php echo$type?>&cat=<?php echo$cat?>" class="hide"><p class="about"><?php echo$cat?> - (<?php echo$num2?>)</p></a></div>
<?php
}
else
{
?>
<div align="center"><p class="about"><?php echo$cat?> - (<?php echo$num2?>)</p></div>
<?php
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
<?php
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
<a href="index.php?ac=item&type=<?php echo $type_id?>&page=<?php echo $j?>&max=<?php echo $num2?>&cat=<?php echo$cat?>&year=<?php echo $year?>&mfg=<?php echo $mfg?>&model=<?php echo $model?>&part_name=<?php echo $part_name?>">
<img src="pic/thumbnail/RTM Auction Machines <?php echo "$pic1"; ?>.jpg" width="100" height="75" alt="" border="0" /><br /><?php echo "$year"; ?> <?php echo "$mfg"; ?><br><?php echo "$model"; ?></a>
<?php
if ($_SESSION['Admin']==1)
{
?>
<br><a href="manage/index.php?ac=edit_item&id=<?php echo $id?>">Edit Item</a>
<?php
}

?>
</div>


<?php
++$j;
} 

?>






