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
		window.open('getDataSiteType.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
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
<form name="frmMain" method="post" action="poinadd1.php">
<?php include("cssmenu/menu.php"); ?>
<table width="100%" border="0" bordercolor="#0000FF" style="border-collapse:collapse;">
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
  	<td></td>
  </tr>
  <tr>
    <td><div align="center">เพิ่ม PO รับเข้า</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <table border="0">
      <tr>
          <td>ลำดับที่ PO เข้า</td>
<?php 
          $new_id =mysql_result(mysql_query("Select Max(substr(poInNo,-6))+1 as MaxID from  po_in"),0,"MaxID");
            if($new_id==''){
                $std_id="PI000001";
            }else{
                $std_id="PI" . sprintf("%06d",$new_id); 
            } 
?>
          <td colspan="3"><input type="text" name="txtpoInNo" value="<?php echo $std_id; ?>" /></td>
        </tr>
        <tr>
          <td>เลขที่ PO</td>
          <td colspan="3"><input type="text" name="txtpoID" value="" /></td>
        </tr>
        <tr>
          <td>วันที่</td>
          <td colspan="3"><input name="dateInput" type="text" id="dateInput" value="" readonly="readonly" >
                          <?php  include ("include/calendaScript.php"); ?></td>
        </tr>
        <tr>
          <td>จำนวนไซต์</td>
          <td><input type="text" name="txtnumSiteLimit" id="txtnumSiteLimit" /></td>
        </tr>
          <td>ราคา/ไซต์</td>
          <td><input type="text" name="txtpriceSite" id="txtpriceSite"  /></td>
        </tr>
		<tr>
          <td>ใบสั่งซื้อราคา</td>
          <td><input type="text" name="txtpriceOrder" id="txtpriceOrder" /></td>
        <tr>
          <td>หมายเหตุ</td>
          <td colspan="3"><textarea name="txtpoInNote"></textarea></td>
		    </tr>
		 <tr>
			     <td colspan="2"><div align="center"><input class="btn btn-primary" type="submit" name="Submit" value="บันทึก" id="SubmitForm"/></div></td>
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
