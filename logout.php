<?php 
 setcookie("username", $_POST['username'], time()-60*60*24*365, '/', 'www.btmbroker.com');
 setcookie("password",  md5($_POST['password']),   time()-60*60*24*365, '/', 'www.btmbroker.com');
session_start();        		
$_SESSION = array(); 
session_destroy(); 
?>
<html>
<head>
<meta http-equiv="refresh" content="0; URL=index.php" />
</head>
<body> <br><br><br>
<div align="center">If you are not redirected to the site within 2 seconds 
<a href="index.php">Click Here</a></div>
</body>
</html>