<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("include/connect.php");
	mysql_query("DELETE FROM `drawmoney` WHERE DrawID = '".$_GET["DrawID"]."'") or die(mysql_error());
	mysql_query("DELETE FROM `transfer` WHERE DrawID = '".$_GET["DrawID"]."'") or die(mysql_error());
	mysql_query("DELETE FROM `site_draw` WHERE DrawID = '".$_GET["DrawID"]."'") or die(mysql_error());
$message = "ลบสำเร็จ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.close();</script>";
mysql_close($Conn);
?>