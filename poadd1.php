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
$Matt = $_POST['txtMatt'];
$Service = $_POST['txtService'];
$project = $_POST['txtproject'];

$date = explode("-",$poDate);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$npoDate = $year . "-" . $month . "-" . $day ;


$sql_add = "insert into po(poID, poDate, PartnersID, po, NoIn, NoInNum, TaxIn, TaxInNum, Matt, Service, poNote, project) 
			values ('$poID', '$npoDate', '$PartnersID', '$po', '$NoIn', '$NoInNum', '$TaxIn', '$TaxInNum', '$Matt', '$Service', '$poNote', '$project')";
mysql_query($sql_add) or die(mysql_error());
/*
for($i=1;$i<=(int)$_POST["hdnMaxLine"];$i++)
{
	if($_POST["txtDrawID_".$i] != "" )
		{
			mysql_query("UPDATE `drawmoney` SET `postatus` = '1', `poID` = '".$poID."' WHERE `DrawID` = '".$_POST["txtDrawID_".$i]."';") or die(mysql_error());
		}
}
*/
$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php'>";

?>

</head>


<body>
</body>
</html>
