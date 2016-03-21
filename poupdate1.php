<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$poID = $_POST['txtpoID'];
$poDate = $_POST['dateInput'];
$PartnersID = $_POST['txtPartnersID'];
$po = $_POST['txtPo'];
$NoIn = $_POST['txtNoIn'];
$NoInNum = $_POST['txtNoInNum'];
$TaxIn = $_POST['txtTaxIn'];
$TaxInNum = $_POST['txtTaxInNum'];
$poNote = $_POST['txtpoNote'];
$MattDate = $_POST['dateInput2'];
$ServiceDate = $_POST['dateInput3'];
$Matt = $_POST['txtMatt'];
$Service = $_POST['txtService'];

$date = explode("-",$poDate);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$npoDate = $year . "-" . $month . "-" . $day ;

$date1 = explode("-",$MattDate);
$year1 = $date1['2'];
$month1 = $date1['1'];
$day1 = $date1['0'];
$nMattDate = $year1 . "-" . $month1 . "-" . $day1 ;

$date2 = explode("-",$ServiceDate);
$year2 = $date2['2'];
$month2 = $date2['1'];
$day2 = $date2['0'];
$nServiceDate = $year2 . "-" . $month2 . "-" . $day2 ;

mysql_query("UPDATE `po` SET `podate` = '".$npoDate."', `PartnersID` = '".$PartnersID."', `po` = '".$po."',
							 `NoIn` = '".$NoIn."', `NoInNum` = '".$NoInNum."', `TaxIn` = '".$TaxIn."', `TaxInNum` = '".$TaxInNum."', `poNote` = '".$poNote."' ,
							 `MattDate` = '".$nMattDate."', `Matt` = '".$Matt."', `ServiceDate` = '".$nServiceDate."', `Service` = '".$Service."'	
							  WHERE `poID` = '".$poID."';") or die(mysql_error());

$message = "แก้ไขข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=pocheck.php'>";

?>

</head>


<body>
</body>
</html>
