<br>
<SCRIPT type="text/javascript">
function Validate(theForm)
{
if (theForm.ud_name.value == "")
{
alert("Please enter a name for the \"TEMPLATE NAME\" field.");
theForm.ud_name.focus();
return (false);
}
return (true);
}
</SCRIPT>
<?php
$idp = $_POST['id'];
$template_id = $_POST['template_id'];
switch(@$_POST['action'])
{
default:
if (isset($_GET['id'])){
$idp = $_GET['id'];

$query = "SELECT * FROM `inventory` WHERE id=$idp"; 
$result=mysql_query($query);
$num2=mysql_numrows($result); 
$i=0;
$year=mysql_result($result,$i,"year");
$mfg=mysql_result($result,$i,"mfg");
$model=mysql_result($result,$i,"model");
$part_name=mysql_result($result,$i,"part_name");
$price=mysql_result($result,$i,"price");
$pic1=mysql_result($result,$i,"pic1"); 

$disc_a1=mysql_result($result,$i,"disc_a1");
$disc_a2=mysql_result($result,$i,"disc_a2");
$disc_b1=mysql_result($result,$i,"disc_b1");
$disc_b2=mysql_result($result,$i,"disc_b2");
$disc_c1=mysql_result($result,$i,"disc_c1");
$disc_c2=mysql_result($result,$i,"disc_c2");
$disc_d1=mysql_result($result,$i,"disc_d1");
$disc_d2=mysql_result($result,$i,"disc_d2"); 

$disc_e1=mysql_result($result,$i,"disc_e1");
$disc_e2=mysql_result($result,$i,"disc_e2");
$disc_f1=mysql_result($result,$i,"disc_f1");
$disc_f2=mysql_result($result,$i,"disc_f2");
$disc_g1=mysql_result($result,$i,"disc_g1");
$disc_g2=mysql_result($result,$i,"disc_g2");
$disc_h1=mysql_result($result,$i,"disc_h1");
$disc_h2=mysql_result($result,$i,"disc_h2"); 

$memo=mysql_result($result,$i,"memo");
$type2=mysql_result($result,$i,"type");
$shipping=mysql_result($result,$i,"shipping");
$shipping2=mysql_result($result,$i,"shipping2");
$qty=mysql_result($result,$i,"qty");

}
break;
case 'ADD':
$name = $_POST['ud_name'];
$year = $_POST['ud_year'];
$mfg = $_POST['ud_mfg'];
$model = $_POST['ud_model'];
$pic1 = $_POST['ud_pic1'];
$part_name = $_POST['ud_part_name'];
$memo = $_POST['ud_memo'];
$type2 = $_POST['type'];
$price = $_POST['ud_price'];
$disc_a1 = $_POST['ud_a1'];
$disc_a2 = $_POST['ud_a2'];
$disc_b1 = $_POST['ud_b1'];
$disc_b2 = $_POST['ud_b2'];
$disc_c1 = $_POST['ud_c1'];
$disc_c2 = $_POST['ud_c2'];
$disc_d1 = $_POST['ud_d1'];
$disc_d2 = $_POST['ud_d2'];
$disc_e1 = $_POST['ud_e1'];
$disc_e2 = $_POST['ud_e2'];
$disc_f1 = $_POST['ud_f1'];
$disc_f2 = $_POST['ud_f2'];
$disc_g1 = $_POST['ud_g1'];
$disc_g2 = $_POST['ud_g2'];
$disc_h1 = $_POST['ud_h1'];
$disc_h2 = $_POST['ud_h2'];
$shipping = $_POST['ud_shipping'];
$shipping2 = $_POST['ud_shipping2'];   
$query = "INSERT INTO template (`id`, `name`, `year`, `mfg`, `model`, `part_name`, `price`, `pic1`, `disc_a1`, `disc_a2`, `disc_b1`, `disc_b2`, `disc_c1`, `disc_c2`, `disc_d1`, `disc_d2`, `disc_e1`, `disc_e2`, `disc_f1`, `disc_f2`, `disc_g1`, `disc_g2`, `disc_h1`, `disc_h2`, `memo`, `type`, `shipping`, `shipping2`) VALUES ('', '$name', '$year', '$mfg', '$model', '$part_name', '$price', '$pic1', '$disc_a1', '$disc_a2', '$disc_b1', '$disc_b2', '$disc_c1', '$disc_c2', '$disc_d1', '$disc_d2', '$disc_e1', '$disc_e2', '$disc_f1', '$disc_f2', '$disc_g1', '$disc_g2', '$disc_h1', '$disc_h2', '$memo', '$type2', '$shipping', '$shipping2')"; 
mysql_query($query);
$idp = mysql_insert_id(); 
$msg="The template was Added!";
break;
case 'CHOOSE TEMPLATE':
$query = "SELECT * FROM `template` WHERE id=$template_id"; 
$result=mysql_query($query);
$num2=mysql_numrows($result);  
$i=0;
while ($i < $num2) {
$id=mysql_result($result,$i,"id");
$name=mysql_result($result,$i,"name");
$year=mysql_result($result,$i,"year");
$mfg=mysql_result($result,$i,"mfg");
$model=mysql_result($result,$i,"model");
$part_name=mysql_result($result,$i,"part_name");
$price=mysql_result($result,$i,"price");
$pic1=mysql_result($result,$i,"pic1"); 

$disc_a1=mysql_result($result,$i,"disc_a1");
$disc_a2=mysql_result($result,$i,"disc_a2");
$disc_b1=mysql_result($result,$i,"disc_b1");
$disc_b2=mysql_result($result,$i,"disc_b2");
$disc_c1=mysql_result($result,$i,"disc_c1");
$disc_c2=mysql_result($result,$i,"disc_c2");
$disc_d1=mysql_result($result,$i,"disc_d1");
$disc_d2=mysql_result($result,$i,"disc_d2"); 

$disc_e1=mysql_result($result,$i,"disc_e1");
$disc_e2=mysql_result($result,$i,"disc_e2");
$disc_f1=mysql_result($result,$i,"disc_f1");
$disc_f2=mysql_result($result,$i,"disc_f2");
$disc_g1=mysql_result($result,$i,"disc_g1");
$disc_g2=mysql_result($result,$i,"disc_g2");
$disc_h1=mysql_result($result,$i,"disc_h1");
$disc_h2=mysql_result($result,$i,"disc_h2"); 

$memo=mysql_result($result,$i,"memo");
$type2=mysql_result($result,$i,"type");
$shipping=mysql_result($result,$i,"shipping");
$shipping2=mysql_result($result,$i,"shipping2");
++$i;
}
break;
case 'EDIT':
$id = $idp;
$name = $_POST['ud_name'];
$year = $_POST['ud_year'];
$mfg = $_POST['ud_mfg'];
$model = $_POST['ud_model'];
$pic1 = $_POST['ud_pic1'];
$part_name = $_POST['ud_part_name'];
$memo = $_POST['ud_memo'];
$type2 = $_POST['ud_type'];
$price = $_POST['ud_price'];
$disc_a1 = $_POST['ud_a1'];
$disc_a2 = $_POST['ud_a2'];
$disc_b1 = $_POST['ud_b1'];
$disc_b2 = $_POST['ud_b2'];
$disc_c1 = $_POST['ud_c1'];
$disc_c2 = $_POST['ud_c2'];
$disc_d1 = $_POST['ud_d1'];
$disc_d2 = $_POST['ud_d2'];
$disc_e1 = $_POST['ud_e1'];
$disc_e2 = $_POST['ud_e2'];
$disc_f1 = $_POST['ud_f1'];
$disc_f2 = $_POST['ud_f2'];
$disc_g1 = $_POST['ud_g1'];
$disc_g2 = $_POST['ud_g2'];
$disc_h1 = $_POST['ud_h1'];
$disc_h2 = $_POST['ud_h2'];
$shipping = $_POST['ud_shipping'];
$shipping2 = $_POST['ud_shipping2']; 

$query="UPDATE template SET name='$name', year='$year', mfg='$mfg', model='$model', pic1='$pic1', part_name='$part_name', memo='$memo', type='$type2',  price='$price', disc_a1='$disc_a1', disc_a2='$disc_a2', disc_b1='$disc_b1', disc_b2='$disc_b2', disc_c1='$disc_c1', disc_c2='$disc_c2', disc_d1='$disc_d1', disc_d2='$disc_d2', disc_e1='$disc_e1', disc_e2='$disc_e2', disc_f1='$disc_f1', disc_f2='$disc_f2', disc_g1='$disc_g1', disc_g2='$disc_g2', disc_h1='$disc_h1', disc_h2='$disc_h2', shipping='$shipping', shipping2='$shipping2' WHERE id='$id'";
mysql_query($query); 
$msg="The template was Edited!";
break;
case 'DELETE':   
mysql_query("DELETE FROM template WHERE id=$idp");
$msg="The template was DELETED!";
break;
}
if (isset($msg) && strlen(trim($msg)) > 0) {
?>
<br><table width="75%" align="center"><tr><td>
    <span class="message"><div align="center"> <?php echo $msg?> </div></span>
</td></tr></table> 
<?php
      }
