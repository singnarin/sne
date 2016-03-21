<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script language="javascript">
	function selData(ExpensesID, ExpensesName)
	{
		var sExpensesID = self.opener.document.getElementById("txtExpensesID");
		sExpensesID.value = ExpensesID;
		var sExpensesName = self.opener.document.getElementById("txtExpensesName");
		sExpensesName.value = ExpensesName;
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
	$strSQL = "SELECT * FROM `expenses`";
	}else{
	$strSQL = "SELECT * FROM `expenses` WHERE `ExpensesName` LIKE '%{$_POST['txtKeyword']}%'";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$records = mysql_num_rows($objQuery);
	if($records>0){
?>

<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">รหัสรายจ่าย</div></th>
	<th width="98"> <div align="center">ชื่อรายจ่าย</div></th>
  </tr>

<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
<?php 
$objQuery1 = mysql_query("select * from expenses where ExpensesID = '".$objResult["ExpensesID"]."'") or die ("Error Query");
$objResult1 = mysql_fetch_array($objQuery1);
?>
    <td><div align="center"><a href="#" OnClick="selData('<?php echo $objResult["ExpensesID"];?>',
														 '<?php echo $objResult1["ExpensesName"];?>')
														 ;">
	<?php echo $objResult["ExpensesID"];?>
	</a></div></td>
    <td><?php echo $objResult["ExpensesName"]; ?></td>
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