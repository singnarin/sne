<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$TransferID = $_POST['txtTransferID'];
$DrawID = $_POST['txtDrawID'];
$TransferDate = $_POST['dateInput3'];
$Pay = $_POST['txtPay'];
$Transfer = $_POST['txtTransfer'];
$Fee = $_POST['txtFee'];
$TransferNote = $_POST['txtNote'];

$date = explode("-",$TransferDate);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$nTransferDate = $year . "-" . $month . "-" . $day ;

mysql_query("UPDATE `transfer` SET 
	`TransferDate` = '".$nTransferDate."',
	`DrawID` = '".$DrawID."',
	`Pay` = '".$Pay."',
	`Transfer` = '".$Transfer."', 
	`Fee` = '".$Fee."', 
	`TransferNote` = '".$TransferNote."'
	WHERE `TransferID` = '".$TransferID."';") or die(mysql_error());

	$message = "แก้ไขข้อมูลข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.close();</script>";
?>

</head>


<body>
</body>
</html>