?>
<br />
<table align="center" width="95%" cellspacing="2" cellpadding="2" border="1">
<?php
template_list('SELECT TEMPLATE ', $template_id);
?>


<form action="<?php echo $_server['php-self'];?>" method="post" onsubmit="return Validate(this)">
<input type="hidden" name="id"  value="<?php if (strlen($idp)>0){echo $idp;}else{echo $template_id;}?>" />

<tr>
	<th colspan="3" align="center">
	
<?php
switch(@$_POST['action'])
{
default:
?>
ADD TEMPLATE
<?php
break;
case 'ADD':
?>
EDIT TEMPLATE
<?php
break;
case 'CHOOSE TEMPLATE':
?>
EDIT TEMPLATE
<?php
break;
}
?>	
</th>
</tr>
<?php
category_list($type2);
?>
<td>TEMPLATE NAME:<br /><input type="text" name="ud_name"  size="30" maxlength="30" value="<?php echo "$name"; ?>" /></td>
	<td>YEAR:<br /><input type="text" name="ud_year" size="15" maxlength="4"  value="<?php echo "$year"; ?>" /></td>
	<td>PRICE: <br /><input type="text" name="ud_price"  size="15" maxlength="15" value="<?php echo "$price"; ?>" /></td>
</tr>
<tr>
	<td>MFG:<br /><input type="text" name="ud_mfg"  size="30" maxlength="30" value="<?php echo "$mfg"; ?>" /></td>
	<td>MODEL:<br /><input type="text" name="ud_model"  size="30" maxlength="30" value="<?php echo "$model"; ?>" /></td>
	<td>PART NAME:<br /><input type="text" name="ud_part_name"  size="30" maxlength="30" value="<?php echo "$part_name"; ?>" /></td>
