<?php
$a=array();
if (isset($_GET['id']))
{
$item_id = $_GET['id'];
$item_type = $_GET['type'];
$cat = $_GET['cat'];
$year = $_GET['year'];
$mfg = $_GET['mfg'];
$model = $_GET['model'];
$part_name = $_GET['part_name'];
$part_number = $_GET['part_number'];
}
else{
$item_id = $_POST['id'];
$item_type = $_POST['type'];
$cat = $_POST['cat'];
$part_number = $_POST['part_number'];
}
$link_id = $_POST['link_id'];
array_push($a,$item_type);
switch(@$_POST['action'])
{
default:

break;
case 'ADD':


$ud_type = $_POST['ud_type'];

$query = "INSERT INTO link (`id`, `type`, `item_id`, part_number)  VALUES ('', '$ud_type', '$item_id', '$part_number')";
mysql_query($query);
break;

case 'DELETE':

mysql_query("DELETE FROM link WHERE id='$link_id'");
break;
}
?>

<br>
<div align="center">
<br>
<a href="index.php?ac=edit_item&id=<?php echo $item_id?>">Edit Item</a>&nbsp;&nbsp;
	 <a href="../index.php?ac=item&id=<?php echo $item_id?>">View Item</a>
<br>
<a href="index.php?ac=edit_item&id=<?php echo $item_id?>" class="hide">
		<p class="about"><?php echo $year ." - ". $mfg ." - ". $model ." - ". $part_name ?></p></a>
<br>

<form action="<?php echo $_server['php-self'];?>" method="post">
<input type="hidden" name="id" value="<?php echo $item_id?>" />
<input type="hidden" name="type" value="<?php echo $type?>" />
<input type="hidden" name="cat" value="<?php echo $cat?>" />
<table align="center" width="50%" cellspacing="2" cellpadding="2" border="1">
<tr>
	<th colspan="2" align="center">	ADD ITEM TO OTHER CATEGORY</th>
</tr>
<tr>
<td align="center" colspan="3">
<a href="index.php?ac=edit_inventory&type=<?php echo $item_type?>&cat=<?php echo $cat?>" class="hide">
<p class="about">
Item Base Category is <?php echo $cat?>
</p></a>
</td>
</tr>
<?php
$sql1 = "SELECT * FROM `link` WHERE item_id=$item_id ORDER BY type ASC"; 
$result1=mysql_query($sql1);
$num1=mysql_numrows($result1);
$j=0;
while ($j < $num1) {
$item_type_get=mysql_result($result1,$j,"type");
$item_type_link_id=mysql_result($result1,$j,"id");
$get_cat = "SELECT * FROM `type` WHERE type=$item_type_get"; 
$list_cat=mysql_query($get_cat);
$lc=0;
$list_cat=mysql_result($list_cat,$lc,"category");
if ($item_type_get<>$item_type){
array_push($a,$item_type_get);
?>
<form action="<?php echo $_server['php-self'];?>" method="post">
<tr>

<td align ="center" width="75%">
<a href="index.php?ac=edit_inventory&type=<?php echo $item_type_get?>&cat=<?php echo $cat?>" class="hide">
<p class="about"><?php echo $list_cat?></p></a>
<input type="hidden" name="link_id" value="<?php echo $item_type_link_id?>">
</td>
<td width="25%">
<input type="submit"  name="action" id="action" value="DELETE" />
</td>
</tr>
</form>
<?php
} 
++$j;

}
?>
<form action="<?php echo $_server['php-self'];?>" method="post">
<input type="hidden" name="part_number" value="<?php echo $part_number?>">
<tr>
<td  align="center" width="75%">
	ADD CATEGORY: 
	<select name="ud_type">
	<?php
$sql = 'SELECT * FROM `type`'; 
$result=mysql_query($sql);
$num=mysql_numrows($result);
	$j=0;
	while ($j < $num) {
$type=mysql_result($result,$j,"type");
$category=mysql_result($result,$j,"category");

if (in_array($type,$a))
{
}
else
{
?>
	<option value="<?php echo "$type";?>">		 <?php echo "$category"; ?> </option>
<?php
}
++$j;
} 
?>	
</select>
</td>
<td width="25%">
<input type="submit"  name="action" id="action" value="ADD" />
</td>
</tr>
</form>
</table>
</div>