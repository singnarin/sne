<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script language="javascript">
	function selData(DrawID, Draw, ExpensesID, ExpensesName)
	{
		var sDrawID = self.opener.document.getElementById("txtDrawID");
		sDrawID.value = DrawID;
		var sDraw = self.opener.document.getElementById("txtDraw");
		sDraw.value = Draw;
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
	$strSQL = "SELECT * FROM `drawmoney` where `transtatus` = 0";
	}else{
	$strSQL = "SELECT * FROM `drawmoney` WHERE `DrawID` LIKE '%{$_POST['txtKeyword']}%' AND `transtatus` = 0";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$records = mysql_num_rows($objQuery);
	if($records>0){
?>

<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">เลขที่ใบเบิก</div></th>
	<th width="98"> <div align="center">ยอด</div></th>
  </tr>

<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
<?php 
$objQuery1 = mysql_query("select * from drawmoney where DrawID = '".$objResult["DrawID"]."'") or die ("Error Query");
$objResult1 = mysql_fetch_array($objQuery1);
?>
    <td><div align="center"><a href="#" OnClick="selData('<?php echo $objResult["DrawID"];?>',
    													 '<?php echo $objResult["Draw"];?>',
														 '<?php echo $objResult1["ExpensesID"];?>',
														 '<?php 
														 $sel_expenses = mysql_query("select * from expenses where ExpensesID = '".$objResult["ExpensesID"]."'") or die ("Error Query");
														 $expensesResult = mysql_fetch_array($sel_expenses);
														 echo $expensesResult["ExpensesName"];?>'
														 );">
	<?php echo $objResult["DrawID"];?>
	</a></div></td>
    <td><?php echo $objResult1["Draw"];?></td>
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
