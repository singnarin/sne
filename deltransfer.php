<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("include/connect.php");
	mysql_query("DELETE  FROM `transfer` WHERE TransferID = '".$_GET["TransferID"]."'") or die(mysql_error());

	$sel_transfer = mysql_query("SELECT * FROM `transfer` WHERE TransferID = '".$_GET["TransferID"]."'") or die(mysql_error());
	$transResult = mysql_fetch_array($sel_transfer);

	mysql_query("UPDATE `drawmoney` SET `transtatus` = '0' WHERE `drawmoney`.`DrawID` = '".$transResult["DrawID"]."'") or die(mysql_error());
	echo $transResult["DrawID"];
	$message = "ลบสำเร็จ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.close();</script>";
mysql_close($Conn);
?>