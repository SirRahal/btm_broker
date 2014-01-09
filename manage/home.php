<SCRIPT type="text/javascript">
function Validate(theForm)
{
if (theForm.rtm_pn.value == "")
{
alert("Please enter a value for the \"BTM Part Number\" field.");
theForm.rtm_pn.focus();
return (false);
}
return (true);
}
</SCRIPT>
<br /><br />
<div align="center"><a href="index.php?ac=template">Templates</a></div><br />
<div align="center"><a href="index.php?ac=upload_pic1">Upload BTM Pic</a></div><br />
<div align="center"><a href="index.php?ac=upload_pic2">Upload NON BTM Pic</a></div><br />
<div align="center"><a href="../pic/normal/viewer.php">Pic File Viewer</a></div><br />
<div align="center"><a href="index.php?ac=view_quote">View Quote Request</a></div><br />
<div align="center"><a href="index.php?ac=view_offers">View Offers Made</a></div><br />
<div align="center"><a href="http://www.btmbroker.com/search/admin/admin.php">Re-Index Site</a></div>
<br />
<form action="index.php?ac=edit_item"  method="POST" onsubmit="return Validate(this)">
<div align="center"><sup>FIND BY BTM PART NUMBER:</sup><br />  <input type="text" name="rtm_pn" size="15" maxlength="10"><br /><br />
<input type="submit" name="action" id="action" value="FIND" /></div>
</form>

