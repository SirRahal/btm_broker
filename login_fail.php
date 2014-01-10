
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
    {       
?>
		<meta http-equiv="refresh" content="2; URL=index.php" />
		<div align="center">
    <span class="message">
    <div align="center"><h1> Login Success </h1><br>
    <h1> Thank You</h1></div>
    </span>   
    <br><br>
		</div>
<?
}
if(empty($_SESSION['LoggedIn']) && empty($_SESSION['Username']))
{
?>  
    <div align="center">
    <span class="error">
    <div align="center"><br>
    <h2> Please Check Your Username and Password And Try Again </h2></div>
  </span>
    <table border="2" width="50%"><tr><td><br>
    <?
     login_form ();
     ?>      
</td></tr></table>
</div>
<?php
}
?>