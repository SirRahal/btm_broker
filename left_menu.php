<!--sphider_noindex--> 
<?	
$get_category = mysql_query("SELECT * FROM type"); 
    if(mysql_num_rows($get_category) >= 1){			
While ($category_list = mysql_fetch_array($get_category)){
?>
<a href="index.php?ac=inventory&type=<?=$category_list["type"]?>&cat=<?=$category_list["category"]?>"><?=$category_list["category"]?></a><br /><br />
<?
}
}
?>
<!--/sphider_noindex--> 
		