<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
<?php include("cssmenu/head.php"); ?>
<script language="javascript">

	function OpenPopup()
	{
		window.open('getDataEmp.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}

</script>
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
    <td><div align="center">เพิ่มตัวแทนเบิก3%</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="600" border="0">
	  	<form id="form1" name="form1" method="post" action="agentadd1.php">
        <tr>
          <td width="200">เลขประจำตัวประชาชน : </td>
          <td width="400"><input type="text" name="AgentID" /></td>
        </tr>
        <tr>
          <td>ชื่อ - สกุล : </td>
          <td><input type="text" name="AgentName" /></td>
        </tr>
        <tr>
          <td>ที่อยู่ : </td>
          <td>
            <textarea name="AgentAddress"></textarea>
          </td>
        </tr>
        <tr>
          <td>เบอร์โทร : </td>
          <td><input type="text" name="AgentTel" /></td>
        </tr>
		<tr>
          <td>เป็นตัวแทนเบิกของ : </td>
          <td>
		  <input type="hidden" name="txtEmpID" id="txtEmpID" />
		  <input type="text" name="txtEmpName" id="txtEmpName" readonly="readonly" />
		  <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup()"></td>
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
