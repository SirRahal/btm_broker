<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Max's File Browser</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<div id="header"><div id="header_left"></div>
	<div id="header_main">Max's File Browser</div><div id="header_right"></div></div>
    <div id="content">
<?php
    require_once("maxFileBrowser.class.php");
    $fileBrowser = new maxFileBrowser();
    $fileBrowser->displayDir(getcwd());
?>
    </div>
    <div id="footer"><a href="http://www.phpf1.com" target="_blank">Powered by PHP F1</a></div>
</div>
</body>
</html>