<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("include/connect.php");
	mysql_query("DELETE FROM `invoice` WHERE InvoiceID = '".$_GET["InvoiceID"]."'") or die(mysql_error());
$message = "ทำรายการชำระเงินสำเร็จ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.close();</script>";
mysql_close($Conn);
?>