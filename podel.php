<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("include/connect.php");

	mysql_query("UPDATE `persen` SET po = '', `Matt` = '', `Service` = ''  WHERE po = '".$_GET["poID"]."'") or die(mysql_error());
	mysql_query("DELETE FROM `po` WHERE poID = '".$_GET["poID"]."'") or die(mysql_error());
	

	$message = "ลบสำเร็จ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.close();</script>";
mysql_close($Conn);
?>