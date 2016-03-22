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
		window.open('getDatadrawmoney1.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}

	function OpenPopup3()
 	 {
   		window.open('getDataPartners.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
  	}
      function OpenPopup1()
  {
    window.open('getDataExpenses.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
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
    <td><div align="center">เพิ่มรายการโอนเงิน</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="619" border="0">
	  	<form id="form1" name="form1" method="post" action="transferadd1.php">
          <td>ลำดับที่โอน</td>
<?php
          $new_id =mysql_result(mysql_query("Select Max(substr(TransferID,-8))+1 as MaxID from  transfer"),0,"MaxID");
            if($new_id==''){
                $std_id="TF00000001";
            }else{
                $std_id="TF" . sprintf("%08d",$new_id);
            }
?>
          <td><input name="txtTransferID" type="text" id="txtTransferID" value="<?php echo $std_id; ?>" readonly="readonly" ></td>
        </tr>
		<tr>
          <td>วันที่โอน</td>
          <td><input name="dateInput3" type="text" id="dateInput3" value="" readonly="readonly" >
		  <?php  include ("include/calendaScript.php"); ?></td>
        </tr>
		<tr>
          <td>ใบสำคัญจ่าย</td>
          <td><input type="text" name="txtPay" id="txtPay" /></td>
    	</tr>
    	<tr>
          <td width="129">เลขที่ใบเบิกเงิน</td>	  
          <td width="279">  <input type="text" name="txtDrawID" id="txtDrawID" readonly="readonly" />
		                    <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup()"></td>
        </tr>
    	<tr>
          <td>ยอด</td>
          <td><input type="text" name="txtDraw" id="txtDraw" ></td>
    	</tr>
      <tr>
          <td>ค่าใช้จ่าย</td>
          <td><input type="hidden" name="txtExpensesID" id="txtExpensesID" >
              <input type="text" name="txtExpensesName" id="txtExpensesName" readonly="readonly" />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
      </tr>
    	<tr>
          <td>ชื่อผู้ค้า</td>
          <td colspan="3"><input type="hidden" name="txtPartnersID" id="txtPartnersID" readonly="readonly" />
              <input type="text" name="txtPartnersName" id="txtPartnersName" readonly="readonly" />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup3()"></td>
        </tr>
	<tr>
	<tr>
          <td>ค่าธรรมเนียม</td>
          <td><input type="text" name="txtFee" id="txtFee"></td>
	</tr>
      	<td>เงินโอน</td>
		 <td><input type="text" name="txtTransfer" id="txtTransfer"/></td>
    </tr>
    <tr>
          <td>หมายเหตุ</td>
          <td><input type="text" name="txtNote" id="txtNote"></td>
    </tr>
		<tr>
			<td colspan="2"><div align="center"><input class="btn btn-primary" type="submit" name="Submit" value="บันทึก" /></div></td>
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
