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
$SiteCode = $_POST['txtSiteCode'];
$SiteType = $_POST['txtSiteType'];
$empID = $_POST['txtempID'];


$date = explode("-",$dateInput);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$newdate = $year . "-" . $month . "-" . $day ;

$sql_add = "insert into invoice(InvoiceID, InvoiceDate, PartnersID, Invoice, Bill, Note, OderID, SiteCode, SiteTypeID, empID) values ('$InvoiceID', '$newdate', '$PartnersID', '$Invoice', '$Bill', '$Note', '$OderID', '$SiteCode', '$SiteType', '$empID')";
mysql_query($sql_add) or die(mysql_error());

	$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=invoiceadd.php'>";

?>

</head>


<body>
</body>
</html>
