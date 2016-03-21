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
        		<td colspan="5"><div align="center">ข้อมูลประเภทไซต์</div></td>
        	</tr>
      		<tr>
        		<td colspan="5"><div align="center">
				<?php
					$objQuery = mysql_query("SELECT * FROM  sitetype ") or die ("Error Query [".$strSQL."]");
				?>
		<table border="1" bordercolor="#0000FF" style="border-collapse:collapse;" >
  			<tr>
    			<th><div align="center">รหัสไซต์</div></th>
    			<th> <div align="center">ชื่อไซต์</div></th>
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  			<tr>
    			<td><div align="center"><a href="sitetypeupdate.php?txtsitetypeid=<?php echo $objResult["SiteTypeID"] ; ?>" target = "_blank">
					<?php echo $objResult["SiteTypeID"];?></a></div></td>
    			<td><?php echo $objResult["SiteTypeName"] ; ?></td>
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
