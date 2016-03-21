<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$OderID = $_POST['txtOderID'];
$dateInput = $_POST['dateInput'];
$SiteTypeID = $_POST['txtSiteTypeID'];
$Note = $_POST['txtNote'];
$PartnersID = $_POST['txtPartnersID'];
$EmpID = $_POST['txtEmpID'];

$date = explode("-",$dateInput);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$newdate = $year . "-" . $month . "-" . $day ;

$sql_add = "insert into oder(OderID, OderDate, PartnersID, SiteTypeID, OderNote, EmpID) values ('$OderID', '$newdate', '$PartnersID', '$SiteTypeID', '$Note', '$EmpID')";
mysql_query($sql_add) or die(mysql_error());

$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=orderadd.php'>";

?>

</head>


<body>
</body>
</html>
