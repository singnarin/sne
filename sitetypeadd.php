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
    <td><div align="center">เพิ่มประเภทไซต์</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="600" border="0">
	  	<form id="form1" name="form1" method="post" action="sitetypeadd1.php">
        <tr>
          <td width="200">ลำดับประเภทไซต์ : </td>
<?php
		      $new_id =mysql_result(mysql_query("Select Max(substr(SiteTypeID,-3))+1 as MaxID from  sitetype"),0,"MaxID");
            if($new_id==''){
                $std_id="ST001";
            }else{
                $std_id="ST" . sprintf("%03d",$new_id);
            }
?>
		  
          <td width="400"><input type="text" name="SiteTypeID" value="<?php echo $std_id; ?>" readonly="readonly" /></td>
        </tr>
        <tr>
          <td>ชื่อประเภทไซต์ : </td>
          <td><input type="text" name="SiteTypeName" /></td>
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
