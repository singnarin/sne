<?php
include("include/connect.php");
header("Content-Type: application/vnd.ms-excel");
$date = date("Y-m-d");
header('Content-Disposition: attachment; filename="'.$date.'"');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php 
include("cssmenu/head.php"); 
?>
</head>
<body>
<div align="center">
<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  			<tr>
        		<td colspan="5"><div align="center">แบบรายงานผู้เบิก3%</div></td>
        </tr>
      	<tr>
        	 <td colspan="5"><div align="center">
<?php
					$strSQL = "SELECT * FROM  agent ";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
		<table border="1" bordercolor="#0000FF" style="border-collapse:collapse;" >
  			<tr>
    			<th> <div align="center">เลขประจำตัวประชาชน</div></th>
    			<th> <div align="center">ชื่อ - สกุล</div></th>
    			<th> <div align="center">ที่อยู่</div></th>
    			<th> <div align="center">โทร</div></th>
          <th> <div align="center">เป็นตัวแทนของ</div></th>
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  			<tr>
    			<td><div align="center"><?php echo $objResult["AgentID"];?></div></td>
    			<td><?php echo $objResult["AgentName"] ; ?></td>
    			<td><?php echo $objResult["AgentAddress"] ; ?></td>
    			<td><?php echo $objResult["AgentTel"] ; ?></td>
<?php
  $objQuery1 = mysql_query("SELECT * FROM  employee Where EmID = '".$objResult["EmID"]."'") or die ("Error Query [".$strSQL."]");
  $objResult1 = mysql_fetch_array($objQuery1);
?>
          <td><?php echo $objResult1["EmName"] ; ?></td>
  			</tr>
<?php
}
?>
		</table>
				</td>
       		</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<?php
mysql_close($Conn); 
?>
</body>

</html>
