
<?php
$qprice = $_POST['qprice'];
$message_sent = $_POST['message_sent'];
$mailid = $_POST['mailid'];
$ud_id = $_POST['id'];


switch(@$_POST['action'])
{
default:

break;
case '[SEND]':

include("mail_quote.php");
break;

case '[DELETE]':
$queryu="UPDATE customer SET quote='0' WHERE id='$ud_id'";
mysql_query($queryu); 
break;
}
   

$query = 'SELECT * FROM `customer` WHERE quote="1" ORDER BY `date` DESC '; 
$result2=mysql_query($query);
$num2=mysql_numrows($result2); 

?>

<br />
<div align="center">You Have <? echo "$num2"; ?> Active Quote Requests<br />
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
	<td align="center" colspan="3"><sup>Requested Quote on RTM Part #  &nbsp;&nbsp;<strong><? echo "$part_number"; ?></strong>&nbsp;&nbsp; on <? echo "$date"; ?></sup> </td>
</tr>	

<tr>
	<td align="center" colspan="3"><sup><? echo "$product"; ?>&nbsp;&nbsp;-&nbsp;&nbsp;$<? echo "$price"; ?></sup> </td>
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
<tr>
<td align="center" colspan="3">
	<div align="center"><sup>Price To Quote:  $<input type="text" name="qprice" value="<? echo "$qprice_retrive"; ?>" /></sup></div>	
	</td>
</tr>

<tr>
<td align="center" colspan="3">	
	<div align="center"><sup>Message to <? echo "$name"; ?>: <textarea cols="75%" rows="5" name="message_sent"><? echo "$message_sent_retrive"; ?></textarea></sup> </div>	
	</td>
</tr>

<tr>
	<td align="center" colspan="3">	
		<table cellspacing="2" cellpadding="2" border="0" align="center">
			<tr>
				<td><sup>
				<input type="submit" name="action" id="action" value="[SEND]" /></sup></form></td>	
				<td><form action="<?php echo $_server['php-self'];?>" method="post">
				<input type="hidden" name="id" value="<? echo "$id"; ?>" />
				<sup>				
				<input type="submit" name="action" id="action" value="[DELETE]" /></sup></form>
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
	<br />	

<?
++$j;
} 

?>

</div>
