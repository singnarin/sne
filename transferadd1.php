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
$PartnersID = $_POST['txtPartnersID'];
$Draw = $_POST['txtDraw'];
$ExpensesID = $_POST['txtExpensesID'];

$date = explode("-",$TransferDate);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$nTransferDate = $year . "-" . $month . "-" . $day ;

if (empty($TransferDate)) {
	$message = "ไม่ได้ใส่วันที่โอน";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=transferadd.php'>";
	}else{	

mysql_query("insert into transfer(TransferID, DrawID, TransferDate, Pay, Transfer, Fee,  TransferNote, PartnersID, Draw, ExpensesID) 
						values ('$TransferID', '$DrawID', '$nTransferDate', '$Pay', '$Transfer', '$Fee', '$TransferNote', '$PartnersID', '$Draw', '$ExpensesID')") or die(mysql_error());

mysql_query("UPDATE `drawmoney` SET `transtatus` = '1' WHERE `DrawID` = '".$DrawID."'") or die(mysql_error());

if ($DrawID != ''){
mysql_query("UPDATE `site_draw` SET `TransferID` = '$TransferID' WHERE `DrawID` = '".$DrawID."'") or die(mysql_error());
}

$message = "บันทึกข้อมูลของคุณเรียบร้อย";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=transferadd.php'>";
}
?>

</head>


<body>
</body>
</html>
