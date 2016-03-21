<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script language="javascript">
	function selData(SiteTypeID,SiteTypeName)
	{
		var sSiteTypeID = self.opener.document.getElementById("txtSiteTypeID");
		sSiteTypeID.value = SiteTypeID;
		var sSiteTypeName = self.opener.document.getElementById("txtSiteTypeName");
		sSiteTypeName.value = SiteTypeName;
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
	$strSQL = "SELECT * FROM `sitetype`";
	}else{
	$strSQL = "SELECT * FROM `sitetype` WHERE `SiteTypeName` LIKE '%{$_POST['txtKeyword']}%'";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$records = mysql_num_rows($objQuery);
	if($records>0){
?>

<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">เลขที่ประเภทไซต์</div></th>
    <th width="98"> <div align="center">ชื่อประเภทไซต์</div></th>
  </tr>

<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><a href="#" OnClick="selData('<?php echo $objResult["SiteTypeID"];?>',
														 '<?php echo $objResult["SiteTypeName"];?>');">
	<?php echo $objResult["SiteTypeID"];?>
	</a></div></td>
    <td><?php echo $objResult["SiteTypeName"]; ?></td>
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