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
$poNo = $_POST['txtpoNo'];

if (empty($poID) or empty($poDate)) {
	$message = "ยังไม่ได้ใส่เลขที่ PO หรือ วันที่";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php'>";
}else{

$date = explode("-",$poDate);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$npoDate = $year . "-" . $month . "-" . $day ;

$selPoIn = mysql_query("SELECT * FROM `po_in` WHERE `poID` = '".$poID."' ");
$PoInResult = mysql_fetch_array($selPoIn) or die (mysql_error());
$sumSite = $PoInResult['numSite'] + $_POST["hdnMaxLine"];

if ($sumSite <= $PoInResult['numSiteLimit']) {

$sql_add = "insert into po(poNo, poID, poDate, PartnersID, po, NoIn, NoInNum, TaxIn, TaxInNum, Matt, Service, poNote, project) 
			values ('$poNo', '$poID', '$npoDate', '$PartnersID', '$po', '$NoIn', '$NoInNum', '$TaxIn', '$TaxInNum', '$Matt', '$Service', '$poNote', '$project')";
mysql_query($sql_add) or die(mysql_error());

mysql_query("UPDATE `po_in` SET `numSite` = '".$sumSite."' WHERE `poID` = '".$poID."'") or die(mysql_error());

for($i=1;$i<=(int)$_POST["hdnMaxLine"];$i++)
{
	if($_POST["txtSiteCode_".$i] != "" )
		{   
			$check_log = mysql_query("SELECT * FROM persen WHERE persenID = '".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."'");
			$num = mysql_num_rows($check_log);
			$data = mysql_fetch_array($check_log);
			if ($num > 0 && empty($data['po']) && $data['Matt'] == '0000-00-00' && $data['Service'] == '0000-00-00') {
				mysql_query("UPDATE `persen` SET `po` = '".$poNo."', `Matt` = '".$npoDate."', `Service` = '".$npoDate."' WHERE persenID = '".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."'") or die(mysql_error());
			}
			if ($num > 0 && $data['Matt'] == '0000-00-00' && $data['Service'] != '0000-00-00') {
				mysql_query("UPDATE `persen` SET `po` = '".$poNo."', `Matt` = '".$npoDate."' WHERE persenID = '".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."'") or die(mysql_error());
			}
			if ($num > 0 && $data['Service'] == '0000-00-00' && $data['Matt'] != '0000-00-00') {
				mysql_query("UPDATE `persen` SET `po` = '".$poNo."', `Service` = '".$npoDate."' WHERE persenID = '".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."'") or die(mysql_error());
			}
			if ($num == 0 && empty($data['Matt']) && empty($data['Service'])) {
				$add_Persen = "insert into persen(persenID, po, Matt, Service) values ('".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."', '".$poNo."', '".$npoDate."', '".$npoDate."')";
				mysql_query($add_Persen) or die(mysql_error());
			}
			if ($num == 0 && $data['Matt'] == '' && $data['Service'] != '' ) {
				$add_Persen1 ="insert into persen(persenID, po, Matt) values ('".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."', '".$poNo."', '".$npoDate."')";
				mysql_query($add_Persen) or die(mysql_error());
			}
			if ($num == 0 && $data['Service'] == '' && $data['Matt'] != '') {
				$add_Persen ="insert into persen(persenID, po, Service) values ('".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."', '".$poNo."', '".$npoDate."')";
				mysql_query($add_Persen2) or die(mysql_error());
			}
			if ($num > 0 && $data["po"] != "" && $data['Matt'] != '0000-00-00' && $data['Service'] != '0000-00-00') {
				$message = "SiteCode : " . $_POST['txtSiteCode_'.$i]. " และ SiteTypeID  : " .$_POST['txtSiteType_'.$i] . "  ซ้ำ";
				echo "<script type='text/javascript'>alert('$message');</script>";
				mysql_query("DELETE  FROM `po` WHERE `poNo` = '".$poNo."'") or die(mysql_error());
			}
		}
}

$checkpo = mysql_query("SELECT * FROM po WHERE poNo = '".$poNo."'");
$numCheck = mysql_num_rows($checkpo);
if ($numCheck > 0) {
	$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php'>";
}else{
	mysql_query("UPDATE `persen` SET `po` = '', `Matt` = '', `Service` = '' WHERE `po` = '".$poNo."'") or die(mysql_error());
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php'>";
}
}else{
	$x = $sumSite - $PoInResult['numSiteLimit'];
	$message = "วางไซต์เกินมา " . $x ." ไซต์";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php'>";
}
}
?>

</head>


<body>
</body>
</html>
