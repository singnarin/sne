<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script language="javascript">
	function selData(Line,SiteCode,SiteName,SiteType,EmID)
	{
		var sSiteCode = self.opener.document.getElementById("txtSiteCode_"+Line);
		sSiteCode.value = SiteCode;
		var sSiteName = self.opener.document.getElementById("txtSiteName_"+Line);
		sSiteName.value = SiteName;
		var sSiteType = self.opener.document.getElementById("txtSiteType_"+Line);
		sSiteType.value = SiteType;
		var sEmpID = self.opener.document.getElementById("txtempID_"+Line);
		sEmpID.value = EmID;
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
  </tr>

<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><a href="#" OnClick="selData('<?php echo $_GET["Line"];?>',
    													 '<?php echo $objResult["SiteCode"];?>',
    													 '<?php echo $objResult["SiteName"];?>',
    													 '<?php echo $objResult["SiteTypeID"];?>',
														 '<?php echo $objResult["EmID"];?>')
														 ;">
	<?php echo $objResult["SiteCode"];?>
	</a></div></td>
    <td><?php echo $objResult["SiteName"]; ?></td>
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
</html>