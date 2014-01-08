
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
<div align="center">You Have <? echo "$num2"; ?> Active Offer Made<br />
<?
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




<A NAME="<? echo "$id"; ?>"></a>
<table cellpadding="2" align="center" border="0" cellspacing="2" width="90%">
<tr>
	<td align="left"><sup>Name:  <strong><? echo "$name"; ?></strong></sup></td>
	<td align="left"><sup>Email:  <? echo "$email"; ?></sup></td>
	<td align="left"><sup>Phone:  <? echo "$phone"; ?></sup></td>
</tr>	

<tr>
	<td align="center" colspan="3"><sup>Made an Offer on RTM Part #  &nbsp;&nbsp;<strong><? echo "$part_number"; ?></strong>&nbsp;&nbsp; on <? echo "$date"; ?></sup> </td>
</tr>	

<tr>
	<td align="center" colspan="3"><sup><? echo "$product"; ?></sup> </td>
</tr>	
<tr>
	<td align="center" colspan="3"><sup>Your Price:  $<? echo "$price"; ?>&nbsp;&nbsp;-&nbsp;&nbsp;Offer Made:  $<? echo "$amount"; ?></sup> </td>
</tr>	
<tr>
	<td align="center" colspan="3">	
	<div align="center"><sup><? echo "$message"; ?></sup></div>	
	</td>
</tr>	

<tr>
	<td align="center" colspan="3">	
	<div align="center"><sup>------------------------------------------------------</sup></div>	
	</td>	
</tr>	
	<form action="<?php echo $_server['php-self'];?>#<? echo "$id"; ?>" method="post">
	<input type="hidden" name="mailid" value="<? echo "$id"; ?>" />
	<input type="hidden" name="itemid" value="<? echo "$idp"; ?>" />
<tr>
<td align="center" colspan="3">
	<div align="center"><sup>
	<input type="radio" name="respond" value="1" <?	if ($respond_retrive==1)  
	echo "checked=checked";  
	?>	/>Accept Offer
	<input type="radio" name="respond" value="2" <?	if ($respond_retrive==2)  
	echo "checked=checked";  
	?> />Decline Offer
	<input type="radio" name="respond" value="3" <?	if ($respond_retrive==3)  
	echo "checked=checked";  
	?> />Counter Offer
	</sup></div>	
	</td>
	</tr>
	<tr>
<td align="center" colspan="3">
	<div align="center"><sup>Price To Offer:  $<input type="text" name="qprice" value="<? echo "$qprice_retrive"; ?>" /></sup></div>	
	</td>
</tr>

<tr>
<td align="center" colspan="3">	
	<div align="center"><sup>Message to <? echo "$name"; ?>: <textarea cols="75%" rows="5" name="message_sent"><? echo "$message_sent_retrive"; ?></textarea></sup> </div>	
	</td>
</tr>
<input type="hidden" name="camount" value="<? echo "$amount"; ?>" />
<tr>
	<td align="center" colspan="3">	
		<table cellspacing="2" cellpadding="2" border="0" align="center">
			<tr>
				<td><sup><input type="submit" name="action" id="action" value="[SEND]" /></sup></form></td>	
				<td><form action="<?php echo $_server['php-self'];?>" method="post">
				<input type="hidden" name="id" value="<? echo "$id"; ?>" />
				<sup><input type="submit" name="action" id="action" value="[DELETE]" /></sup></form>
				</td>				
			</tr>
			<tr>
	<td align="center" colspan="3">	
	<div align="center"><sup><? echo "$sent"; ?></sup></div>	
	</td>
</tr>	
		</table>	
	</td>
</tr>	
</table>
</div>
<div>	
	<br />	

<?
++$j;
} 

?>

