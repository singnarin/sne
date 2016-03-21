<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php include("cssmenu/head.php"); ?>
<script language="javascript">

	function OpenPopup()
	{
		window.open('getDataSiteType.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
	function OpenPopup1()
	{
		window.open('getDataEmp.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}

</script>
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
    <td><div align="center">เพิ่มไซต์</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="600" border="0">
	  	<form id="form1" name="form1" method="post" action="siteadd1.php">
        <tr>
          <td width="200">SiteCode : </td>
          <td width="400"><input type="text" name="txtSiteCode" value=""/></td>
        </tr>
        <tr>
          <td>SiteName : </td>
          <td><input type="text" name="txtSiteName" /></td>
        </tr>
		<tr>
          <td>ชื่อประเภทไซต์ : </td>
          <td>
		  <select id="txtSiteTypeID" name="txtSiteTypeID" onChange="" >
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
		  <!--<input type="hidden" name="txtSiteTypeID" id="txtSiteTypeID" />
		  <input type="text" name="txtSiteTypeName" id="txtSiteTypeName" readonly="readonly" />
		  <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup()">
		  </td>-->
        </tr>
		<tr>
          <td>ชื่อพนักงาน : </td>
          <td><input type="hidden" name="txtEmpID" id="txtEmpID" />
		  <input type="text" name="txtEmpName" id="txtEmpName" readonly="readonly" />
		  <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
        </tr>
		<tr>
			<td colspan="2"><div align="center"><input type="submit" name="Submit" value="บันทึก" /></div><br></td>
		</tr>
		</form>
      </table>
<table border="1">
<form action="phpCSVMySQLUpload.php" method="post" enctype="multipart/form-data" name="form2">
<tr>
    <td height="59"><div align="center"><br>อัพโหลดทีละหลายๆ Site งาน</div></td>
 </tr>
  <tr>
  	<td><div align="center">
  		<input name="fileCSV" type="file" id="fileCSV">
  		<input name="btnSubmit" type="submit" id="btnSubmit" value="Upload">
  	</div></td>
  </tr>
<tr>
    <td height="59"><div align="center"><br>- ไฟล์ที่อัพโหลดต้องนามสกุล .csv ดาวน์โหลดได้จาก <a href="Download/site.csv"> ที่นี่ </a> และ Encoding เป็น UTF-8</div></td>
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