</tr>
<tr>
	<td>PIC FILE NAME:<br /><input type="text" name="ud_pic1"  size="15" maxlength="15" value="<?php echo "$pic1"; ?>" /></td>
	<td></td>
	<td>
	<table cellspacing="0" cellpadding="0" border="0">
<tr>
	<td align="left">SHIPPING:</td>
	<td align="left">ADD PER:</td>
</tr>
<tr>
	<td><input type="text" name="ud_shipping" size="15" maxlength="15" value="<?php echo "$shipping"; ?>" /></td>
	<td><input type="text" name="ud_shipping2" size="10" maxlength="15" value="<?php echo "$shipping2"; ?>" /></td>
</tr>
</table>
	</td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="ud_a1" size="30" maxlength="30" value="<?php echo "$disc_a1"; ?>" /></td>
	<td><input type="text" name="ud_a2" size="30" maxlength="30" value="<?php echo "$disc_a2"; ?>" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="ud_b1" size="30" maxlength="30"  value="<?php echo "$disc_b1"; ?>"/></td>
	<td><input type="text" name="ud_b2" size="30" maxlength="30"  value="<?php echo "$disc_b2"; ?>"/></td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="ud_c1" size="30" maxlength="30" value="<?php echo "$disc_c1"; ?>" /></td>
	<td><input type="text" name="ud_c2" size="30" maxlength="30" value="<?php echo "$disc_c2"; ?>" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="ud_d1" size="30" maxlength="30" value="<?php echo "$disc_d1"; ?>" /></td>
	<td><input type="text" name="ud_d2" size="30" maxlength="30" value="<?php echo "$disc_d2"; ?>" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="ud_e1" size="30" maxlength="30" value="<?php echo "$disc_e1"; ?>" /></td>
	<td><input type="text" name="ud_e2" size="30" maxlength="30"  value="<?php echo "$disc_e2"; ?>"/></td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="ud_f1" size="30" maxlength="30" value="<?php echo "$disc_f1"; ?>" /></td>
	<td><input type="text" name="ud_f2" size="30" maxlength="30" value="<?php echo "$disc_f2"; ?>" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="ud_g1" size="30" maxlength="30" value="<?php echo "$disc_g1"; ?>" /></td>
	<td><input type="text" name="ud_g2" size="30" maxlength="30" value="<?php echo "$disc_g2"; ?>" /></td>
</tr>
<tr>
	<td>	</td>
	<td><input type="text" name="ud_h1" size="30" maxlength="30" value="<?php echo "$disc_h1"; ?>" /></td>
	<td><input type="text" name="ud_h2" size="30" maxlength="30" value="<?php echo "$disc_h2"; ?>" /></td>
</tr>
<tr>
	<td colspan="3" align="center"><textarea cols="75%" rows="10" name="ud_memo"><?php echo "$memo"; ?></textarea></td>
</tr>
<?php
switch(@$_POST['action'])
{
default:
?>
<tr>
	<td colspan="3" align="center"><br />
	<input type="submit" name="action" id="action" value="ADD"/><br /><br /></td>
</tr>
<?php
break;
case 'ADD':
?>
<tr>
	<td colspan="3" align="center"><br />
	<input type="submit" name="action" id="action" value="EDIT"/>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="action" id="action" value="DELETE"	onclick="return confirm('Are you sure you want to delete the <?php echo $name?> Template?');"	/>
	<br /><br /></td>
</tr>
<?php
break;
case 'EDIT':
?>
<tr>
	<td colspan="3" align="center"><br />
	<input type="submit" name="action" id="action" value="EDIT"/>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="action" id="action" value="DELETE"	onclick="return confirm('Are you sure you want to delete the <?php echo $name?> Template?');"	/>
	<br /><br /></td>
</tr>
<?php
break;
case 'CHOOSE TEMPLATE':
?>
<tr>
	<td colspan="3" align="center"><br />
	<input type="submit" name="action" id="action" value="EDIT"/>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="action" id="action" value="DELETE" onclick="return confirm('Are you sure you want to delete the <?php echo $name?> Template?');" />
	<br /><br /></td>
</tr>
<?php
break;
case 'DELETE':
?>
<tr>
	<td colspan="3" align="center"><br />
	<input type="submit" name="action" id="action" value="ADD"/><br /><br /></td>
</tr>
<?php
break;
}
?>

</table>


</form>
