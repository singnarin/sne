<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script language="javascript">
	function selData(PartnersID,PartnersName)
	{
		var sPartnersID = self.opener.document.getElementById("txtPartnersID");
		sPartnersID.value = PartnersID;
		var sPartnersName = self.opener.document.getElementById("txtPartnersName");
		sPartnersName.value = PartnersName;
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
	$strSQL = "SELECT * FROM `partners`";
	}else{
	$strSQL = "SELECT * FROM `partners` WHERE `PartnersName` LIKE '%{$_POST['txtKeyword']}%'";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$records = mysql_num_rows($objQuery);
	if($records>0){
?>

<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">เลขที่</div></th>
    <th width="98"> <div align="center">ชื่อบริษัท</div></th>
  </tr>

<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><a href="#" OnClick="selData('<?php echo $objResult["PartnersID"];?>',
														 '<?php echo $objResult["PartnersName"];?>');">
	<?php echo $objResult["PartnersID"];?>
	</a></div></td>
    <td><?php echo $objResult["PartnersName"]; ?></td>
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