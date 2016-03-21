<?php
include("include/connect.php");
$DrawID = $_GET['DrawID'];
$DrawSelect = mysql_query("SELECT * FROM  drawmoney Where DrawID = '".$DrawID."'") or die (mysql_error());
$DrawResult = mysql_fetch_array($DrawSelect);
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
		window.open('getDataSite.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
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
    <td><div align="center">แก้ไขรายการเบิกเงิน</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table width="619" border="0">
	  	<form id="form1" name="form1" method="post" action="drawupdate1.php">
        <tr>
          <td width="227">ลำดับที่</td>
          <td width="382"><input type="text" name="txtDrawID" value="<?php echo $DrawResult['DrawID']; ?>" /></td>
        </tr>
        <tr>
          <td>วันที่</td>
          <?php
          	$date = explode("-",$DrawResult['DrawDate']);
			$year = $date['2'];
			$month = $date['1'];
			$day = $date['0'];
			$nDrawDate = $year . "-" . $month . "-" . $day ;
          ?>
          <td><input name="dateInput" type="text" id="dateInput" value="<?php echo $nDrawDate ;?>" readonly="readonly" >
		  <?php  include ("include/calendaScript.php"); ?></td>
        </tr>
		    <tr>
          <td>ส่งที่</td>
          <td><input name="txtSentAt" type="radio" value="sne" 
          		<?php
          			if($DrawResult['SentAt']=="sne")
          				echo "checked";
          		?>
          		>SNE
              <input name="txtSentAt" type="radio" value="ens" 
          		<?php
          			if($DrawResult['SentAt']=="ens")
          				echo "checked";
          		?>
          		>ENS</td>
		    </tr>
		    <tr>
          <td>SiteName :</td>
         		<?php $SiteSelect = mysql_query("SELECT * FROM  site Where SiteCode = '".$DrawResult['SiteCode']."'") or die (mysql_error());
				$SiteResult = mysql_fetch_array($SiteSelect); ?>
		   <td>
          <input type="text" name="txtSiteCode" id="txtSiteCode" readonly="readonly" value="<?php echo $DrawResult['SiteCode']; ?>"/>
          <input type="text" name="txtSiteName" id="txtSiteName" readonly="readonly" value="<?php echo $SiteResult['SiteName']; ?>"/>
          <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup()">
          </td>
        </tr>
        <tr>
          <td>ค่าใช้จ่าย :</td>
          <?php $expensesSelect = mysql_query("SELECT * FROM  expenses Where ExpensesID = '".$DrawResult['ExpensesID']."'") or die (mysql_error());
				$expensesResult = mysql_fetch_array($expensesSelect); ?>
          <td>
          <input type="text" name="txtExpensesID" id="txtExpensesID" readonly="readonly" value="<?php echo $DrawResult['ExpensesID']; ?>"/>
          <input type="text" name="txtExpensesName" id="txtExpensesName" readonly="readonly" value="<?php echo $expensesResult['ExpensesName'];?>"/>
          <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
        </tr>
		    <tr>
          <td>ยอดเบิก</td>
		      <td><input type="text" name="txtDraw" id="txtDraw" value="<?php echo $DrawResult['Draw']; ?>"/></td>
        </tr>
        <tr>
          <td>หัก</td>
          <?php
          	$Tax = $DrawResult['DrawTax'] * 100 / $DrawResult['Draw'];
          ?>
          <td><input name="txtTax" type="radio" value="1" 
          		<?php
          			if($Tax==1)
          				echo "checked";
          		?>
          		/>1%
              <input name="txtTax" type="radio" value="3" 
              	<?php
          			if($Tax==3)
          				echo "checked";
          		?>
          		/>3%
              <input name="txtTax" type="radio" value="7" 
              <?php
          			if($Tax==7)
          				echo "checked";
          		?>
          		/>7%</td>
        </tr>
		    <tr>
          <td>หมายเหตุ</td>
          <td><input type="text" name="txtNote" value="<?php echo $DrawResult['DrawNote']; ?>"></td>
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
