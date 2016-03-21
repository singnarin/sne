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
        		<td colspan="5"><div align="center">ข้อมูลไซต์</div></td>
        	</tr>
      		<tr>
        		<td colspan="5"><div align="center">
				
				<form name="frmSearch" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
  <div align="center">
    <table width="599" border="1">
      <tr>
        <th>ชื่อไซต์
        <input name="txtKeyword" type="text" id="txtKeyword" value="" >
        <input type="submit" value="ค้นหา"></th>
      </tr>
    </table>
  </div>
</form>
<div align="center">
<?php
  if(empty($_POST['txtKeyword'])){
	$strSQL = "SELECT * FROM `site`";
	}else{
	$strSQL = "SELECT * FROM `site` WHERE `SiteName` LIKE '%{$_POST['txtKeyword']}%'";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$records = mysql_num_rows($objQuery);
	if($records>0){
?>

		<table border="1" bordercolor="#0000FF" style="border-collapse:collapse;" >
  			<tr>
    			<th><div align="center">รหัสไซต์</div></th>
    			<th> <div align="center">ชื่อไซต์</div></th>
    			<th> <div align="center">ชื่อประเภทไซต์</div></th>
    			<th> <div align="center">ชื่อพนักงาน</div></th>
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  			<tr>
    			<td><div align="center"><a href="siteupdate.php?txtsitecode=<?php echo $objResult["SiteCode"] ; ?>" target = "_blank">
					<?php echo $objResult["SiteCode"];?></a></div></td>
    			<td><?php echo $objResult["SiteName"] ; ?></td>
    			<?php
    				$sel_setetype = mysql_query("SELECT * FROM `sitetype`   Where SiteTypeID = '".$objResult["SiteTypeID"]."'") or die ("Error Query ())");
    				$setetypeResult = mysql_fetch_array($sel_setetype);
    			?>
    			<td><?php echo $setetypeResult["SiteTypeName"] ; ?></td>
    			<?php
    				$sel_emp = mysql_query("SELECT * FROM `employee`   Where EmID = '".$objResult["EmID"]."'") or die ("Error Query ())");
    				$empResult = mysql_fetch_array($sel_emp);
    			?>
    			<td><?php echo $empResult["EmName"] ; ?></td>
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
}else{
			echo "ไม่พบข้อมูล";
		}
mysql_close($Conn); 
?>
</body>

</html>
