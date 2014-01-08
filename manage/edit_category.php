<?
// make sure our variables are empty   
  	$error = array();
  	$msg = "";
  	$error_msg = ""; 	
  	
$edit_series = ($_GET['edit_series']);
$delete = ($_GET['delete']);
$type2 = ($_POST['type']); 
$category = ($_POST['category']);
$series = $_POST['series'];
switch(@$_POST['action'])
{
default:

break;
case 'EDIT':
$query="UPDATE type SET category='$category' WHERE type='$type2'";
mysql_query($query);
$msg = "$category Category Has Been Edited";
break;
case 'EDIT SERIES':
$query="UPDATE type SET series='$series' WHERE type='$type2'";
mysql_query($query);
$msg = "$category Category Has Been Edited";
break;


case 'DELETE':
$sql1 = "SELECT * FROM `link` WHERE type=$type2"; 
$result1=mysql_query($sql1);
$num1=mysql_numrows($result1);
if ($num1>0){
$error['category'] = "You Must Remove All Items From Category Before It Can Be Deleted!";
}


if (empty($error)) {  
// There were no errors!
mysql_query("DELETE FROM type WHERE type='$type2'");
$msg = "Category Has Been Deleted";
} else {   
// There were errors, let's set the styles for the fields
  $error_msg = "<ul>\n";
  
  foreach($error as $field => $error) {
    $style[$field] = "border: 1px solid #ff0000 !important;;
                      background-color: #FFEFEF !important;";
    $error_msg .= "<li>$error</li>\n";  
  }
  
  $error_msg .= "</ul>\n";
} 











break;
}
if ($delete=="delete")
{
?>
<SCRIPT type="text/javascript">
function Validate(theForm)
{
if (theForm.category.value != "DELETE")
{
alert("Please enter DELETE");
theForm.category.focus();
return (false);
}
return (true);
}
</SCRIPT>
<?
}
else 	if ($edit_series=="yes"){
?>
<SCRIPT type="text/javascript">
function Validate(theForm)
{

if (theForm.series.value == "0")
{
alert("Please enter a value for the \"Series\" field.");
theForm.series.focus();
return (false);
}
return (true);
}
</SCRIPT>
<?
}
else{
?>

<SCRIPT type="text/javascript">
function Validate(theForm)
{
if (theForm.category.value == "")
{
alert("Please enter a value for the \"CATEGORY\" field.");
theForm.category.focus();
return (false);
}

return (true);
}
</SCRIPT>
<?
}
?>

<br /><br />
<?
 if (isset($msg) && strlen(trim($msg)) > 0) {
?>
<table width="75%" align="center"><tr><td>
    <span class="message"><div align="center"> <?=$msg?> </div></span>
</td></tr></table>
<?
}

if (isset($error_msg) && strlen(trim($error_msg)) > 0) {
?>
<table width="75%" align="center"><tr><td>
    <span class="error"> <?=$error_msg?></span>
</td></tr></table> 
<?
} 
?> 





<form action="<?php echo $_server['php-self'];?>" method="post" onsubmit="return Validate(this)">
<table align="center" width="60%" cellspacing="2" cellpadding="2" border="1">
<tr>
	<th colspan="3" align="center"><?if ($delete=="delete"){echo "DELETE";}else {echo"EDIT";}?> CATEGORY</th>
</tr>
<?
category_list($type2);
?>
<tr>
	<td colspan="3" align="center">
	<?if ($delete=="delete"){echo "TYPE DELETE TO CONFIRM:";}else if ($edit_series=="yes"){} else {echo"NEW CATEGORY NAME:";}?> 
	<?if ($edit_series<>"yes"){
	?>
	<input type="text" name="category" size="40" maxlength="40" />	
	<?
	}
	if ($delete=="delete"){
	}
	if ($edit_series=="yes"){
?>
	
	
	<br>
	CHOOSE SERIES: 
	<select name="series">
	<option value="0">	--	  </option>
<?
for ($i=65; $i <= 90; $i++) {
 $x = chr($i);
?>	
	<option value="<?=$x?>">		 <?=$x?> </option>
<?
} 
}
?>	
	
	
	
	</td>
</tr>

<?if ($delete=="delete"){
?>
<tr> 
<td colspan="3" align="center"><br />
	
	<input type="submit" name="action" id="action" value="DELETE">
	<br /><br /></td>
	</tr>
	<tr>
	<td colspan="3" align="center"><br /><a href="index.php?ac=edit_cat"><h3>Edit Category</h3></a>
	<?if ($edit_series<>"yes"){
	?>
	
	<br>
	<a href="index.php?ac=edit_cat&edit_series=yes"><h3>Edit Series</h3></a>
	
	<?}?>
	</td>
</tr>

	
<?
}
else {
?>
<tr> 
<td colspan="3" align="center"><br />
	
	<?if ($edit_series<>"yes"){
	?>
	<input type="submit" name="action" id="action" value="EDIT">
	<?
		}else
		{
		?>
		<input type="submit" name="action" id="action" value="EDIT SERIES">
		<?
		}
	?>
	
	<br /><br /></td>
</tr>
<tr>
	<td colspan="3" align="center"><br /><a href="index.php?ac=edit_cat&delete=delete"><h3>Delete Category</h3></a>
	<?if ($edit_series<>"yes"){
	?>	
	<br>
	<a href="index.php?ac=edit_cat&edit_series=yes"><h3>Edit Series</h3></a>	
	<?
	}
	else {
	?>
	<br>
	<a href="index.php?ac=edit_cat"><h3>Edit Category</h3></a>
	<?
	}
	?>
	</td>
</tr>
<?
}
?>

</table>
</form>
