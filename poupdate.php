<?php
include("include/connect.php");
$poID = $_GET['poID'];
$poSelect = mysql_query("SELECT * FROM  po Where poID = '".$poID."'") or die (mysql_error());
$poResult = mysql_fetch_array($poSelect);

$date = explode("-",$poResult['poDate']);
$year = $date['2'];
$month = $date['1'];
$day = $date['0'];
$poDate = $year . "-" . $month . "-" . $day ;

$date1 = explode("-",$poResult['MattDate']);
$year1 = $date1['2'];
$month1 = $date1['1'];
$day1 = $date1['0'];
$MattDate = $year1 . "-" . $month1 . "-" . $day1 ;

$date2 = explode("-",$poResult['ServiceDate']);
$year2 = $date2['2'];
$month2 = $date2['1'];
$day2 = $date2['0'];
$ServiceDate = $year2 . "-" . $month2 . "-" . $day2 ;
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
		window.open('getDataSite4.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
	function OpenPopup1()
	{
		window.open('getDatadrawmoney.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}function OpenPopup2()
	{
		window.open('getDataSite2.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
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
    <td><div align="center">เพิ่มใบวางบิล</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="800" border="0">
	  	<form id="form1" name="form1" method="post" action="poupdate1.php">
        <tr>
          <td>เลขที่วางบิล</td>
          <td colspan="3"><input type="text" name="txtpoID" value="<?php echo $poResult['poID'];?>" /></td>
        </tr>
        <tr>
          <td>วันที่</td>
          <td colspan="3"><input name="dateInput" type="text" id="dateInput" value="<?php echo $poDate;?>" >
          <?php  include ("include/calendaScript.php"); ?></td>
        </tr>
        <tr>
          <td>ชื่อผู้ค้า</td>
          <td colspan="3"><input type="hidden" name="txtPartnersID" id="txtPartnersID" readonly="readonly" value="<?php echo $poResult['PartnersID'];?>" />
          <?php
          	$partnersSelect = mysql_query("SELECT * FROM  partners Where PartnersID = '".$poResult['PartnersID']."'") or die (mysql_error());
			$partnersResult = mysql_fetch_array($partnersSelect);

			$workSelect = mysql_query("SELECT * FROM  site Where SiteCode = '".$poResult['work']."'") or die (mysql_error());
			$workResult = mysql_fetch_array($workSelect);
          ?>
              <input type="text" name="txtPartnersName" id="txtPartnersName" readonly="readonly" value="<?php echo $partnersResult['PartnersName'];?>" />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup3()"></td>
        </tr>
        <tr>
          <td>Site</td>
          <td colspan="3"><input type="hidden" name="txtWork" id="txtWork" readonly="readonly" value="<?php echo $poResult['work'];?>" />
              <input type="text" name="txtWorkName" id="txtWorkName" readonly="readonly" value="<?php echo $workResult['SiteName'] ;?>" />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup()"></td>
        </tr>
        <tr>
          <td>เลขที่ใบเบิก</td>
          <td colspan="3"><input type="text" name="txtDrawID" id="txtDrawID" readonly="readonly" value="<?php echo $poResult['DrawID'];?>" />
              <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
        </tr>
        <tr>
          <td>ยอด</td>
          <td colspan="3"><input type="text" name="txtPo" id="txtPo" value="<?php echo $poResult['po'];?>" /></td>
        </tr>
          <td>No.Invoice</td>
          <td><input type="text" name="txtNoIn" id="txtNoIn" value="<?php echo $poResult['NoIn'];?>"  /></td>
          <td>ยอด</td>
          <td><input type="text" name="txtNoInNum" id="txtNoInNum" value="<?php echo $poResult['NoInNum'];?>"  /></td>
        </tr>
		    <tr>
          <td>Tax.Invoice</td>
          <td><input type="text" name="txtTaxIn" id="txtTaxIn" value="<?php echo $poResult['TaxIn'];?>" /></td>
          <td>ยอด</td>
          <td><input type="text" name="txtTaxInNum" id="txtTaxInNum" value="<?php echo $poResult['TaxInNum'];?>" /></td>
        </tr>
        </tr>
          <td>Matt</td>
          <td><input name="dateInput2" type="text" id="dateInput2" value="<?php echo $MattDate;?>" readonly="readonly" >
          		<?php  include ("include/calendaScript.php"); ?></td>
          <td>ยอด</td>
          <td><input type="text" name="txtMatt" id="txtMatt" value="<?php echo $poResult['Matt'];?>"  /></td>
        </tr>
		    <tr>
          <td>Service</td>
          <td><input name="dateInput3" type="text" id="dateInput3" value="<?php echo $ServiceDate;?>" readonly="readonly" >
          <?php  include ("include/calendaScript.php"); ?></td>
          <td>ยอด</td>
          <td><input type="text" name="txtService" id="txtService" value="<?php echo $poResult['Service'];?>"  /></td>
        </tr>
        <tr>
          <td>หมายเหตุ</td>
          <td><textarea name="txtpoNote"><?php echo $poResult['poNote'];?></textarea></td>
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
