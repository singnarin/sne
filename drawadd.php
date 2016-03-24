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
		window.open('getDataSite5.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
  function OpenPopup1()
  {
    window.open('getDataExpenses.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
  }

  function OpenPopup(intLine)
	{
		window.open('getDataSite5.php?Line='+intLine,'myPopup','width=650,height=200,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
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
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtSiteCode_"+intLine+"\"  ID=\"txtSiteCode_"+intLine+"\" VALUE=\"\"></center>";

		//*** Column Name ***//
		newCell = newRow.insertCell(2);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtSiteName_"+intLine+"\"  ID=\"txtSiteName_"+intLine+"\" VALUE=\"\"></center>";

		//*** Column Email ***//
		newCell = newRow.insertCell(3);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"hidden\" SIZE=\"5\" NAME=\"txtSiteType_"+intLine+"\" ID=\"txtSiteType_"+intLine+"\"  VALUE=\"\"></center>";
		
		
		//*** Column Budget ***//
		newCell = newRow.insertCell(4);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"hidden\" SIZE=\"5\" NAME=\"txtempID_"+intLine+"\"  ID=\"txtempID_"+intLine+"\" VALUE=\"\"></center>";


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
<form name="frmMain" method="post"  action="drawadd1.php">
<?php include("cssmenu/menu.php"); ?>
<table width="100%" border="0" bordercolor="#0000FF" style="border-collapse:collapse;">
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
  	<td></td>
  </tr>
  <tr>
    <td><div align="center">เพิ่มรายการเบิกเงิน</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="619" border="0">
        <tr>
          <td width="227">ลำดับที่</td>
<?php 
		      $new_id =mysql_result(mysql_query("Select Max(substr(DrawID,-6))+1 as MaxID from  drawmoney"),0,"MaxID");
            if($new_id==''){
                $std_id="DW000001";
            }else{
                $std_id="DW" . sprintf("%06d",$new_id); 
            } 
?>
		  
          <td width="382"><input type="text" name="txtDrawID" value="<?php echo $std_id; ?>" /></td>
        </tr>
        <tr>
          <td>วันที่</td>
          <td><input name="dateInput" type="text" id="dateInput" value="" readonly="readonly" >
		  <?php  include ("include/calendaScript.php"); ?></td>
        </tr>
		<tr>
          <td>ส่งที่</td>
          <td><input name="txtSentAt" type="radio" value="sne" />SNE
              <input name="txtSentAt" type="radio" value="ens" />ENS</td>
		    </tr>
		    <tr>
          <td>SiteName :</td>
		  <td>

<table class="table table-condensed" width="600" border="0" id="tbExp">
  <tr>
    <td><div align="center">No </div></td>
    <td><div align="center">SiteCode </div></td>
    <td><div align="center">SiteName </div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
	<td><div align="center"> </div></td>
  </tr>
</table>

<input type="hidden" name="hdnMaxLine" value="0">
<input name="btnAdd" type="button" id="btnAdd" value="+" onClick="CreateNewRow();">
<input name="btnDel" type="button" id="btnDel" value="-" onClick="RemoveRow();">

<!--          <input type="text" name="txtSiteCode" id="txtSiteCode" readonly="readonly" />
          <input type="text" name="txtSiteName" id="txtSiteName" readonly="readonly" />
          <input type="hidden" name="txtSiteType" id="txtSiteType" readonly="readonly" />
          <input type="hidden" name="txtempID" id="txtempID" readonly="readonly" />
-->          
          </td>
        </tr>
        <tr>
          <td>ประเภทไซต์ :</td>
          <td>
          <select id="txtSiteType" name="txtSiteType" onChange="" >
		    <option  value="txtSiteType">- กรุณาเลือก -</option>
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
          (กรณีที่ไม่ระบุไซต์)
          </td>
        </tr>
        <tr>
          <td>ค่าใช้จ่าย :</td>
          <td>
          <input type="hidden" name="txtExpensesID" id="txtExpensesID" readonly="readonly" />
          <input type="text" name="txtExpensesName" id="txtExpensesName" readonly="readonly" />
          <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
        </tr>
         <tr>
          <td>เบิก</td>
          <td><input type="text" name="txtPersen" id="txtPersen"/>เปอร์เซ็น</td>
        </tr>
		    <tr>
          <td>ยอดเบิก</td>
		      <td><input type="text" name="txtDraw" id="txtDraw"/></td>
        </tr>
        <tr>
          <td>หัก</td>
          <td><input name="txtTax" type="radio" value="1" />1%
              <input name="txtTax" type="radio" value="3" />3%
              <input name="txtTax" type="radio" value="5" />5%
              <input name="txtTax" type="radio" value="7" />7%
          </td>
        </tr>
		    <tr>
          <td>หมายเหตุ</td>
          <td><input type="text" name="txtNote"></td>
		    </tr>
		<tr>
			<td colspan="2"><div align="center"><input type="submit" name="Submit" value="บันทึก" /></div></td>
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
</form>
</body>
</html>
