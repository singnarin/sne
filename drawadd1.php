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

$sql_add = "insert into drawmoney(DrawID, DrawDate, SentAt, ExpensesID, Draw, DrawTax, DrawNote) 
						values ('".$DrawID."', '".$nDrawDate."', '".$SentAt."', '".$ExpensesID."', '".$Draw."', '".$nDrawTax."', '".$DrawNote."')";
mysql_query($sql_add) or die(mysql_error());

for($i=1;$i<=(int)$_POST["hdnMaxLine"];$i++)
{
	if($_POST["txtSiteCode_".$i] != "" )
		{   
			$sql_add2 = "insert into site_draw(DrawID, SiteCode, SiteTypeID, empID) values ('".$DrawID."', '".$_POST['txtSiteCode_'.$i]."', '".$_POST['txtSiteType_'.$i]."', '".$_POST['txtempID_'.$i]."')";
			mysql_query($sql_add2) or die(mysql_error());
		}
}


$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=drawadd.php'>";

?>

</head>


<body>
</body>
</html>
