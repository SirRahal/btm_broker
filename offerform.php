<?php

// Updated 2008-09-21
// Validate Email Address and Phone -- ©2008 PlasticBrain
// www.plasticbrain.net
// ---------------------------------------------------------


// see if the "submit" button was pushed

if (isset($_POST['submit'])) {
  
  
  // gather the POST data
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $amount = $_POST['amount'];
  $message = $_POST['message'];
  $offer = $_POST['offer'];
  $part_name = $_POST['part_name'];
  $itemid = $_POST['itemid'];
  $part_number = $_POST['part_number'];
	$product = $_POST['product'];
	$price2 = $_POST['price2'];  
  

  
  
  
  // make sure our variables are empty
  $error = array();
  $msg = "";
  $error_msg = "";
  
  
// validate name 

  
  if (strlen(trim($name)) > 0) { 
    if(!ereg('^[a-z A-Z]+$', $name)){ 
      $error['name'] = "Your name contains invalid characters. Only letters are allowed! "; // invalid characters
    }
    
  } else {
    $error['name'] = "Please enter your name!"; // the name field was left blank
  }  
    
//validate phone number
  
  if (strlen(trim($phone)) > 0) { 
    if(!ereg('^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$', $phone)){  // 
      $error['phone'] = "Your phone number is not valid!";
    }
  } 


//validate email

  
  if (strlen(trim($email)) > 0) {
    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
      $error['email'] = "Your email address is not valid!";
    }
    
  } else {
    $error['email'] = "Please enter your email address!";
  }


// Check the amount

 if (strlen(trim($amount)) > 0) { 
    if(!ereg('^([0-9]{1,3},)?[0-9]{1,3}(.[0-9]{2})?$', $amount)){  // 
      $error['amount'] = "Please enter an valid offer!";
    }
	 } else {
    $error['amount'] = "Please enter an offer!";
  } 



//
// We are finished validating the form. Now, let's see if there were any errors.
// If there are no errors, we proceed. If there are errors, we will print
// them to the screen and highlight the fields in the form
//


if (empty($error)) {
  
// There were no errors!
  $msg = " $name! Offer for Part # $part_number has been sent!";

 $query = "INSERT INTO customer (`id`, `name`, `email`, `phone`, `quote`, `offer`, `date`, `message`, `part_number`, `product`, `sent`, `message_sent`, `price`, `amount`, `respond`, `itemid`)VALUES ('', '$name', '$email', '$phone', '', '$offer', CURDATE(), '$message', '$part_number', '$product', '', '', '$price2', '$amount', '', '$itemid')"; 
mysql_query($query); 
$from = "From: ";
$reply = "\r\nReply-To: ";					
$sales_email = constant("sales_email");	
$to = constant("tim_email");
$subject = 'Web site offer has been made'; 
$message = "\nYou have received an offer on a part from $name\n
Contact info EMAIL - $email PHONE - $phone PART NUMBER - $part_number OFFER - $amount\n
Please log in to view offer\n"; 
$headers = $from . $sales_email . $reply . $sales_email;
$mail_sent = @mail( $to, $subject, $message, $headers );
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


} // end check for submit button...


//
// Now we print the form...
//

?>
  
  <div id="holder">
  <h2>Make An Offer</h2>
    <?php 
      if (isset($error_msg) && strlen(trim($error_msg)) > 0) {
        echo "<span class=\"error\"> $error_msg </span>\n";
      }
  
      if (isset($msg) && strlen(trim($msg)) > 0) {
        echo "<span class=\"message\"> $msg </span>\n";
      }
    ?>
	
	<form action="<?php $_SERVER['PHP_SELF']; ?>#request" method="post">
  <table width="50%" border="0" cellspacing="2" cellpadding="2" align="center">
  
	  <tr align="left">
	  <td align="left">
	    <span class="label">Name</span><span class="req">*</span> </label>
		</td>
		<td align="left">
	    <input type="text" class="text" name="name" size="39" style="<?php echo $style['name']; ?>" value="<?php if (isset($_POST['name'])) { echo $_POST['name']; } ?>" /><br />
		</td>		
		</tr>
		 <tr align="left">
	  <td align="left">
	    <span class="label">Phone Number</span>
		</td>
		<td align="left"><span class="req">XXX-XXX-XXXX</span><br>
	    <input type="text" class="text" name="phone" size="39" style="<?php echo $style['phone']; ?>" value="<?php if (isset($_POST['phone'])) { echo $_POST['phone']; } ?>" /><br />
</td>		
		</tr>
		<tr align="left">
	  <td align="left">
	  <span class="label">Email</span>
	   <span class="req">*</span> 
		</td>
		<td align="left">
      <input type="text" class="text" name="email" size="39" style="<?php echo $style['email']; ?>" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" /><br />
        	</td>		
		</tr>
	
	<tr align="left">
	  <td align="left">
	  <span class="label">Offer</span>
	   <span class="req">*</span> 
		</td>
		<td align="left">
      <input type="text" class="text" name="amount" size="39" style="<?php echo $style['amount']; ?>" value="<?php if (isset($_POST['amount'])) { echo $_POST['amount']; } ?>" /><br />
        	</td>		
		</tr>	
			<tr align="left">
	  <td align="left">	
	    <span class="label">Message</span>
	    
		</td>
		<td align="left">
	    <textarea name="message" style="<?php echo $style['message']; ?>" cols="30" rows="10"><?php if (isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br />
	    		</td>		
		</tr>
		<tr align="left">
	  <td align="left" colspan="2">	
	    <input type="submit" name="submit" id="submit" value="submit" />
		</td>		
		</tr>
		</table>
		<input type="hidden" name="itemid" value="<? echo "$idp"; ?>" />
		<input type="hidden" name="part_number" value="<? echo "$part_number"; ?>" />
		<input type="hidden" name="price2" value="<? echo "$price"; ?>" />
		<input type="hidden" name="product" value="<? echo "$year",' ',"$mfg",' ',"$model",' ',"$part_name"; ?>" />
		<input type="hidden" name="offer" value="1" />
		
		
    </form>			
  </div>
		