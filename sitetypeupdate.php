<?php
include("include/connect.php");
$SiteTypeID = $_GET['txtsitetypeid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php include("cssmenu/head.php"); ?>
</head>

<body>
<table width="100%" border="0" bordercolor="#0000FF" style="border-collapse:collapse;">
  <tr>
    <td><?php include("cssmenu/menu.php"); ?></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><div align="center">แก้ไขประเภทไซต์</div></td>
  </tr>
  <tr>
    <td><div align="center">
        <table width="600" border="0">
        <form id="form1" name="form1" method="post" action="sitetypeupdate1.php">
<?php
  $objQuery = mysql_query("SELECT * FROM  sitetype Where SiteTypeID = '".$SiteTypeID."'") or die ("Error Query [".$strSQL."]");
  $objResult = mysql_fetch_array($objQuery);
?>
        <tr>
          <td width="200">รหัสไซต์</td>
          <td width="400"><input type="text" name="SiteTypeID" value="<?php echo $objResult["SiteTypeID"] ?>" readonly="readonly" /></td>
        </tr>
        <tr>
          <td>ชื่อไซต์</td>
          <td><input type="text" name="SiteTypeName" value="<?php echo $objResult["SiteTypeName"] ?>" /></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"><input type="submit" name="Submit" value="บันทึก" /></div></td>
        </tr>
        </form>
         </table>
      </div>
    </td>
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
