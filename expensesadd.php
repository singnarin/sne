<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php include("cssmenu/head.php"); ?>
</head>

<body>
<?php include("cssmenu/menu.php"); ?>
<table width="100%" border="0" bordercolor="#0000FF" style="border-collapse:collapse;">
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
  	<td></td>
  </tr>
  <tr>
    <td><div align="center">เพิ่มค่าใช้จ่าย</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="600" border="0">
	  	<form id="form1" name="form1" method="post" action="expensesadd1.php">
        <tr>
          <td width="200">ลำดับที่ : </td>
<?php
		      $new_id =mysql_result(mysql_query("Select Max(substr(ExpensesID,-3))+1 as MaxID from  expenses"),0,"MaxID");
            if($new_id==''){
                $std_id="EX001";
            }else{
                $std_id="EX" . sprintf("%03d",$new_id);
            }
?>
		  
          <td width="400"><input type="text" name="txtExpenID" value="<?php echo $std_id; ?>" readonly="readonly" /></td>
        </tr>
        <tr>
          <td>ชื่อค่าใช้จ่าย</td>
          <td><input type="text" name="txtExpenName" /></td>
        </tr>
		<tr>
			<td colspan="2"><div align="center"><input type="submit" name="Submit" value="บันทึก" /></div></td>
		</tr>
		</form>
      </table>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
