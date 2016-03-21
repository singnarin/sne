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
function OpenPopup(intLine)
	{
		window.open('getDatadrawmoney.php?Line='+intLine,'myPopup','width=650,height=200,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}


	function CreateNewRow()
	{
		var intLine = parseInt(document.frmMain.hdnMaxLine.value);
		intLine++;
			
		var theTable = document.getElementById("tbExp");
		var newRow = theTable.insertRow(theTable.rows.length)
		newRow.id = newRow.uniqueID

		var newCell
		
		//*** Column No ***//
		newCell = newRow.insertCell(0);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center>"+intLine+"</center>";

		//*** Column CustomerID ***//
		newCell = newRow.insertCell(1);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtDrawID_"+intLine+"\"  ID=\"txtDrawID_"+intLine+"\" VALUE=\"\"></center>";

		//*** Column Name ***//
		newCell = newRow.insertCell(2);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtDraw_"+intLine+"\"  ID=\"txtDraw_"+intLine+"\" VALUE=\"\"></center>";

		//*** Column Email ***//
		newCell = newRow.insertCell(3);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtSiteCode_"+intLine+"\" ID=\"txtSiteCode_"+intLine+"\"  VALUE=\"\"></center>";
		
		
		//*** Column Budget ***//
		newCell = newRow.insertCell(4);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtSiteName_"+intLine+"\"  ID=\"txtSiteName_"+intLine+"\" VALUE=\"\"></center>";


		//*** Column 7 ***//
		newCell = newRow.insertCell(5);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		//newCell.setAttribute("OnClick", "OpenPopup('"+intLine+"')");
		newCell.innerHTML = "<center><INPUT TYPE=\"BUTTON\" NAME=\"btnPopup_"+intLine+"\"  ID=\"btnPopup_"+intLine+"\" VALUE=\"...\" OnClick=\"OpenPopup('"+intLine+"')\"></center>";	
	
		document.frmMain.hdnMaxLine.value = intLine;
	}
	
	function RemoveRow()
	{
		intLine = parseInt(document.frmMain.hdnMaxLine.value);
		if(parseInt(intLine) > 0)
		{
				theTable = document.getElementById("tbExp");				
				theTableBody = theTable.tBodies[0];
				theTableBody.deleteRow(intLine);
				intLine--;
				document.frmMain.hdnMaxLine.value = intLine;
		}	
	}

	function OpenPopup3()
 	 {
   		window.open('getDataPartners.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
  	}
</script>

<style type="text/css">  
  .ui-datepicker{  
    width:220px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
  }  
</style>
</head>

<body OnLoad="CreateNewRow();">
<form name="frmMain" method="post" action="poadd1.php">
<?php include("cssmenu/menu.php"); ?>
<table width="100%" border="0" bordercolor="#0000FF" style="border-collapse:collapse;">
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
  	<td></td>
  </tr>
  <tr>
    <td><div align="center">เพิ่มใบวางบิล</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="800" border="0">
	  	<!--<form id="myForm" name="form1" method="post" action="poadd1.php">-->
        <tr>
          <td>เลขที่วางบิล</td>
          <td colspan="3"><input type="text" name="txtpoID" value="" /></td>
        </tr>
        <tr>
          <td>วันที่</td>
          <td colspan="3"><input name="dateInput" type="text" id="dateInput" value="" readonly="readonly" >
          <?php  include ("include/calendaScript.php"); ?></td>
        </tr>
        <tr>
          <td>ชื่อผู้ค้า</td>
          <td colspan="3"><input type="hidden" name="txtPartnersID" id="txtPartnersID" readonly="readonly" />
              <input type="text" name="txtPartnersName" id="txtPartnersName" readonly="readonly" />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup3()"></td>
        </tr>
        <tr>
          <td>ใบเบิก</td>
          <td colspan="3">

<table width="600" border="1" id="tbExp">
  <tr>
    <td><div align="center">No </div></td>
    <td><div align="center">เลขใบเบิก </div></td>
    <td><div align="center">ยอด </div></td>
    <td><div align="center">SiteCode </div></td>
    <td><div align="center">SiteName </div></td>
	<td><div align="center"> </div></td>
  </tr>
</table>
<input type="hidden" name="hdnMaxLine" value="0">
<input name="btnAdd" type="button" id="btnAdd" value="+" onClick="CreateNewRow();">
<input name="btnDel" type="button" id="btnDel" value="-" onClick="RemoveRow();">

</td>
        </tr>
        <tr>
          <td>ยอด</td>
          <td colspan="3"><input type="text" name="txtPo" id="txtPo" /></td>
        </tr>
          <td>No.Invoice</td>
          <td><input type="text" name="txtNoIn" id="txtNoIn"  /></td>
          <td>ยอด</td>
          <td><input type="text" name="txtNoInNum" id="txtNoInNum"  /></td>
        </tr>
		    <tr>
          <td>Tax.Invoice</td>
          <td><input type="text" name="txtTaxIn" id="txtTaxIn" /></td>
          <td>ยอด</td>
          <td><input type="text" name="txtTaxInNum" id="txtTaxInNum"  /></td>
        </tr></tr>
          <td>Matt</td>
          <td><input name="dateInput2" type="text" id="dateInput2" value="" readonly="readonly" >
          		<?php  include ("include/calendaScript.php"); ?></td>
          <td>ยอด</td>
          <td><input type="text" name="txtMatt" id="txtMatt"  /></td>
        </tr>
		    <tr>
          <td>Service</td>
          <td><input name="dateInput3" type="text" id="dateInput3" value="" readonly="readonly" >
          <?php  include ("include/calendaScript.php"); ?></td>
          <td>ยอด</td>
          <td><input type="text" name="txtService" id="txtService"  /></td>
        </tr>
        <tr>
          <td>หมายเหตุ</td>
          <td><textarea name="txtpoNote"></textarea></td>
		    </tr>
		<tr>
			<td colspan="2"><div align="center"><input type="submit" name="btnSubmit" value="Submit"><input type="submit" name="Submit" value="บันทึก" id="SubmitForm"/></div></td>
		</tr>
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
</form>
</body>
</html>
