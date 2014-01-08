<!--sphider_noindex--> 
<?php
$get_category = mysql_query("SELECT * FROM type"); 
    if(mysql_num_rows($get_category) >= 1){			
While ($category_list = mysql_fetch_array($get_category)){
?>
<a href="index.php?ac=edit_inventory&type=<?php echo $category_list["type"]?>&cat=<?php echo $category_list["category"]?>"> <?php echo $category_list["category"]?>
</a><br /><br />
<?php
}
}
?>
<!--/sphider_noindex-->