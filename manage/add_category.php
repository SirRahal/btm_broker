
<?php
switch(@$_POST['action'])
{
default:

break;
case 'ADD':
$category = $_POST['category'];
$series = $_POST['series'];
$query = "INSERT INTO type (`type`, `category`, `series`)  VALUES ('', '$category', '$series')";
mysql_query($query);
$msg = "$category Category Has Been Added";
break;
}



$sql = 'SELECT * FROM `type`'; 
$result=mysql_query($sql);
$num=mysql_numrows($result);
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

if (theForm.series.value == "0")
{
alert("Please enter a value for the \"SERIES\" field.");
theForm.series.focus();
return (false);
}
return (true);
}
</SCRIPT>

<br /><br />
<?
 if (isset($msg) && strlen(trim($msg)) > 0) {
?>
<table width="75%" align="center"><tr><td>
    <span class="message"><div align="center"> <?=$msg?> </div></span>
</td></tr></table>
<?
}
?>
<form action="<?php echo $_server['php-self'];?>" method="post" onsubmit="return Validate(this)">
<table align="center" width="60%" cellspacing="2" cellpadding="2" border="1">
<tr>
	<th colspan="3" align="center">ADD CATEGORY</th>
</tr>
<tr>
	<td colspan="3" align="center">ENTER CATEGORY: <input type="text" name="category" size="40" maxlength="40" /></td>
</tr>
<tr>
	<td colspan="3" align="center">CHOOSE SERIES: 
	<select name="series">
	<option value="0">	--	  </option>
<?
for ($i=65; $i <= 90; $i++) {
 $x = chr($i);
?>	
	<option value="<?=$x?>">		 <?=$x?> </option>
<?
} 
?>	
	
	
	
</td>
</tr>
<tr>
	<td colspan="3" align="center"><br />
	
	<input type="submit" name="action" id="action" value="ADD">
	<br /><br /></td>
</tr>
</table>
</form>
</div>
