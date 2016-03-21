<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>SNE Management System</title>
<?php 
include("cssmenu/head.php"); 
include("include/calenda.php");
?>
<script language="javascript">

	function OpenPopup()
	{
		window.open('getDataOrder.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
  function OpenPopup1()
  {
    window.open('getDataPartners.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
  }
  function OpenPopup2()
	{
		window.open('getDataSite5.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
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
    <td><div align="center">เพิ่มใบกำกับภาษี</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="600" border="0">
	  	<form id="form1" name="form1" method="post" action="invoiceadd1.php">
        <tr>
          <td width="200">เลขที่ใบกำกับภาษี</td>
          <td width="400"><input type="text" name="txtInvoiceID"  /></td>
        </tr>
        <tr>
          <td>วันที่</td>
          <td><input name="dateInput" type="text" id="dateInput" value="" readonly="readonly" >
		          <?php  include ("include/calendaScript.php"); ?></td>
    </tr>
    <tr>
          <td>บริษัท</td>
          <td><input type="hidden" name="txtPartnersID" id="txtPartnersID" readonly="readonly" />
              <input type="text" name="txtPartnersName" id="txtPartnersName" readonly="readonly" />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
    </tr>
		<tr>
          <td>จำนวนเงินใบกำกับ</td>
          <td><input type="text" name="txtInvoice" /></td>
    </tr>
		<tr>
          <td>จำนวนเงินใบเสร็จ</td>
          <td><input type="text" name="txtBill" /></td>
        </tr>
		<tr>
          <td>เลขที่ใบสั่งซื้อ</td>
          <td>
		  <input type="text" name="txtOderID" id="txtOderID" readonly="readonly" />
		  <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup()"></td>
        </tr>
<!--        <tr>
          <td>ไซต์</td>
          <td>
		  <input type="text" name="txtSiteCode" id="txtSiteCode" readonly="readonly" />
          <input type="text" name="txtSiteName" id="txtSiteName" readonly="readonly" />
          <input type="hidden" name="txtSiteType" id="txtSiteType" readonly="readonly" />
          <input type="hidden" name="txtempID" id="txtempID" readonly="readonly" />
		  <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup2()"></td>
        </tr>
-->		<tr>
          <td>หมายเหตุ</td>
          <td><textarea name="txtNote"></textarea></td>
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
