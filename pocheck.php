<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php 
include("cssmenu/head.php"); 
?>
</head>
<body>
<?php include("cssmenu/menu.php"); ?>
<table width="100%" border="0" bordercolor="#0000FF" style="border-collapse:collapse;">
<form id="form1" name="form1" method="post" action="pocheck1.php">
  <tr>
  	<td></td>
  </tr>
  <tr>
  	<td></td>
  </tr>
  <tr>
    <td><div align="center">เพิ่มใบวางบิล</div></td>
  </tr>
  <tr>
    	<td><div align="center">เลขที่วางบิล <input type="text" name="txtpoID" value="" /></div></td>
  </tr>
  <tr>
		<td colspan="2"><div align="center"><input type="submit" name="Submit" value="ตกลง" /></div></td>
  </tr
</form>
</div>
</table>
</body>
</html>
