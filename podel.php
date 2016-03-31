<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("include/connect.php");

	mysql_query("UPDATE `persen` SET po = '', `Matt` = '', `Service` = ''  WHERE po = '".$_GET["poNo"]."'") or die(mysql_error());
	mysql_query("DELETE FROM `po` WHERE poNo = '".$_GET["poNo"]."'") or die(mysql_error());

	$sel_poIn = mysql_query("SELECT * FROM `po_in` WHERE `poID` = '".$_GET["poID"]."'");
	$poInResult = mysql_fetch_array($sel_poIn) or die (mysql_error());
	$numSite =  $_GET['numSite'] - $sel_poIn['numSite'];
	 if ($_GET['numSite'] >= $numSite) {
		mysql_query("UPDATE `po_in` SET `numSite` = '".$numSite."'  WHERE poID = '".$_GET["poID"]."'") or die(mysql_error());
	}else{
		mysql_query("UPDATE `po_in` SET `numSite` = '0'  WHERE poID = '".$_GET["poID"]."'") or die(mysql_error());
	}

	$message = "ลบสำเร็จ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.close();</script>";
mysql_close($Conn);
?>