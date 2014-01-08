<?php
$cat = $_GET['cat'];
$type_id = $_GET['type'];

 if (isset($_GET['page']))
$page = $_GET['page'];
else
$page = 0;
if (isset($_GET['limit']))
$limit = $_GET['limit'];
else
$limit = 20;
if ($type_id=='ALL')
{
$query = "select DISTINCT item_id from link ORDER BY type, id ASC";
}
else if ($type_id=='part_number')
{



$letter = $_GET['letter'];
if (isset($_GET['letter']))
{
$query = "select DISTINCT item_id from link WHERE part_number LIKE '$letter%' ORDER BY part_number ASC";
}
else
{
$query = "select DISTINCT item_id from link ORDER BY part_number ASC";
}
}



else{
$query = "SELECT * FROM `link` WHERE type=$type_id ORDER BY id ASC";
}
$numresults = mysql_query($query); // the query.
$numrows = mysql_num_rows($numresults); // Number of rows returned from above query.
if ($numrows == 0){
?>
<br /><br /><br /><div align="center"><a href="index.php?ac=edit_inventory&type=part_number&cat=ALL" class="hide"><p class="about">No Items Found For <?php if (isset($_GET['letter'])){echo $letter;}else{echo $cat;}?>!</p></a></div>
<?php
}
else
{
$pages = intval($numrows/$limit); // Number of results pages.

// $pages now contains int of pages, unless there is a remainder from division.

if ($numrows % $limit) {
$pages++;} // has remainder so add one page

$current = ($page/$limit) + 1; // Current page number.

if (($pages < 1) || ($pages == 0)) {
$total = 1;} // If $pages is less than one or equal to 0, total pages is 1.

else {
$total = $pages;} // Else total pages is $pages value.

$first = $page + 1; // The first result.

if (!((($page + $limit) / $limit) >= $pages) && $pages != 1) {
$last = $page + $limit;} //If not last results page, last result equals $page plus $limit.
 
else{
$last = $numrows;} // If last results page, last result equals total number of results.
if ($type_id=='ALL')
{
$sql = "select DISTINCT item_id from link ORDER BY type, id ASC LIMIT $page, $limit"; 
}
else if ($type_id=='part_number')
{
if (isset($_GET['letter']))
{
$sql = "select DISTINCT item_id from link WHERE part_number LIKE '$letter%' ORDER BY part_number ASC LIMIT $page, $limit";
}
else
{
$sql = "select DISTINCT item_id from link ORDER BY part_number ASC LIMIT $page, $limit";
}
}
else{
$sql = "SELECT * FROM `link` WHERE type=$type_id ORDER BY id ASC LIMIT $page, $limit"; 
}

$result3=mysql_query($sql);
$num2=mysql_numrows($result3); 


?>

<div align="center">
<br />You have <?php echo($numrows) ?> items listed
<?php
if ($type_id=='ALL' || $type_id=='part_number')
{
if ($type_id=='ALL'){
?>
<a href="index.php?ac=edit_inventory&type=part_number&cat=ALL&page=0&limit=<?php echo $limit?>" class="hide"><p class="about">Order By Part Number</p></a>
<?php
}
if ($type_id=='part_number'){
?>
<a href="index.php?ac=edit_inventory&type=ALL&cat=ALL&page=0&limit=<?php echo $limit?>" class="hide"><p class="about">Order By Category</p></a>
<?php
}
?>
<br>
<?php

for ($i=0; $i <= 9; $i++) {
 $x = $i;
?>
<a href="index.php?ac=edit_inventory&type=part_number&letter=<?php echo $x?>&cat=ALL&page=0&limit=<?php echo $limit?>"><?php echo $x?></a> |
<?php
}


for ($i=65; $i <= 90; $i++) {
 $x = chr($i);
?>
<a href="index.php?ac=edit_inventory&type=part_number&letter=<?php echo $x?>&cat=ALL&page=0&limit=<?php echo $limit?>"><?php echo $x?></a> |
<?php
}
?>
<a href="index.php?ac=edit_inventory&type=part_number&cat=ALL&page=0&limit=<?php echo $limit?>">ALL</a>
<br><br>

<?php
}
else {?>
 for 
<a href="../index.php?ac=inventory&type=<?php echo $type_id?>&cat=<?php echo $cat?>" class="hide"><p class="about"><?php echo $cat?></p></a>
<?php}?>

<table width="100%" border="0">
 <tr>
 <td colspan="3"> 
 <p align="center">
<?php
if ($page != 0) { // Don't show back link if current page is first page.
$back_page = $page - $limit;
?>
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $back_page?>&limit=<?php echo $limit?>">back</a>
<?php
}
for ($i=1; $i <= $pages; $i++) // loop through each page and give link to it.
{
 $ppage = $limit*($i - 1);
 if ($ppage == $page){
 echo("<b>$i</b>\n");} // If current page don't give link, just text.
 else{
 ?>
 <a href="index.php?ac=edit_inventory&type=<?php$type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $ppage?>&limit=<?php echo $limit?>"><?php echo $i?></a>
 <?php
 }
}
if (!((($page+$limit) / $limit) >= $pages) && $pages != 1) { // If last page don't give next link.
$next_page = $page + $limit;
?>
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter'])){echo "&letter=$letter";}?>&cat=<?php echo $cat?>&page=<?php echo $next_page?>&limit=<?php echo $limit?>">next</a>
<?php
}
?>
</p> 
 </td> 
 	</tr>  
 	<tr> 
  <td width="33%" align="left">
Items <b><?php echo $first?></b> - <b><?php echo $last?></b> of <b><?php echo $numrows?></b>
  </td> 
  <td width="50%" align="left">
Items per-page: 
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $page?>&limit=10">10</a> |
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $page?>&limit=20">20</a> |
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $page?>&limit=50">50</a> |
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $page?>&limit=100">100</a> |
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=0&limit=<?php echo $numrows?>">ALL</a>
  </td>
   <td width="17%" align="right">
Page <b><?php echo $current?></b> of <b><?php echo $total?></b>
  </td>  
 </tr>
</table>


<br />
<?php
$m=0;
while ($m < $num2) {

$item_id=mysql_result($result3,$m,"item_id");



$sql1 = "SELECT * FROM `inventory` WHERE id=$item_id"; 
$result2=mysql_query($sql1);
$num3=mysql_numrows($result2);
$j=0;
$id=mysql_result($result2,$j,"id");
$part_number=mysql_result($result2,$j,"part_number");
$year=mysql_result($result2,$j,"year");
$mfg=mysql_result($result2,$j,"mfg");
$model=mysql_result($result2,$j,"model");
$part_name=mysql_result($result2,$j,"part_name");
$price=mysql_result($result2,$j,"price");
$pic1=mysql_result($result2,$j,"pic1"); 
$type2=mysql_result($result2,$j,"type");
$date=mysql_result($result2,$j,"date");
$sold=mysql_result($result2,$j,"sold");
$include=mysql_result($result2,$j,"include");


$get_cat = "SELECT * FROM `type` WHERE type=$type2"; 
$list_cat=mysql_query($get_cat);
$lc=0;
$list_cat=mysql_result($list_cat,$lc,"category");
?>


<div id="content-box_wide">
<table width="95%" cellspacing="0" cellpadding="1" border="0">
<tr>
<td colspan="5">
Base Category <?php echo $list_cat ?>
</td>
</tr>
<tr>
	<td rowspan="3" align="left" ><?php
	
	if ($sold==Yes)  
	echo "SOLD<br />"; 
else
  echo "<br />"; 
?>  <img src="../pic/thumbnail/RTM Auction Machines <?php echo "$pic1"; ?>.jpg" width="100" height="75" alt="" border="0" /></td>
	<td align="left"><sup>YEAR:</sup></td>
	<td align="left"><sup><?php echo "$year"; ?> </sup> </td>
	<td align="left"><sup>RTM PART #:</sup></td>
	<td align="left"><sup><?php echo "$part_number"; ?> </sup></td>
</tr>
<tr>
	<td align="left"><sup>MFG:</sup></td>
	<td align="left"><sup><?php echo "$mfg"; ?> </sup></td>
	<td align="left"><sup>DATE LISTED:</sup></td>
	<td align="left"><sup><?php echo "$date"; ?> </sup></td>
</tr>
<tr>
	<td align="left"><sup>MODEL:</sup></td>
	<td align="left"><sup><?php echo "$model"; ?> </sup></td>
	<td align="left"><sup>PRICE:</sup></td>
	<td align="left"><sup>$<?php echo "$price"; ?> </sup></td>
</tr>

<tr>
	<td colspan="5"><a href="index.php?ac=edit_item&id=<?php echo $id?>">Edit Item</a>&nbsp;&nbsp;
	 <a href="../index.php?ac=item&id=<?php echo $id?>">View Item</a>&nbsp;&nbsp;
	<a href="index.php?ac=edit_item&id=<?php echo $id?>&del=1">Delete Item</a></td>
</tr>
</table>

</div>
<br />


 

<?php

++$m;
} 

?>


<div align="center">
<table width="100%" border="0">
 <tr>
 <td colspan="3"> 
 <p align="center">
<?php
if ($page != 0) { // Don't show back link if current page is first page.
$back_page = $page - $limit;
?>
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $back_page?>&limit=<?php echo $limit?>">back</a>
<?php
}
for ($i=1; $i <= $pages; $i++) // loop through each page and give link to it.
{
 $ppage = $limit*($i - 1);
 if ($ppage == $page){
 echo("<b>$i</b>\n");} // If current page don't give link, just text.
 else{
 ?>
 <a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $ppage?>&limit=<?php echo $limit?>"><?php echo $i?></a>
 <?php
 }
}
if (!((($page+$limit) / $limit) >= $pages) && $pages != 1) { // If last page don't give next link.
$next_page = $page + $limit;
?>
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $next_page?>&limit=<?php echo $limit?>">next</a>
<?php
}
?>
</p> 
 </td> 
 	</tr>  
 	<tr> 
  <td width="33%" align="left">
Items <b><?php echo $first?></b> - <b><?php echo $last?></b> of <b><?php echo $numrows?></b>
  </td> 
  <td width="50%" align="left">
Items per-page: 
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $page?>&limit=10">10</a> |
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $page?>&limit=20">20</a> |
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $page?>&limit=50">50</a> |
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=<?php echo $page?>&limit=100">100</a> |
<a href="index.php?ac=edit_inventory&type=<?php echo $type_id?><?php if (isset($_GET['letter']))echo "&letter=$letter"?>&cat=<?php echo $cat?>&page=0&limit=<?php echo $numrows?>">ALL</a>
  </td>
   <td width="17%" align="right">
Page <b><?php echo $current?></b> of <b><?php echo $total?></b>
  </td>  
 </tr>
</table>
</div>

</div>

<?php}?>







