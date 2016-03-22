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

for($i=1;$i<=(int)$_POST["hdnMaxLine"];$i++)
{
	if($_POST["txtSiteCode_".$i] != "" )
		{   
			$check_log = mysql_query("SELECT * FROM site_draw WHERE site_drawID = '".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."'");
			$num = mysql_num_rows($check_log);
			$data = mysql_fetch_array($check_log);

			if ($num > 0 && empty($data["poID"])) {
				mysql_query("UPDATE `site_draw` SET `poID` = '".$poID."' WHERE `site_drawID` = '".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."'") or die(mysql_error());
			}
			if ($num == 0 && $data["DrawID"] == "") {
				$sql_add2 = "insert into site_draw(site_drawID, poID, SiteCode, SiteTypeID, empID) values ('".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."', '".$poID."', '".$_POST['txtSiteCode_'.$i]."', '".$_POST['txtSiteType_'.$i]."', '".$_POST['txtempID_'.$i]."')";
				mysql_query($sql_add2) or die(mysql_error());
			}
			if ($num > 0 && $data["poID"] != "") {
				$message = "SiteCode : " . $_POST['txtSiteCode_'.$i]. " และ SiteTypeID  : " .$_POST['txtSiteType_'.$i] . "  ซ้ำ";
				echo "<script type='text/javascript'>alert('$message');</script>";
				mysql_query("DELETE  FROM `po` WHERE `poID` = '".$poID."'") or die(mysql_error());
			}
		}
}

$checkpo = mysql_query("SELECT * FROM po WHERE poID = '".$poID."'");
$numCheck = mysql_num_rows($checkpo);
if ($numCheck > 0) {
	$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php'>";
}else{
	mysql_query("DELETE  FROM `site_draw` WHERE `poID` = '".$poID."'") or die(mysql_error());
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php'>";
}
?>

</head>


<body>
</body>
</html>
