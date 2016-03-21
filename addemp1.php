<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$EmpID = $_POST['EmpID'];
$EmpName = $_POST['EmpName'];
$EmpAddress = $_POST['EmpAddress'];
$EmpTel = $_POST['EmpTel'];

$sql_add = "insert into employee(EmID, EmName, EmAddress, EmTel) values ('$EmpID', '$EmpName', '$EmpAddress', '$EmpTel')";
mysql_query($sql_add) or die(mysql_error());

$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=addemp.php'>";
mysql_close($Conn);
?>

</head>


<body>

</body>
</html>
