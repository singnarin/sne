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

$sel_draw = mysql_query("select * from drawmoney WHERE DrawID = '".$DrawID."'") or die(mysql_error());
$drawResult = mysql_fetch_array($sel_draw);

$date = explode("-",$TransferDate);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$nTransferDate = $year . "-" . $month . "-" . $day ;


$sql_add = "insert into transfer(TransferID, DrawID, TransferDate, Pay, Transfer, Fee,  TransferNote, PartnersID, SiteTypeID, empID) 
						values ('$TransferID', '$DrawID', '$nTransferDate', '$Pay', '$Transfer', '$Fee', '$TransferNote', '$PartnersID', '".$drawResult["SiteTypeID"]."', '".$drawResult["empID"]."')";
mysql_query($sql_add) or die(mysql_error());
$sql_update = "UPDATE `drawmoney` SET `transtatus` = '1' WHERE `drawmoney`.`DrawID` = '".$DrawID."';";
mysql_query($sql_update) or die(mysql_error());

$message = "บันทึกข้อมูลของคุณเรียบร้อย";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=transferadd.php'>";

?>

</head>


<body>
</body>
</html>
