<html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
mysql_connect("localhost","root","tootuu7413");
mysql_select_db("country");
$strSQL = "SELECT * FROM country";
$objQuery = mysql_query($strSQL);
?>
<script language="javascript">

	function OpenPopup(intLine)
	{
		window.open('getData.php?Line='+intLine,'myPopup','width=650,height=200,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
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
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtCustomerID_"+intLine+"\"  ID=\"txtCustomerID_"+intLine+"\" VALUE=\"\"></center>";

		//*** Column Name ***//
		newCell = newRow.insertCell(2);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtName_"+intLine+"\"  ID=\"txtName_"+intLine+"\" VALUE=\"\"></center>";

		//*** Column Email ***//
		newCell = newRow.insertCell(3);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtEmail_"+intLine+"\" ID=\"txtEmail_"+intLine+"\"  VALUE=\"\"></center>";
		
		
		//*** Column Budget ***//
		newCell = newRow.insertCell(4);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtBudget_"+intLine+"\"  ID=\"txtBudget_"+intLine+"\" VALUE=\"\"></center>";
	
			//*** Column Used ***//
		newCell = newRow.insertCell(5);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" SIZE=\"5\" NAME=\"txtUsed_"+intLine+"\"  ID=\"txtUsed_"+intLine+"\" VALUE=\"\"></center>";	

			//*** Column 7 ***//
		newCell = newRow.insertCell(6);
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
<body OnLoad="CreateNewRow();">
<form name="frmMain" method="post" action="readData.php">
<table width="600" border="1" id="tbExp">
  <tr>
    <td><div align="center">No </div></td>
    <td><div align="center">CustomerID </div></td>
    <td><div align="center">Name </div></td>
    <td><div align="center">Email </div></td>
    <td><div align="center">Budget </div></td>
	<td><div align="center">Used </div></td>
	<td><div align="center">Popup </div></td>
  </tr>
</table>
<input type="hidden" name="hdnMaxLine" value="0">
<input name="btnAdd" type="button" id="btnAdd" value="+" onClick="CreateNewRow();">
<input name="btnDel" type="button" id="btnDel" value="-" onClick="RemoveRow();">
<input type="submit" name="btnSubmit" value="Submit">
</form>
</body>
</html>
