
<style>
    .menubar2{
        background: #666;
        border-bottom:1px solid #000;
        width: 120px;
        height:50px;
    }
    .menuitems2{
        font-family: 'Droid Serif',serif;
    }
    .menuitems2 a{
        padding:8px;
        color: white;
        font-size:14px;
        font-weight: normal;
        display: inline-block;

    }
    .menuitems2 a:hover{
        color: #C3BBAD;
        opacity: 1;
        cursor:pointer;
        background: #666;
    }
</style>

<!--sphider_noindex-->
<?php
$get_category = mysql_query("SELECT * FROM type ORDER BY category ASC");
    if(mysql_num_rows($get_category) >= 1){			
While ($category_list = mysql_fetch_array($get_category)){
?>
    <div class="menubar2 menuitems2"><a href="index.php?ac=inventory&type=<?php echo $category_list["type"]?>&cat=<?php echo $category_list["category"]?>"><?php echo $category_list["category"]?></a></div>
<?php
}
}else{?>
        <a href="index.php?ac=inventory&type=">Sorry No Items</a>
    <?php } ?>