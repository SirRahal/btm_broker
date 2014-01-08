
<?php

$message_sent = $_POST['message_sent'];
$mailid = $_POST['mailid'];
$itemid = $_POST['itemid'];
$ud_id = $_POST['id'];
$responds = $_POST['respond'];
	if ($responds==1)  
	$qprice = $_POST['camount']; 
	else
	if ($responds==2)  
	$qprice = ''; 
	else
	$qprice = $_POST['qprice'];
	


switch(@$_POST['action'])
{
default:

break;
case '[SEND]':
include("mail_offer.php");

break;

case '[DELETE]':
$queryu="UPDATE customer SET offer='0' WHERE id='$ud_id'";
mysql_query($queryu); 

break;
} 

   

$query = 'SELECT * FROM `customer` WHERE offer="1" ORDER BY `date` DESC '; 
$result2=mysql_query($query);
$num2=mysql_numrows($result2); 

?>

<br />
<div align="center">You Have <?php echo "$num2"; ?> Active Offer Made<br />
<?php
$j=0;
while ($j < $num2) {
$id=mysql_result($result2,$j,"id");
$name=mysql_result($result2,$j,"name");
$email=mysql_result($result2,$j,"email");
$phone=mysql_result($result2,$j,"phone");
$quote=mysql_result($result2,$j,"quote");
$offer=mysql_result($result2,$j,"offer");
$date=mysql_result($result2,$j,"date"); 
$message=mysql_result($result2,$j,"message");
$part_number=mysql_result($result2,$j,"part_number");
$product=mysql_result($result2,$j,"product");
$price=mysql_result($result2,$j,"price");
$message_sent_retrive=mysql_result($result2,$j,"message_sent");
$qprice_retrive=mysql_result($result2,$j,"qprice");
$sent=mysql_result($result2,$j,"sent");
$amount=mysql_result($result2,$j,"amount");
$respond_retrive=mysql_result($result2,$j,"respond");
?>

<div id="content-box_offer">




<A NAME="<?php echo "$id"; ?>"></a>
<table cellpadding="2" align="center" border="0" cellspacing="2" width="90%">
<tr>
	<td align="left"><sup>Name:  <strong><?php echo "$name"; ?></strong></sup></td>
	<td align="left"><sup>Email:  <?php echo "$email"; ?></sup></td>
	<td align="left"><sup>Phone:  <?php echo "$phone"; ?></sup></td>
</tr>	

<tr>
	<td align="center" colspan="3"><sup>Made an Offer on RTM Part #  &nbsp;&nbsp;<strong><?php echo "$part_number"; ?></strong>&nbsp;&nbsp; on <?php echo "$date"; ?></sup> </td>
</tr>	

<tr>
	<td align="center" colspan="3"><sup><?php echo "$product"; ?></sup> </td>
</tr>	
<tr>
	<td align="center" colspan="3"><sup>Your Price:  $<?php echo "$price"; ?>&nbsp;&nbsp;-&nbsp;&nbsp;Offer Made:  $<?php echo "$amount"; ?></sup> </td>
</tr>	
<tr>
	<td align="center" colspan="3">	
	<div align="center"><sup><?php echo "$message"; ?></sup></div>
	</td>
</tr>	

<tr>
	<td align="center" colspan="3">	
	<div align="center"><sup>------------------------------------------------------</sup></div>	
	</td>	
</tr>	
	<form action="<?php echo $_server['php-self'];?>#<?php echo "$id"; ?>" method="post">
	<input type="hidden" name="mailid" value="<?php echo "$id"; ?>" />
	<input type="hidden" name="itemid" value="<?php echo "$idp"; ?>" />
<tr>
<td align="center" colspan="3">
	<div align="center"><sup>
	<input type="radio" name="respond" value="1" <?php	if ($respond_retrive==1)
	echo "checked=checked";  
	?>	/>Accept Offer
	<input type="radio" name="respond" value="2" <?php	if ($respond_retrive==2)
	echo "checked=checked";  
	?> />Decline Offer
	<input type="radio" name="respond" value="3" <?php	if ($respond_retrive==3)
	echo "checked=checked";  
	?> />Counter Offer
	</sup></div>	
	</td>
	</tr>
	<tr>
<td align="center" colspan="3">
	<div align="center"><sup>Price To Offer:  $<input type="text" name="qprice" value="<?php echo "$qprice_retrive"; ?>" /></sup></div>
	</td>
</tr>

<tr>
<td align="center" colspan="3">	
	<div align="center"><sup>Message to <?php echo "$name"; ?>: <textarea cols="75%" rows="5" name="message_sent"><?php echo "$message_sent_retrive"; ?></textarea></sup> </div>
	</td>
</tr>
<input type="hidden" name="camount" value="<?php echo "$amount"; ?>" />
<tr>
	<td align="center" colspan="3">	
		<table cellspacing="2" cellpadding="2" border="0" align="center">
			<tr>
				<td><sup><input type="submit" name="action" id="action" value="[SEND]" /></sup></form></td>	
				<td><form action="<?php echo $_server['php-self'];?>" method="post">
				<input type="hidden" name="id" value="<?php echo "$id"; ?>" />
				<sup><input type="submit" name="action" id="action" value="[DELETE]" /></sup></form>
				</td>				
			</tr>
			<tr>
	<td align="center" colspan="3">	
	<div align="center"><sup><?php echo "$sent"; ?></sup></div>
	</td>
</tr>	
		</table>	
	</td>
</tr>	
</table>
</div>
<div>	
	<br />	

<?php
++$j;
} 

?>

