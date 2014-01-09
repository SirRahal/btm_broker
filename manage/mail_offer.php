<?php
$from = "From: ";
$reply = "\r\nReply-To: ";					
$sales_email = constant("sales_email");	
$queryuc="UPDATE customer SET message_sent='$message_sent', qprice='$qprice', sent='Offer Sent', respond='$responds' WHERE id='$mailid'";
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
$respondl=mysql_result($resultl,$l,"respond");
$amountl=mysql_result($resultl,$l,"amount");
$qpricel=mysql_result($resultl,$l,"qprice");
$itemidl=mysql_result($resultl,$l,"itemid");
if ($respondl==1) {
//define the receiver of the email
$to = $emaill;
//define the subject of the email
$subject = 'Responds to Offer From BTM';
//define the message to be sent. Each line should be separated with \n
$mailmessage = "\n
$namel\n
Thankyou for the offer made on BTM Part Number $part_numberl. $productl\n
Your offer of $ $amountl has been accepted\n
Use buy now with the link below and the amount of your offer will be placed at checkout\n
http://www.btmbroker.com/index.php?ac=item&id=$itemidl&accept=$amountl&mailid=$mailid#quote
$message_sent\n\n
Thank You\n
Doug Watkoski
BTM
616-745-5953\n\n
"; 
//define the headers we want passed. Note that they are separated with \r\n
$headers = $from . $sales_email . $reply . $sales_email;
//send the email
$mail_sent = @mail( $to, $subject, $mailmessage, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
}
else 
if ($respondl==2) {

//define the receiver of the email
$to = $emaill;
//define the subject of the email
$subject = 'Responds to Offer From BTM';
//define the message to be sent. Each line should be separated with \n
$mailmessage = "\n
$namel\n
Thankyou for the offer made on BTM Part Number $part_numberl. $productl\n
Your offer of $ $amountl has been declined\n
$message_sent\n\n
Thank You\n
Doug Watkoski
BTM
616-745-5953\n\n
"; 
//define the headers we want passed. Note that they are separated with \r\n
$headers = $from . $sales_email . $reply . $sales_email;
//send the email
$mail_sent = @mail( $to, $subject, $mailmessage, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
}
else 
if ($respondl==3) {

//define the receiver of the email
$to = $emaill;
//define the subject of the email
$subject = 'Responds to Offer From BTM';
//define the message to be sent. Each line should be separated with \n
$mailmessage = "\n
$namel\n
Thank you for the offer made on BTM Part Number $part_numberl. $productl\n
Your offer of $ $amountl has been declined, however I would accept $ $qpricel.\n
If you agree to this price\n
Use buy now with the link below and $qpricel will be placed at checkout\n
http://www.btmbroker.com/index.php?ac=item&id=$itemidl&accept=$qpricel&mailid=$mailid#quote
$message_sent\n\n
Thank You\n
Doug Watkoski
BTM
616-745-5953\n\n
"; 
//define the headers we want passed. Note that they are separated with \r\n
$headers = $from . $sales_email . $reply . $sales_email;
//send the email
$mail_sent = @mail( $to, $subject, $mailmessage, $headers );
}
++$l;
} 
?>
