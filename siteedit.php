<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
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
    <table width="599" border="0">
      <tr>
        <th>ชื่อไซต์
        <input name="txtSite" type="text" id="txtSite" value="" >
        ประเภทไซต์<select id="txtSiteTypeID" name="txtSiteTypeID" onChange="" >
		    <option  value="">- กรุณาเลือก -</option>
<?php
$query_list=mysql_query("Select * From sitetype order by SiteTypeID");
while($sl < mysql_num_rows($query_list)){
$arrL= mysql_fetch_array($query_list);
?>
              <option value="<?php echo $arrL['SiteTypeID'];?>"><?php echo $arrL['SiteTypeName'];?></option>
<?php
$sl++;
}
?>
          </select>
        <!--<input name="txtSiteTypeID" type="text" id="txtSiteTypeID" value="" >-->
        <input class="btn btn-primary" type="submit" value="ค้นหา"></th>
      </tr>
    </table>
  </div>
</form>
<div align="center">
<?php
	$strSQL = "SELECT * FROM `site` WHERE 1 ";
  	if($_POST['txtSite'] != ""){
		$strSQL .= "AND `SiteName` LIKE '%".$_POST['txtSite']."%'";
	}
	if($_POST['txtSiteTypeID'] != ""){
		$strSQL .= "AND `SiteTypeID` = '".$_POST['txtSiteTypeID']."'";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$records = mysql_num_rows($objQuery);
	if($records>0){
?>
<form name="form2" method="post" action="sitedel.php">
		<table border="1" bordercolor="#0000FF" style="border-collapse:collapse;" >
  			<tr>
    			<th><div align="center">รหัสไซต์</div></th>
    			<th> <div align="center">ชื่อไซต์</div></th>
    			<th> <div align="center">ชื่อประเภทไซต์</div></th>
    			<th> <div align="center">ชื่อพนักงาน</div></th>
    			<th><div align="center">ลบ</div></th>
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
    			<td><input name="chkDel[]" type="checkbox" value="<?php echo $objResult["SiteCode"] ?>"></td>
  			</tr>
<?php
}
?>
			<tr>
			     <td colspan="5"><div align="center"><input class="btn btn-primary" type="submit" name="Submit" value="บันทึก" id="SubmitForm"/></div></td>
		    </tr>
		</table>
</form>
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
