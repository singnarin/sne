<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$date = explode("-",$_POST['dateInput']);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$npoDate = $year . "-" . $month . "-" . $day ;

mysql_query("insert into po_in(poInNo, poID, poDateIn, priceSite, numSiteLimit, priceOrder, poInNote, SiteTypeID) values ('".$_POST['txtpoInNo']."', '".$_POST['txtpoID']."', '".$npoDate."' ,'".$_POST['txtpriceSite']."', '".$_POST['txtnumSiteLimit']."', '".$_POST['txtpriceOrder']."', '".$_POST['txtpoInNote']."', '".$_POST['txtSiteTypeID']."')") or die(mysql_error());

	$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php'>";
?>

</head>


<body>
</body>
</html>
