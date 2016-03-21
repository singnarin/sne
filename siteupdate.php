<?php
include("include/connect.php");
$SiteCode = $_GET['txtsitecode'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
    <td><div align="center">แก้ไขไซต์</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="600" border="0">
	  	<form id="form1" name="form1" method="post" action="siteupdate1.php">
        <tr>
          <td width="200">SiteCode : </td>
          <?php
          	$sel_site = mysql_query("select * From site where SiteCode = '".$SiteCode."'") or die ("Error Query ())");
          	$siteResult = mysql_fetch_array($sel_site);
          ?>
          <td width="400"><input type="text" name="txtSiteCode" value="<?php echo $siteResult["SiteCode"] ;?>"/></td>
        </tr>
        <tr>
          <td>SiteName : </td>
          <td><input type="text" name="txtSiteName" value="<?php echo $siteResult["SiteName"] ;?>" /></td>
        </tr>
		<tr>
          <td>ชื่อประเภทไซต์ : </td>
          <td>
		  <select id="txtSiteTypeID" name="txtSiteTypeID" onChange="" >
		  <?php
		  	$sel_sitetype = mysql_query("select * From sitetype where SiteTypeID = '".$siteResult["SiteTypeID"]."'") or die ("Error Query ())");
          	$siteTypeResult = mysql_fetch_array($sel_sitetype);
		  ?>
		    <option  value="<?php echo $siteResult["SiteTypeID"] ;?>"><?php echo $siteTypeResult["SiteTypeName"] ;?></option>
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
		<?php
    				$sel_emp = mysql_query("SELECT * FROM `employee`   Where EmID = '".$siteResult["EmID"]."'") or die ("Error Query ())");
    				$empResult = mysql_fetch_array($sel_emp);
    	?>
          <td>ชื่อพนักงาน : </td>
          <td><input type="hidden" name="txtEmpID" id="txtEmpID" value="<?php echo $siteResult["EmID"];?>"  />
		  <input type="text" name="txtEmpName" id="txtEmpName" readonly="readonly" value="<?php echo $empResult["EmName"] ;?>" />
		  <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
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
