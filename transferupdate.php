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
$TransferID = $_GET['TransferID'];
$transferSelect = mysql_query("SELECT * FROM  transfer Where TransferID = '".$TransferID."'") or die (mysql_error());
$transferResult = mysql_fetch_array($transferSelect);
?>
<script language="javascript">

	function OpenPopup()
	{
		window.open('getDatadrawmoney.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
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
	  	<form id="form1" name="form1" method="post" action="transferupdate1.php">
          <td>ลำดับที่โอน</td>
          <td><input name="txtTransferID" type="text" id="txtTransferID" value="<?php echo $transferResult['TransferID']; ?>" readonly="readonly" ></td>
        </tr>
		<tr>
          <td>วันที่โอน</td>
          	<?php
          		$date = explode("-",$transferResult['TransferDate']);
				$year = $date['2'];
				$month = $date['1'];
				$day = $date['0'];
				$nTransferDate = $year . "-" . $month . "-" . $day ;

				$drawSelect = mysql_query("SELECT Draw FROM  Drawmoney Where DrawID = '".$transferResult['DrawID']."'") or die (mysql_error());
				$drawResult = mysql_fetch_array($drawSelect);
          	?>
          <td><input name="dateInput3" type="text" id="dateInput3" value="<?php echo $nTransferDate; ?>" readonly="readonly" >
		  <?php  include ("include/calendaScript.php"); ?></td>
        </tr>
		<tr>
          <td>ใบสำคัญจ่าย</td>
          <td><input type="text" name="txtPay" id="txtPay"  value="<?php echo $transferResult['Pay']; ?>"/></td>
    	</tr>
    	<tr>
          <td width="129">เลขที่ใบเบิกเงิน</td>	  
          <td width="279">  <input type="text" name="txtDrawID" id="txtDrawID" readonly="readonly"  value="<?php echo $transferResult['DrawID']; ?>"/>
		                    <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup()"></td>
        </tr>
    	<tr>
          <td>ยอด</td>
          <td><input type="text" name="txtDraw" id="txtDraw" readonly="readonly" value="<?php echo $drawResult['Draw']; ?>"></td>
    	</tr>
	<tr>
	<tr>
          <td>ค่าธรรมเนียม</td>
          <td><input type="text" name="txtFee" id="txtFee" value="<?php echo $transferResult['Fee']; ?>"></td>
	</tr>
      	<td>เงินโอน</td>
		 <td><input type="text" name="txtTransfer" id="txtTransfer" value="<?php echo $transferResult['Transfer']; ?>"/></td>
    </tr>
    <tr>
          <td>หมายเหตุ</td>
          <td><input type="text" name="txtNote" id="txtNote" value="<?php echo $transferResult['TransferNote']; ?>"></td>
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
