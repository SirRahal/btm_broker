<!--sphider_noindex--> 
<?php
$get_category = mysql_query("SELECT * FROM type ORDER BY category ASC");
    if(mysql_num_rows($get_category) >= 1){			
While ($category_list = mysql_fetch_array($get_category)){
?>
<a href="index.php?ac=inventory&type=<?php echo $category_list["type"]?>&cat=<?php echo $category_list["category"]?>"><?php echo $category_list["category"]?></a><br /><br />
<?php
}
}else{?>
        <a href="index.php?ac=inventory&type=">Sorry no Categories</a>
    <?php } ?>