<?php
$rtm_pn = $_POST['rtm_pn'];
switch(@$_POST['action'])
{
default:
if (isset($_GET['id'])){
$idp = $_GET['id'];   
$sql = 'SELECT * FROM `type`'; 
$result2=mysql_query($sql);
$num=mysql_numrows($result2);
$query = "SELECT * FROM `inventory` WHERE id=$idp"; 
$result=mysql_query($query);
$editadd=mysql_numrows($result); 

$i=0;
$id=mysql_result($result,$i,"id");
$part_number=mysql_result($result,$i,"part_number");
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
$date=mysql_result($result,$i,"date");
$sold=mysql_result($result,$i,"sold");
$include=mysql_result($result,$i,"include");
$sernum=mysql_result($result,$i,"sernum");
$shipping=mysql_result($result,$i,"shipping");
$shipping2=mysql_result($result,$i,"shipping2");
$qty=mysql_result($result,$i,"qty");
$offer=mysql_result($result,$i,"offer");
}

break;
case 'ADD':

	// gather the POST data
$part_number = $_POST['part_number'];
$year = $_POST['year'];
$mfg = $_POST['mfg'];
$model = $_POST['model'];
$part_name = $_POST['part_name'];
$price = $_POST['price'];
$pic1 = $_POST['pic1'];
$disc_a1 = $_POST['disc_a1'];
$disc_a2 = $_POST['disc_a2'];
$disc_b1 = $_POST['disc_b1'];
$disc_b2 = $_POST['disc_b2'];
$disc_c1 = $_POST['disc_c1'];
$disc_c2 = $_POST['disc_c2'];
$disc_d1 = $_POST['disc_d1'];
$disc_d2 = $_POST['disc_d2'];
$disc_e1 = $_POST['disc_e1'];
$disc_e2 = $_POST['disc_e2'];
$disc_f1 = $_POST['disc_f1'];
$disc_f2 = $_POST['disc_f2'];
$disc_g1 = $_POST['disc_g1'];
$disc_g2 = $_POST['disc_g2'];
$disc_h1 = $_POST['disc_h1'];
$disc_h2 = $_POST['disc_h2'];
$memo = $_POST['memo'];
$type2 = $_POST['type'];
$sold = $_POST['sold'];
$include = $_POST['include'];
$sernum = $_POST['sernum'];
$shipping = $_POST['shipping'];
$shipping2 = $_POST['shipping2'];
$qty = $_POST['qty'];
$offer = $_POST['offer'];
$date=date('Y-m-d');

if (strlen($part_number)>0){
}
else{
$get_category = mysql_query("SELECT * FROM type WHERE type=$type2"); 
    if(mysql_num_rows($get_category) >= 1){			
While ($category_list = mysql_fetch_array($get_category)){
$series=$category_list["series"];
}
}	
$query = "INSERT INTO $series (`id`) VALUES ('')"; 
mysql_query($query);
$key = mysql_insert_id(); 
mysql_query("DELETE FROM $series WHERE id=$key");		 
$part_number=$series.$key;
}  
  // make sure our variables are empty   
  	$error = array();
  	$msg = "";
  	$error_msg = ""; 	
  // validate part number  
     if (empty($part_number)) {
    $error['part_number'] = "Please enter a Part Number!"; // the name field was left blank
  }  
   $checkpartnumber = mysql_query("SELECT * FROM inventory WHERE part_number = '".$part_number."'");
		if(mysql_num_rows($checkpartnumber) == 1){
		$error['part_number'] = "Sorry, that part number is in use!"; // the name field was left blank
		} 		
  //validate pic1   
  if (empty($pic1)) {
    $error['pic1'] = "Please enter a vaule for the picture field!";
  } 
//
// We are finished validating the form. Now, let's see if there were any errors.
// If there are no errors, we proceed. If there are errors, we will print
// them to the screen and highlight the fields in the form
//
if (empty($error)) {  
// There were no errors!
$query = "INSERT INTO inventory (`id`, `part_number`, `year`, `mfg`, `model`, `part_name`, `price`, `pic1`, `disc_a1`, `disc_a2`, `disc_b1`, `disc_b2`, `disc_c1`, `disc_c2`, `disc_d1`, `disc_d2`, `disc_e1`, `disc_e2`, `disc_f1`, `disc_f2`, `disc_g1`, `disc_g2`, `disc_h1`, `disc_h2`, `memo`, `type`, `date`, `sold`, `include`, `sernum`, `shipping`, `shipping2`, `qty`, `offer`) VALUES ('', '$part_number', '$year', '$mfg', '$model', '$part_name', '$price', '$pic1', '$disc_a1', '$disc_a2', '$disc_b1', '$disc_b2', '$disc_c1', '$disc_c2', '$disc_d1', '$disc_d2', '$disc_e1', '$disc_e2', '$disc_f1', '$disc_f2', '$disc_g1', '$disc_g2', '$disc_h1', '$disc_h2', '$memo', '$type2', CURDATE(), '$sold', '$include', '$sernum', '$shipping', '$shipping2', '$qty', '$offer')"; 
mysql_query($query); 
$key = mysql_insert_id();
$query = "INSERT INTO link (`id`, `type`, `item_id`, part_number) VALUES ('', '$type2', '$key', '$part_number')"; 
mysql_query($query);
$id = $key;
$msg="The item was Added!";
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
case 'SIMILAR':

	// gather the POST data
$part_number = $_POST['part_number'];
$year = $_POST['year'];
$mfg = $_POST['mfg'];
$model = $_POST['model'];
$part_name = $_POST['part_name'];
$price = $_POST['price'];
$pic1 = $_POST['pic1'];
$disc_a1 = $_POST['disc_a1'];
$disc_a2 = $_POST['disc_a2'];
$disc_b1 = $_POST['disc_b1'];
$disc_b2 = $_POST['disc_b2'];
$disc_c1 = $_POST['disc_c1'];
$disc_c2 = $_POST['disc_c2'];
$disc_d1 = $_POST['disc_d1'];
$disc_d2 = $_POST['disc_d2'];
$disc_e1 = $_POST['disc_e1'];
$disc_e2 = $_POST['disc_e2'];
$disc_f1 = $_POST['disc_f1'];
$disc_f2 = $_POST['disc_f2'];
$disc_g1 = $_POST['disc_g1'];
$disc_g2 = $_POST['disc_g2'];
$disc_h1 = $_POST['disc_h1'];
$disc_h2 = $_POST['disc_h2'];
$memo = $_POST['memo'];
$type2 = $_POST['type'];
$sold = $_POST['sold'];
$include = $_POST['include'];
$sernum = $_POST['sernum'];
$shipping = $_POST['shipping'];
$shipping2 = $_POST['shipping2'];
$qty = $_POST['qty'];
$offer = $_POST['offer'];
$date=date('Y-m-d');

if (strlen($part_number)>0){
}
else{
$get_category = mysql_query("SELECT * FROM type WHERE type=$type2"); 
    if(mysql_num_rows($get_category) >= 1){			
While ($category_list = mysql_fetch_array($get_category)){
$series=$category_list["series"];
}
}	
$query = "INSERT INTO $series (`id`) VALUES ('')"; 
mysql_query($query);
$key = mysql_insert_id(); 
mysql_query("DELETE FROM $series WHERE id=$key");		 
$part_number=$series.$key;
}  
  // make sure our variables are empty   
  	$error = array();
  	$msg = "";
  	$error_msg = ""; 	
  // validate part number  
     if (empty($part_number)) {
    $error['part_number'] = "Please enter a Part Number!"; // the name field was left blank
  }  
   $checkpartnumber = mysql_query("SELECT * FROM inventory WHERE part_number = '".$part_number."'");
		if(mysql_num_rows($checkpartnumber) == 1){
		$error['part_number'] = "Sorry, that part number is in use!"; // the name field was left blank
		} 		
  //validate pic1   
  if (empty($pic1)) {
    $error['pic1'] = "Please enter a vaule for the picture field!";
  } 
//
// We are finished validating the form. Now, let's see if there were any errors.
// If there are no errors, we proceed. If there are errors, we will print
// them to the screen and highlight the fields in the form
//
if (empty($error)) {  
// There were no errors!
$query = "INSERT INTO inventory (`id`, `part_number`, `year`, `mfg`, `model`, `part_name`, `price`, `pic1`, `disc_a1`, `disc_a2`, `disc_b1`, `disc_b2`, `disc_c1`, `disc_c2`, `disc_d1`, `disc_d2`, `disc_e1`, `disc_e2`, `disc_f1`, `disc_f2`, `disc_g1`, `disc_g2`, `disc_h1`, `disc_h2`, `memo`, `type`, `date`, `sold`, `include`, `sernum`, `shipping`, `shipping2`, `qty`, `offer`) VALUES ('', '$part_number', '$year', '$mfg', '$model', '$part_name', '$price', '$pic1', '$disc_a1', '$disc_a2', '$disc_b1', '$disc_b2', '$disc_c1', '$disc_c2', '$disc_d1', '$disc_d2', '$disc_e1', '$disc_e2', '$disc_f1', '$disc_f2', '$disc_g1', '$disc_g2', '$disc_h1', '$disc_h2', '$memo', '$type2', CURDATE(), '$sold', '$include', '$sernum', '$shipping', '$shipping2', '$qty', '$offer')"; 
mysql_query($query); 
$key = mysql_insert_id();
$query = "INSERT INTO link (`id`, `type`, `item_id`, part_number) VALUES ('', '$type2', '$key', '$part_number')"; 
mysql_query($query);
$id = $key;
$msg="The item was Added!";
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
case 'EDIT':


$id = ($_POST['id']);
$part_number = $_POST['part_number'];
$part_number_check = $_POST['part_number_check'];
$year = $_POST['year'];
$mfg = $_POST['mfg'];
$model = $_POST['model'];
$part_name = $_POST['part_name'];
$price = $_POST['price'];
$pic1 = $_POST['pic1'];
$disc_a1 = $_POST['disc_a1'];
$disc_a2 = $_POST['disc_a2'];
$disc_b1 = $_POST['disc_b1'];
$disc_b2 = $_POST['disc_b2'];
$disc_c1 = $_POST['disc_c1'];
$disc_c2 = $_POST['disc_c2'];
$disc_d1 = $_POST['disc_d1'];
$disc_d2 = $_POST['disc_d2'];
$disc_e1 = $_POST['disc_e1'];
$disc_e2 = $_POST['disc_e2'];
$disc_f1 = $_POST['disc_f1'];
$disc_f2 = $_POST['disc_f2'];
$disc_g1 = $_POST['disc_g1'];
$disc_g2 = $_POST['disc_g2'];
$disc_h1 = $_POST['disc_h1'];
$disc_h2 = $_POST['disc_h2'];
$memo = $_POST['memo'];
$type2 = $_POST['type'];
$sold = $_POST['sold'];
$include = $_POST['include'];
$sernum = $_POST['sernum'];
$shipping = $_POST['shipping'];
$shipping2 = $_POST['shipping2'];
$qty = $_POST['qty'];
$offer = $_POST['offer'];
$date = ($_POST['date']);
$type_id = $_POST['type_id'];
  // make sure our variables are empty   
  	$error = array();
  	$msg = "";
  	$error_msg = ""; 	
  // validate part number  
     if (empty($part_number)) {
    $error['part_number'] = "Please enter a Part Number!"; // the name field was left blank
  }
	if ($part_number<>$part_number_check){  
   $checkpartnumber = mysql_query("SELECT * FROM inventory WHERE part_number = '".$part_number."'");
		if(mysql_num_rows($checkpartnumber) == 1){
		$error['part_number'] = "Sorry, that part number is in use!"; // the name field was left blank
		} 
		}		
  //validate pic1   
  if (empty($pic1)) {
    $error['pic1'] = "Please enter a vaule for the picture field!";
  } 
//
// We are finished validating the form. Now, let's see if there were any errors.
// If there are no errors, we proceed. If there are errors, we will print
// them to the screen and highlight the fields in the form
//
if (empty($error)) {  
// There were no errors!
// CHECK TO SEE IF NEW ID AND TYPE EXISTS IN LINK
$check_new_link = "SELECT * FROM `link` WHERE item_id=$id AND type=$type2"; 
$check_link_id=mysql_query($check_new_link); 
$num_new_link=mysql_numrows($check_link_id);


$get_link = "SELECT * FROM `link` WHERE item_id=$id AND type=$type_id"; 
$link_id=mysql_query($get_link);
$e=0;
$link_id=mysql_result($link_id,$e,"id");
if ($num_new_link==0){ 
$sql6="UPDATE link SET type='$type2', part_number='$part_number' WHERE id='$link_id'";
mysql_query($sql6);
}
else
{
mysql_query("DELETE FROM type WHERE id=$link_id");
}   
$query="UPDATE inventory SET part_number='$part_number', year='$year', mfg='$mfg', model='$model', pic1='$pic1', part_name='$part_name' WHERE id='$id'";
$sql2="UPDATE inventory SET memo='$memo', type='$type2', date='$date', sold='$sold', include='$include', price='$price' WHERE id='$id'";
$sql="UPDATE inventory SET disc_a1='$disc_a1', disc_a2='$disc_a2', disc_b1='$disc_b1', disc_b2='$disc_b2', disc_c1='$disc_c1', disc_c2='$disc_c2' WHERE id='$id'";
$sql3="UPDATE inventory SET disc_d1='$disc_d1', disc_d2='$disc_d2', disc_e1='$disc_e1', disc_e2='$disc_e2', disc_f1='$disc_f1', disc_f2='$disc_f2' WHERE id='$id'";
$sql4="UPDATE inventory SET disc_g1='$disc_g1', disc_g2='$disc_g2', disc_h1='$disc_h1', disc_h2='$disc_h2', sernum='$sernum', shipping='$shipping' WHERE id='$id'";
$sql5="UPDATE inventory SET shipping2='$shipping2', qty='$qty', offer='$offer'  WHERE id='$id'";
mysql_query($query); 
mysql_query($sql2); 
mysql_query($sql); 
mysql_query($sql3);
mysql_query($sql4);
mysql_query($sql5);
$msg="The item was Edited!";
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
case 'CHOOSE TEMPLATE':
$template_id = $_POST['template_id'];
$query = "SELECT * FROM `template` WHERE id=$template_id";
$result=mysql_query($query);
$num2=mysql_numrows($result); 
?>
<?php
$i=0;
while ($i < $num2) {
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
case 'FIND':
if (strlen($_POST['rtm_pn'])>0){
$rtm_pn = $_POST['rtm_pn'];
  
$sql = 'SELECT * FROM `type`'; 
$result2=mysql_query($sql);
$num=mysql_numrows($result2);

$query = "SELECT * FROM `inventory` WHERE part_number='$rtm_pn'"; 

$result=mysql_query($query);
$num2=mysql_numrows($result); 
if (isset($_POST['rtm_pn']) && $num2==0){  
	$msg="NO ITEM MATCHES PART NUMBER $rtm_pn"; 
	}
	else
	{
$i=0;
$id=mysql_result($result,$i,"id");
$part_number=mysql_result($result,$i,"part_number");
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
$date=mysql_result($result,$i,"date");
$sold=mysql_result($result,$i,"sold");
$include=mysql_result($result,$i,"include");
$sernum=mysql_result($result,$i,"sernum");
$shipping=mysql_result($result,$i,"shipping");
$shipping2=mysql_result($result,$i,"shipping2");
$qty=mysql_result($result,$i,"qty");
$offer=mysql_result($result,$i,"offer");
	 }
	 }
break;
case 'DELETE':
$idp = $_POST['id'];
$type_id = $_POST['type_id'];  
mysql_query("DELETE FROM inventory WHERE id=$idp");
mysql_query("DELETE FROM link WHERE item_id=$idp");
$id = '';
$part_number = '';
$part_number_check = '';
$year = '';
$mfg = '';
$model = '';
$part_name = '';
$price = '';
$pic1 = '';
$disc_a1 = '';
$disc_a2 = '';
$disc_b1 = '';
$disc_b2 = '';
$disc_c1 = '';
$disc_c2 = '';
$disc_d1 = '';
$disc_d2 = '';
$disc_e1 = '';
$disc_e2 = '';
$disc_f1 = '';
$disc_f2 = '';
$disc_g1 = '';
$disc_g2 = '';
$disc_h1 = '';
$disc_h2 = '';
$memo = '';
$type2 = '';
$sold = '';
$include = '';
$sernum = '';
$shipping = '';
$shipping2 = '';
$qty = '';
$offer = '';
$date = '';
$type_id = '';


$msg="The item was DELETED!";
break;
}





// Now we print the form...
//	
if (strlen($type2)>0){
$get_type = "SELECT * FROM `type` WHERE type=$type2"; 
$item_type=mysql_query($get_type);
$num_type=mysql_numrows($item_type);   
$m=0;
$title=mysql_result($item_type,$m,"category");
}
if (strlen($year)>0 || strlen($mfg)>0 || strlen($model)>0 || strlen($part_name)>0)
{
?>
<div align="center"><a href="../index.php?ac=item&id=<?php echo $id?>" class="hide">
		<p class="about"><?php if (strlen($year)>0)echo "$year - ";?><?php if (strlen($mfg)>0)echo "$mfg - ";?><?php if (strlen($model)>0)echo "$model - ";?><?php if (strlen($part_name)>0)echo $part_name;?></p></a></div>
<?php
}
if (isset($error_msg) && strlen(trim($error_msg)) > 0) {
?>
<br><table width="75%" align="center"><tr><td>
    <span class="error"> <?php echo $error_msg?></span>
</td></tr></table> 
<?php
}  
      if (isset($msg) && strlen(trim($msg)) > 0) {
?>
<br><table width="75%" align="center"><tr><td>
    <span class="message"><div align="center"> <?php echo $msg?> </div></span>
</td></tr></table> 
<?php
}
switch(@$_POST['action'])
{
default:
if ($editadd>0){
?>
<div align="center">
<a href="../index.php?ac=item&id=<?php echo $id?>">View Item</a>
&nbsp;&nbsp;
<a href="index.php?ac=template&id=<?php echo $id?>">Make Item Template</a>
&nbsp;&nbsp;
<a href="index.php?ac=multi_cat&id=<?php echo $id?>&type=<?php echo $type2?>&cat=<?php echo $title?>&year=<?php echo $year?>&mfg=<?php echo $mfg?>&model=<?php echo $model?>&part_name=<?php echo $part_name?>&part_number=<?php echo $part_number?>">Add to Other Category</a>
</div>	
<?php
}
break;
case 'EDIT':
?>
<div align="center">
<a href="../index.php?ac=item&id=<?php echo $id?>">View Item</a>
&nbsp;&nbsp;
<a href="index.php?ac=template&id=<?php echo $id?>">Make Item Template</a>
&nbsp;&nbsp;
<a href="index.php?ac=multi_cat&id=<?php echo $id?>&type=<?php echo $type2?>&cat=<?php echo $title?>&year=<?php echo $year?>&mfg=<?php echo $mfg?>&model=<?php echo $model?>&part_name=<?php echo $part_name?>&part_number=<?php echo $part_number?>">Add to Other Category</a>
</div>	
<?php
break;
case 'ADD':
if (empty($error)) { 
?>
<div align="center">
<a href="../index.php?ac=item&id=<?php echo $id?>">View Item</a>
&nbsp;&nbsp;
<a href="index.php?ac=template&id=<?php echo $id?>">Make Item Template</a>
&nbsp;&nbsp;
<a href="index.php?ac=multi_cat&id=<?php echo $id?>&type=<?php echo $type2?>&cat=<?php echo $title?>&year=<?php echo $year?>&mfg=<?php echo $mfg?>&model=<?php echo $model?>&part_name=<?php echo $part_name?>&part_number=<?php echo $part_number?>">Add to Other Category</a>
</div>	
<?php
}
break;
case 'CHOOSE TEMPLATE':
break;
case 'FIND':
if (strlen($_POST['rtm_pn'])>0){
?>
<div align="center">
<a href="../index.php?ac=item&id=<?php echo $id?>">View Item</a>
&nbsp;&nbsp;
<a href="index.php?ac=template&id=<?php echo $id?>">Make Item Template</a>
&nbsp;&nbsp;
<a href="index.php?ac=multi_cat&id=<?php echo $id?>&type=<?php echo $type2?>&cat=<?php echo $title?>&year=<?php echo $year?>&mfg=<?php echo $mfg?>&model=<?php echo $model?>&part_name=<?php echo $part_name?>&part_number=<?php echo $part_number?>">Add to Other Category</a>
</div>	
<?php
}
break;
case 'DELETE':
break;
}
?>
<br />
<table align="center" width="95%" cellspacing="2" cellpadding="2" border="1">
<form action="index.php?ac=edit_item"  method="POST">
<tr>
<td colspan="3"><div align="center">
FIND BY BTM PART NUMBER:  <input type="text" name="rtm_pn" size="15" maxlength="10">
<input type="submit" name="action" id="action" value="FIND" /></div>
</td>
</tr>
</form>

<?php
template_list('ADD ITEM FROM TEMPLATE ', $template_id);
?>


<form action="index.php?ac=edit_item" method="post" >
    <input type="hidden" name="id"  value="<?php echo $id?>" />
    <input type="hidden" name="type_id"  value="<?php echo $type2?>" />
    <input type="hidden" name="part_number_check"  value="<?php echo $part_number?>" />
    <?php
    switch(@$_POST['action'])
    {
    default:
    if ($editadd>0){
    ?>
    <tr><th colspan="3" align="center">	EDIT ITEM TO INVENTORY</th></tr>
    <?php
    }
    else{
    ?>
    <tr><th colspan="3" align="center">	ADD ITEM TO INVENTORY</th></tr>
    <?php
    }
    break;
    case 'ADD':
    ?>
    <tr><th colspan="3" align="center">
    <?php
    if (empty($error)) {
    ?>
    <a href="index.php?ac=multi_cat&id=<?php echo $key?>&type=<?php echo $type2?>&cat=<?php echo $title?>&year=<?php echo $year?>&mfg=<?php echo $mfg?>&model=<?php echo $model?>&part_name=<?php echo $part_name?>">Add to Other Category</a>
    <?php
    }
    ?>
    EDIT ITEM TO INVENTORY	</th></tr>
    <?php
    break;

    case 'EDIT':
    ?>
    <tr><th colspan="3" align="center">	EDIT ITEM TO INVENTORY</th></tr>
    <?php
    break;
    case 'CHOOSE TEMPLATE':
    ?>
    <tr><th colspan="3" align="center">	ADD ITEM TO INVENTORY FROM TEMPLATE</th></tr>
    <?php
    break;
    case 'FIND':
    ?>
    <tr><th colspan="3" align="center">	EDIT ITEM TO INVENTORY</th></tr>
    <?php
    break;
    case 'DELETE':
    ?>
    <tr><th colspan="3" align="center">	ADD ITEM TO INVENTORY</th></tr>
    <?php
    break;
    }
    ?>
    <?php
    category_list($type2);
    ?>
        <td>BTM PART NUMBER:<br /><input type="text" name="part_number"  size="15" maxlength="10" value="<?php if (isset($part_number)) { echo $part_number; } ?>"/></td>
        <td>YEAR:<br /><input type="text" name="year" size="15" maxlength="4" value="<?php if (isset($year)) { echo $year; } ?>" /></td>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" >
                <tr>
                    <td>PRICE:	</td>
                    <td><input type="checkbox" name="include" value="Yes" <?php

        if ($include=='Yes')
        echo "checked";

    ?>  /><sup>On Site</sup></td>
                </tr>

                <tr>
                    <td><input type="text" name="price"  size="15" maxlength="15" value="<?php if (isset($price)) { echo $price; } ?>" /></td>
                    <td><input type="checkbox" name="offer" value="Yes" <?php

        if ($offer=='Yes')
        echo "checked";

    ?>  /><sup>Offers</sup>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>MFG:<br /><input type="text" name="mfg"  size="30" maxlength="30" value="<?php if (isset($mfg)) { echo $mfg; } ?>" /></td>
        <td>MODEL:<br /><input type="text" name="model"  size="30" maxlength="30" value="<?php if (isset($model)) { echo $model; } ?>" /></td>
        <td>PART NAME:<br /><input type="text" name="part_name"  size="30" maxlength="30" value="<?php if (isset($part_name)) { echo $part_name; } ?>" /></td>
    </tr>
    <tr>
        <td>PIC FILE NAME:<br /><input type="text" name="pic1"  size="15" maxlength="15" value="<?php if (isset($pic1)) { echo $pic1; } ?>" /></td>
        <td>SERIAL NUMBER:<br /><input type="text" name="sernum" size="30" maxlength="30" value="<?php if (isset($sernum)) { echo $sernum; } ?>" /></td>
        <td>
        <table cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td align="left">SHIPPING:</td>
        <td align="left">ADD PER:</td>
    </tr>
    <tr>
        <td><input type="text" name="shipping" size="15" maxlength="15" value="<?php if (isset($shipping)) { echo $shipping; } ?>" /></td>
        <td><input type="text" name="shipping2" size="10" maxlength="15" value="<?php if (isset($shipping2)) { echo $shipping2; } ?>" /></td>
    </tr>
    </table>
    </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="disc_a1" size="30" maxlength="30" value="<?php if (isset($disc_a1)) { echo $disc_a1; } ?>" /></td>
        <td><input type="text" name="disc_a2" size="30" maxlength="30" value="<?php if (isset($disc_a2)) { echo $disc_a2; } ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="disc_b1" size="30" maxlength="30" value="<?php if (isset($disc_b1)) { echo $disc_b1; } ?>" /></td>
        <td><input type="text" name="disc_b2" size="30" maxlength="30" value="<?php if (isset($disc_b2)) { echo $disc_b2; } ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="disc_c1" size="30" maxlength="30" value="<?php if (isset($disc_c1)) { echo $disc_c1; } ?>" /></td>
        <td><input type="text" name="disc_c2" size="30" maxlength="30" value="<?php if (isset($disc_c2)) { echo $disc_c2; } ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="disc_d1" size="30" maxlength="30" value="<?php if (isset($disc_d1)) { echo $disc_d1; } ?>" /></td>
        <td><input type="text" name="disc_d2" size="30" maxlength="30" value="<?php if (isset($disc_d2)) { echo $disc_d2; } ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="disc_e1" size="30" maxlength="30" value="<?php if (isset($disc_e1)) { echo $disc_e1; } ?>" /></td>
        <td><input type="text" name="disc_e2" size="30" maxlength="30" value="<?php if (isset($disc_e2)) { echo $disc_e2; } ?>" /></td>
    </tr>
    <tr>
        <td><input type="hidden" name="sold" value="no" /></td>
        <td><input type="text" name="disc_f1" size="30" maxlength="30" value="<?php if (isset($disc_f1)) { echo $disc_f1; } ?>" /></td>
        <td><input type="text" name="disc_f2" size="30" maxlength="30" value="<?php if (isset($disc_f2)) { echo $disc_f2; } ?>" /></td>
    </tr>
    <tr>
        <td>
        <?php if (isset($date)) { ?>
        DATE ENTERED:<br /><input type="text" name="date"  size="15" maxlength="15" value="<?php echo "$date"; ?>" />
        <?php
        }
        ?>
         </td>
        <td><input type="text" name="disc_g1" size="30" maxlength="30" value="<?php if (isset($disc_g1)) { echo $disc_g1; } ?>" /></td>
        <td><input type="text" name="disc_g2" size="30" maxlength="30" value="<?php if (isset($disc_g2)) { echo $disc_g2; } ?>" /></td>
    </tr>
    <tr>
        <td>
            <?php if (isset($sold)) { ?>
        Sold:  <input type="checkbox" name="sold" value="Yes" <?php
        if ($sold==Yes)
        echo "checked"; ?> 	 />
        <?php
        }
        ?>

        </td>
        <td><input type="text" name="disc_h1" size="30" maxlength="30" value="<?php if (isset($disc_h1)) { echo $disc_h1; } ?>" /></td>
        <td><input type="text" name="disc_h2" size="30" maxlength="30" value="<?php if (isset($disc_h2)) { echo $disc_h2; } ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td>QTY</td>
        <td><input type="text" name="qty" size="10" maxlength="4" value="<?php if (isset($qty)) { echo $qty; } ?>" /></td>

    </tr>
    <tr>
        <td colspan="3" align="center"><textarea cols="75%" rows="10" name="memo"> <?php if (isset($memo)) { echo $memo; } ?></textarea></td>
    </tr>
    <tr>
        <td colspan="3" align="center"><br />
    <?php
    switch(@$_POST['action'])
    {
    default:
    if ($editadd>0){
    ?>
        <input type="submit" name="action" id="action" value="EDIT" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="action" id="action" value="DELETE" onclick="return confirm('Are you sure you want to delete Part Number <?php echo $part_number?>?');"/>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="action" id="action" value="SIMILAR" />
        <br /><br />
    <?php
    }
    else
    {
    ?>
        <input type="submit" name="action" id="action" value="ADD" /><br /><br />
    <?php
    }
    break;
    case 'EDIT':
    ?>
        <input type="submit" name="action" id="action" value="EDIT" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="action" id="action" value="DELETE" onclick="return confirm('Are you sure you want to delete Part Number <?php echo $part_number?>?');"/>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="action" id="action" value="SIMILAR" />
        <br /><br />
    <?php
    break;
    case 'ADD':
    if (empty($error)) {
    ?>
        <input type="submit" name="action" id="action" value="EDIT" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="action" id="action" value="DELETE" onclick="return confirm('Are you sure you want to delete Part Number <?php echo $part_number?>?');"/>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="action" id="action" value="SIMILAR" />
        <br /><br />
    <?php
    }
    else
    {
    ?>
    <input type="submit" name="action" id="action" value="ADD" /><br /><br />
    <?php
    }
    break;
    case 'CHOOSE TEMPLATE':
    ?>
        <input type="submit" name="action" id="action" value="ADD" /><br /><br />
    <?php
    break;
    case 'FIND':
    if (strlen($_POST['rtm_pn'])>0){
    ?>
        <input type="submit" name="action" id="action" value="EDIT" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="action" id="action" value="DELETE" onclick="return confirm('Are you sure you want to delete Part Number <?php echo $part_number?>?');"/>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="action" id="action" value="SIMILAR" />

        <br /><br />
    <?php
    }
    else
    {
    ?>
        <input type="submit" name="action" id="action" value="ADD" /><br /><br />
    <?php

    }
    break;
    case 'DELETE':
    ?>
        <input type="submit" name="action" id="action" value="ADD" /><br /><br />
    <?php
    break;
    }
    ?>

        </td>


    </tr>
    </table>


</form>
