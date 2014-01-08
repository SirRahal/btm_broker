<?php

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

//--------------------------------------------------------------

function login($username, $password){
$checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");    
    if(mysql_num_rows($checklogin) == 1)
    {
        $row = mysql_fetch_array($checklogin);
                 
        $_SESSION['Username'] = $username;
        $_SESSION['EmailAddress'] = $row['EmailAddress'];
        $_SESSION['LoggedIn'] = 1;    
        $_SESSION['Admin'] = $row['admin'];
				$_SESSION['UserID'] = $row['UserID'];
				?>	
				<meta http-equiv="refresh" content="0; URL=index.php" />
				<?php
}
else
    {        
       ?>
				<meta http-equiv="refresh" content="0; URL=index.php?ac=fail" />
        <?php
    }
}

//---------------------------------------------------------------

function welcome($admin, $now){
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
$admin=$_SESSION['Admin'];
     ?>
           <p>Welcome <b><?php echo $_SESSION['Username']?></b> <br>
           <?php
           if ($admin==1){
           if ($now==manage){
           ?>
           <a href="../index.php" class="hide">View Site</a> <br> 
					 <a href="../logout.php" class="hide">Logout</a> </p> 
           <?php
           }
           else{
           ?>
           <a href="manage/index.php" class="hide">Admin Control Panel</a> <br> 
					 <a href="logout.php" class="hide">Logout</a> </p> 
					 <?php
					 }
					 }					 
					 
}
}

//------------------------------------------------------------------------

function login_form (){
?>  
     <form method="post" action="<?php echo $_SESSION['last_page']?>" >
     <p>Username:<br>    
     <input type="text" class="text" name="username" id="username" size="14" /><br>      
     Password:<br>      
     <input type="password" class="text" name="password" id="password" size="15" /><br>
     <input type="checkbox" name="remember" value="1">Remember Me</p>
     <input type="submit" value="Login" />
		 </form>
<?php
}

//------------------------------------------------------------------------

function template_list($template_header, $template_id){

$get_template = 'SELECT * FROM `template`'; 
$template_list=mysql_query($get_template);
$num_template=mysql_numrows($template_list);
?>
<form action="<?php echo $_server['php-self'];?>" method="post">
<tr>
<td colspan="3" align="center"> 
<?php echo $template_header?>
<select name="template_id">
<?php
	$k=0;
	while ($k < $num_template) {
$idt=mysql_result($template_list,$k,"id");
$tp_name=mysql_result($template_list,$k,"name");
?>
<option value="<?php echo "$idt";?>" <?php	if ($idt==$template_id)
echo "selected=&quot;selected&quot;";?>>		 <?php echo "$tp_name"; ?> </option>
<?php
++$k;
}
?>	
</select><input type="submit" name="action" id="action"  value="CHOOSE TEMPLATE" />
</td></tr>
</form>
<?php
}

//------------------------------------------------------------------------

function category_list($type2){
$get_type_list = 'SELECT * FROM `type`'; 
$type_list=mysql_query($get_type_list);
$num_type=mysql_numrows($type_list);
?>
<tr>
<td colspan="3" align="center">
CHOOSE CATEGORY: 
<select name="type">
<?php
	$j=0;
	while ($j < $num_type) {
$type=mysql_result($type_list,$j,"type");
$category=mysql_result($type_list,$j,"category");
$check_series=mysql_result($type_list,$j,"series");
?>
	<option value="<?php echo "$type";?>" <?php	if ($type==$type2) 	echo "selected=&quot;selected&quot;";?> >
	 <?echo "$category - $check_series"; ?> </option>	
<?php
++$j;
} 
?>	
</select>
<a href="index.php?ac=add_cat">Add Category</a>
</td>
</tr>
<?php
}
?>