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
<div align="center">
<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  			<tr>
        		<td colspan="5"><div align="center">ข้อมูลบริษัทคู่ค้า</div></td>
        	</tr>
      		<tr>
        		<td colspan="5"><div align="center">
				<?php
					$strSQL = "SELECT * FROM  partners ";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
				?>
		<table border="1" bordercolor="#0000FF" style="border-collapse:collapse;" >
  			<tr>
    			<th><div align="center">เลขประจำตัวผู้เสียภาษี</div></th>
    			<th> <div align="center">ชื่อบริษัท</div></th>
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  			<tr>
    			<td><div align="center"><a href="partnersupdate.php?txtpartnersid=<?php echo $objResult["PartnersID"] ; ?>" target = "_blank">
					<?php echo $objResult["PartnersID"];?></a></div></td>
    			<td><?php echo $objResult["PartnersName"] ; ?></td>
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
