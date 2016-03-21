<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php
$PartnersID = $_POST['PartnersID'];
$PartnersName = $_POST['PartnersName'];

mysql_query("UPDATE `Partners` SET `PartnersName` = '".$PartnersName."' WHERE `PartnersID` = '".$PartnersID ."'") or die(mysql_error());

$message = "แก้ไขข้อมูลสำเร็จแล้ว";
	echo "<script type='text/javascript'>alert('$message');</script>";
mysql_close($Conn);
	echo "<script type='text/javascript'>window.close();</script>";
?>

</head>


<body>
</body>
</html>
