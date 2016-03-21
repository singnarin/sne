<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php 
include("cssmenu/head.php"); 
include("include/calenda.php");
?>
<script language="javascript">

	function OpenPopup()
	{
		window.open('getDataSiteType.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
  function OpenPopup1()
  {
    window.open('getDataPartners.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
  }
  function OpenPopup2()
  {
    window.open('getDataEmp.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
  }

</script>

<style type="text/css">  
  /* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */  
  .ui-datepicker{  
    width:220px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
  }  
</style>
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
    <td><div align="center">แก้ไขใบสั่งซื้อ</div></td>
  </tr>
  <?php
    $OderID = $_GET["OderID"];
    $objQuery = mysql_query("SELECT * FROM  Oder Where OderID = '".$OderID."'") or die (mysql_error());
    $objResult = mysql_fetch_array($objQuery);
  ?>
  <tr>
    <td><div align="center">
      <table width="600" border="0">
	  	<form id="form1" name="form1" method="post" action="orderupdate1.php">
        <tr>
          <td width="200">เลขที่ใบสั่งซื้อ</td>
          <td width="400"><input type="text" name="txtOderID" value="<?php echo $objResult["OderID"];?>" /></td>
        </tr>
        <tr>
          <td>วันที่</td>
          <?php
          $date = explode("-",$objResult["OderDate"]);
          $year = $date['2'];
          $month = $date['1'];
          $day = $date['0'];
          $newdate = $year . "-" . $month . "-" . $day ;
          ?>
          <td><input name="dateInput" type="text" id="dateInput" readonly="readonly" value="<?php echo $newdate ;?>" >
		  <?php  include ("include/calendaScript.php"); ?></td>
        </tr>
        <tr>
          <td>บริษัท</td>
      <?php
        $sel_partners = mysql_query("SELECT * FROM partners WHERE `PartnersID` = '".$objResult["PartnersID"]."'") or die (mysql_error());
        $partnersResult = mysql_fetch_array($sel_partners);
      ?>
          <td><input type="hidden" name="txtPartnersID" id="txtPartnersID" readonly="readonly" value="<?php echo $objResult["PartnersID"];?>" />
              <input type="text" name="txtPartnersName" id="txtPartnersName" readonly="readonly" value="<?php echo $partnersResult["PartnersName"];?>"  />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
    </tr>
          <td>ประเภทไซต์</td>
      <?php
        $sel_sitetype = mysql_query("SELECT * FROM sitetype WHERE `SiteTypeID` = '".$objResult["SiteTypeID"]."'") or die (mysql_error());
        $sitetypeResult = mysql_fetch_array($sel_sitetype);
      ?>
          <td>
		  <input type="hidden" name="txtSiteTypeID" id="txtSiteTypeID" value="<?php echo $objResult["SiteTypeID"];?>"  />
		  <input type="text" name="txtSiteTypeName" id="txtSiteTypeName" readonly="readonly" value="<?php echo $sitetypeResult["SiteTypeName"];?>"  />
		  <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup()"></td>
        </tr>
		<tr>
    <tr>
          <td>ชื่อพนักงาน : </td>
      <?php
        $sel_emp = mysql_query("SELECT * FROM employee WHERE `EmID` = '".$objResult["EmpID"]."'") or die (mysql_error());
        $empResult = mysql_fetch_array($sel_emp);
      ?>
          <td><input type="hidden" name="txtEmpID" id="txtEmpID"  value="<?php echo $objResult["EmpID"];?>"/>
              <input type="text" name="txtEmpName" id="txtEmpName" readonly="readonly" value="<?php echo $empResult["EmName"];?>" />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup2()"></td>
    </tr>
    <tr>
          <td>หมายเหตุ</td>
          <td><textarea name="txtNote"><?php echo $objResult["OderNote"];?></textarea></td>
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
