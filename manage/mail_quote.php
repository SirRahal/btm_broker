<?php   
$queryuc="UPDATE customer SET message_sent='$message_sent', qprice='$qprice', sent='Quote Sent' WHERE id='$mailid'";
mysql_query($queryuc); 
$queryl = "SELECT * FROM `customer` WHERE id=$mailid"; 
$resultl=mysql_query($queryl);
$numl=mysql_numrows($resultl); 

$l=0;
while ($l < $numl) {
$idl=mysql_result($resultl,$l,"id");
$namel=mysql_result($resultl,$l,"name");
$emaill=mysql_result($resultl,$l,"email");
$part_numberl=mysql_result($resultl,$l,"part_number");
$productl=mysql_result($resultl,$l,"product");
//define the receiver of the email
$from = "From: ";
$reply = "\r\nReply-To: ";					
$sales_email = constant("sales_email");	
$to = $emaill;
//define the subject of the email
$subject = 'Requested Quote From RTM'; 
//define the message to be sent. Each line should be separated with \n
$mailmessage = "\n
$namel\n
Thankyou for your request for quote on RTM Part Number $part_numberl. $productl\n
The current price is $ $qprice\n
$message_sent\n\n
Thankyou\n
Tim Berridge
Reliable Tool & Machine, Inc.
269-217-2390 Phone\n\n
"; 
//define the headers we want passed. Note that they are separated with \r\n
$headers = $from . $sales_email . $reply . $sales_email;
//send the email
$mail_sent = @mail( $to, $subject, $mailmessage, $headers );
++$l;
} 
?>
