<?
$paypal_email = constant("paypal_email");	
?>
<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? echo "$paypal_email"; ?>">
<input type="hidden" name="item_name" value="<? echo "$part_name"; ?>">
<input type="hidden" name="item_number" value="<? echo "$part_number"; ?>">
<input type="hidden" name="amount" value="<?echo "$price"; ?>">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="shipping" value="<? echo "$shipping"; ?>">
<input type="hidden" name="shipping2" value="<? echo "$shipping2"; ?>">
<input type="hidden" name="handling" value="">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="image_url" value="">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="custom" value="<?if (isset($mailid)){echo "$mailid";}?>">
<input type="hidden" name="invoice" value="">
<input type="hidden" name="undefined_quantity" value="1">
<?php	
	if ($qty>1)  { 
?>  
QTY Ordered<br><br>
<select name="quantity">
<?
$m=1;
while ($m <= $qty) {
?>
	<option value="<? echo "$m"; ?>"><? echo "$m"; ?> </option>
<?
++$m;
} 
?>
</select><br><br>
<?
}
else{
?>
<input type="hidden" name="quantity" value="1">
<?
}
?>
<input type="hidden" name="cn" value="Message to Seller">
<input type="hidden" name="return" value="">
<input type="hidden" name="cancel_return" value="">
<input type="hidden" name="bn" value="yahoo-jsbf">
<input type="hidden" name="pal" value="C3MGKKUCCAB9J">
<input type="hidden" name="mrb" value="R-5AJ59462NH120001H">
<input type="image" src="x-click-but23.gif">
</form>