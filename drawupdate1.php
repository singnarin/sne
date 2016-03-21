<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$DrawID = $_POST['txtDrawID'];
$DrawDate = $_POST['dateInput'];
$SentAt = $_POST['txtSentAt'];
$SiteCode = $_POST['txtSiteCode'];
$Draw =$_POST['txtDraw'];
$DrawTax = $_POST['txtTax'];
$DrawNote = $_POST['txtNote'];
$ExpensesID = $_POST['txtExpensesID'];

$date = explode("-",$DrawDate);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$nDrawDate = $year . "-" . $month . "-" . $day ;

$nDrawTax = $Draw * $DrawTax / 100 ;

mysql_query("UPDATE `drawmoney` SET 
	`DrawDate` = '".$nDrawDate."',
	`SentAt` = '".$SentAt."',
	`SiteCode` = '".$SiteCode."',
	`ExpensesID` = '".$ExpensesID."', 
	`Draw` = '".$Draw."', 
	`DrawTax` = '".$nDrawTax."', 
	`DrawNote` = '".$DrawNote."' 
	WHERE `DrawID` = '".$DrawID."';") or die(mysql_error());

	$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.close();</script>";
?>

</head>


<body>
</body>
</html>
