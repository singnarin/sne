<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$DrawID = $_POST['txtDrawID'];
$DrawDate = $_POST['dateInput'];
$SentAt = $_POST['txtSentAt'];
$Draw =$_POST['txtDraw'];
$DrawTax = $_POST['txtTax'];
$DrawNote = $_POST['txtNote'];
$ExpensesID = $_POST['txtExpensesID'];

$date = explode("-",$DrawDate);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$nDrawDate = $year . "-" . $month . "-" . $day ;

$nDrawTax = $Draw * $DrawTax / 100 ;


for($i=1;$i<=(int)$_POST["hdnMaxLine"];$i++)
{
	if($_POST["txtSiteCode_".$i] != "" )
		{   
			$check_log = mysql_query("SELECT * FROM site_draw WHERE site_drawID = '".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."'");
			$num = mysql_num_rows($check_log);
			$data = mysql_fetch_array($check_log);
			if ($num > 0 && empty($data["DrawID"])) {
				echo "update";
			}
			if ($num > 0 && $data["DrawID"] != "") {
				$message = "SiteCode" . $_POST['txtSiteCode_'.$i]. "SiteTypeID" .$_POST['txtSiteType_'.$i] . "ซ้ำ";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			if ($num == 0 && $data["DrawID"] == "") {
				$sql_add2 = "insert into site_draw(site_drawID, DrawID, SiteCode, SiteTypeID, empID) values ('".$_POST['txtSiteCode_'.$i].$_POST['txtSiteType_'.$i]."', '".$DrawID."', '".$_POST['txtSiteCode_'.$i]."', '".$_POST['txtSiteType_'.$i]."', '".$_POST['txtempID_'.$i]."')";
				mysql_query($sql_add2) or die(mysql_error());
			}
		}
}

$sql_add = "insert into drawmoney(DrawID, DrawDate, SentAt, ExpensesID, Draw, DrawTax, DrawNote) 
			values ('".$DrawID."', '".$nDrawDate."', '".$SentAt."', '".$ExpensesID."', '".$Draw."', '".$nDrawTax."', '".$DrawNote."')";
mysql_query($sql_add) or die(mysql_error());
	$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=drawadd.php'>";

?>

</head>


<body>
</body>
</html>
