<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$InvoiceID = $_POST['txtInvoiceID'];
$dateInput = $_POST['dateInput'];
$Invoice = $_POST['txtInvoice'];
$Bill = $_POST['txtBill'];
$OderID = $_POST['txtOderID'];
$Note = $_POST['txtNote'];
$PartnersID = $_POST['txtPartnersID'];

$date = explode("-",$dateInput);
$year = $date['0'];
$month = $date['1'];
$day = $date['2'];
$newdate = $year . "-" . $month . "-" . $day ;

//$sql_add = "insert into invoice(InvoiceID, InvoiceDate, PartnersID, Invoice, Bill, Note, OderID) values ('$InvoiceID', '$newdate', '$PartnersID', '$Invoice', '$Bill', '$Note', '$OderID')";
mysql_query("UPDATE `invoice` SET `InvoiceDate` = '".$newdate."', `PartnersID` = '".$PartnersID."', `Invoice` = '".$Invoice."', `Bill` = '".$Bill."', `Note` = '".$Note."' WHERE `invoice`.`InvoiceID` = '".$InvoiceID."';") or die(mysql_error());

	$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.close();</script>";
?>

</head>


<body>
</body>
</html>
