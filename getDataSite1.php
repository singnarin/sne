<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script language="javascript">
	function selData(SiteCode, SiteName, EmID, EmName)
	{
		var sSiteCode = self.opener.document.getElementById("txtSiteCode");
		sSiteCode.value = SiteCode;
		var sSiteName = self.opener.document.getElementById("txtSiteName");
		sSiteName.value = SiteName;
		var sEmID = self.opener.document.getElementById("txtEmpID");
		sEmID.value = EmID;
		var sEmName = self.opener.document.getElementById("txtEmpName");
		sEmName.value = EmName;
		window.close();
	}
	
	
</script>
<body>
<form name="frmSearch" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
  <div align="center">
    <table width="599" border="1">
      <tr>
        <th>Keyword
        <input name="txtKeyword" type="text" id="txtKeyword" value="" >
        <input type="submit" value="Search"></th>
      </tr>
    </table>
  </div>
</form>
<div align="center">
<?php
  include("include/connect.php");
  if(empty($_POST['txtKeyword'])){
	$strSQL = "SELECT * FROM `site`";
	}else{
	$strSQL = "SELECT * FROM `site` WHERE `SiteName` LIKE '%{$_POST['txtKeyword']}%'";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$records = mysql_num_rows($objQuery);
	if($records>0){
?>

<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">SiteCode</div></th>
    <th width="98"> <div align="center">SiteName</div></th>
	<th width="98"> <div align="center">พนักงาน</div></th>
  </tr>

<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
<?php 
$objQuery1 = mysql_query("select * from employee where EmID = '".$objResult["EmID"]."'") or die ("Error Query");
$objResult1 = mysql_fetch_array($objQuery1);
?>
    <td><div align="center"><a href="#" OnClick="selData('<?php echo $objResult["SiteCode"];?>',
														 '<?php echo $objResult["SiteName"];?>',
														 '<?php echo $objResult["EmID"];?>',
														 '<?php echo $objResult1["EmName"];?>')
														 ;">
	<?php echo $objResult["SiteCode"];?>
	</a></div></td>
    <td><?php echo $objResult["SiteName"]; ?></td>
	<td><?php echo $objResult1["EmName"]; ?></td>
  </tr>
<?php
}
?>
</table>
<?php
		}else{
			echo "ไม่พบข้อมูล";
		}
mysql_close($Conn);
?>
</div>
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
