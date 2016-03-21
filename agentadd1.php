<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$AgentID = $_POST['AgentID'];
$AgentName = $_POST['AgentName'];
$AgentAddress = $_POST['AgentAddress'];
$AgentTel = $_POST['AgentTel'];
$EmpID = $_POST['txtEmpID'];

$sql_add = "insert into agent(AgentID, AgentName, AgentAddress, AgentTel, EmID) values ('$AgentID', '$AgentName', '$AgentAddress', '$AgentTel', '$EmpID')";
mysql_query($sql_add) or die(mysql_error());

$message = "เพิ่มข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=agentadd.php'>";

?>

</head>


<body>
</body>
</html>
