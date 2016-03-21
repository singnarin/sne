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

$poSelect = mysql_query("SELECT * FROM  po Where poID = '".$poID."'") or die (mysql_error());
$num = mysql_num_rows($poSelect);
$poResult = mysql_fetch_array($poSelect);

if($num>0){
	echo "<meta http-equiv='refresh' content='0;URL=poupdate2.php?poID=".$poID."'>";

}else{
	echo "<meta http-equiv='refresh' content='0;URL=poadd.php?poID=".$poID."'>";
}
?>
</head>
<body>
</body>
</html>