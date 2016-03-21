<?php
include("include/connect.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Real Time Data Managment</title>
</head>
<body>
<?php

if ($_FILES["fileCSV"]["error"]>0){
	$message = "ยังไม่ได้เลือกไฟล์ หรือเกิดข้อพิดพลาด โปรดตรวจสอบ";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{

move_uploaded_file($_FILES["fileCSV"]["tmp_name"],'D:\xampp\htdocs\sne\Upload\\'.$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

$objCSV = fopen('Upload\\'.$_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
	echo $objArr[0];

	$strSQL = "INSERT INTO site ";
	$strSQL .="(`SiteCode`,`SiteName`,`SiteTypeID`,`EmID`) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."','".$objArr[3]."') ";
	$objQuery = mysql_query($strSQL);
}
fclose($objCSV);

		$message = "นำเข้าข้อมูลสำเร็จ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=siteadd.php'>";

	}
mysql_close($Conn); 
?>
</table>
</body>
</html>