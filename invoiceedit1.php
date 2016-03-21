<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>SNE Management System</title>
</head>
<body>
<?php 

$beginDate = $_POST["dateInput3"];
$endDate = $_POST["dateInput4"];

if(empty($beginDate) or empty($endDate)){
	echo "<div align=\"center\">ใส่วันที่ด้วยนะ</div>";
}else{

$SiteTypeID = $_POST["txtSiteTypeID"];
$EmpID = $_POST["txtEmpID"];

if($beginDate == "" && $endDate == ""){
	$nbeginDate = "0";
	$nendDate = "0";
	$message = "ใส่วันที่ด้วยคร๊าบบบบ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	//echo "<meta http-equiv='refresh' content='0;URL=invoiceedit.php'>";
}else{
	$date = explode("-",$beginDate);
	$year = $date['2'];
	$month = $date['1'];
	$day = $date['0'];
	$nbeginDate = $year . "-" . $month . "-" . $day ;

	$date1 = explode("-",$endDate);
	$year1 = $date1['2'];
	$month1 = $date1['1'];
	$day1 = $date1['0'];
	$nendDate = $year1 . "-" . $month1 . "-" . $day1 ;
}

$strSQL = "SELECT * FROM invoice WHERE 1 ";
	if($nbeginDate !='' &&  $nendDate !=''){
			$strSQL .= " AND `InvoiceDate` BETWEEN '".$nbeginDate."' AND '".$nendDate."'";
		}
		if($SiteTypeID !=''){
			$strSQL .= " AND SiteTypeID = '".$SiteTypeID."'";
		}
		if($EmpID !=''){
			$strSQL .= " AND empID = '".$EmpID."'";
		}
$objQuery = mysql_query($strSQL) or die (mysql_error());

?>
<div align="center">
<table width="100%" border="0">
<form name="form1" method="post" action="invoiceedit2.php">
  <tr>
    <td><table width="100%" border="0">  	
      	<tr>
        	 <td colspan="5"><div align="center">
		<table class="table table-bordered" >
  			<tr>
    			<th> <div align="center">ลบ</div></th>
    			<th> <div align="center">เลขที่ใบกำกับภาษี</div></th>
    			<th> <div align="center">วันที่</div></th>
          		<th> <div align="center">รัสบริษัทคู่ค้า</div></th>
    			<th> <div align="center">บริษัทคู่ค้า</div></th>
          		<th> <div align="center">จำนวนเงินก่อนภาษี</div></th>
         		<th> <div align="center">จำนวนเภาษี</div></th>
    			<th> <div align="center">จำนวนเงินใบกำกับ</div></th>
          		<th> <div align="center">จำนวนเงินใบเสร็จ</div></th>
          		<th> <div align="center">เลขที่ใบสั่งซื้อ</div></th>
          		<th> <div align="center">ประเภทไซต์</div></th>
          		<!--<th> <div align="center">ไซต์</div></th>-->
          		<th> <div align="center">ชื่อพนักงาน</div></th>
          		<th> <div align="center">หมายเหตุ</div></th>
          		
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  			<tr>
  				<td><a href="invoiceedit2.php?InvoiceID=<?php echo $objResult["InvoiceID"];?>" target = "_blank"><img src = "images/no.jpg"></a></td>
    			<td><div align="center"><a href="invoiceupdate.php?InvoiceID=<?php echo $objResult["InvoiceID"] ; ?>" target = "_blank"><?php echo $objResult["InvoiceID"];?> </a></div></td>
    			<td>
    			<?php 
    			$date2 = explode("-",$objResult["InvoiceDate"]);
				$year2 = $date2['2'];
				$month2 = $date2['1'];
				$day2 = $date2['0'];
				$nDate2 = $year2 . "-" . $month2. "-" . $day2 ;
    			echo $nDate2 ; ?>
    			</td>
    			<?php
    				$sel_partners = mysql_query("SELECT * FROM partners WHERE `PartnersID` = '".$objResult["PartnersID"]."'") or die (mysql_error());
    				$partnersResult = mysql_fetch_array($sel_partners);

    				$sel_site = mysql_query("SELECT * FROM site WHERE `SiteCode` = '".$objResult["SiteCode"]."'") or die (mysql_error());
    				$siteResult = mysql_fetch_array($sel_site);

    				$sel_sitetype = mysql_query("SELECT * FROM sitetype WHERE `SiteTypeID` = '".$siteResult["SiteTypeID"]."'") or die (mysql_error());
    				$sitetypeResult = mysql_fetch_array($sel_sitetype);

    				$sel_emp = mysql_query("SELECT * FROM employee WHERE `EmID` = '".$siteResult["EmID"]."'") or die (mysql_error());
    				$empResult = mysql_fetch_array($sel_emp);
    			?>
    			<td><?php echo $objResult["PartnersID"] ; ?></td>
          <td><?php echo $partnersResult["PartnersName"] ; ?></td>
          <td><?php echo $objResult["Invoice"] ; ?></td>
          <?php
            $tax = $objResult["Invoice"] * 7 / 100 ;
            $sum = $tax + $objResult["Invoice"] ;
          ?>
          <td><?php echo $tax ; ?></td>
    			<td><?php echo $sum ; ?></td>
    			<td><?php echo $objResult["Bill"] ; ?></td>
    			<td><?php echo $objResult["OderID"] ; ?></td>
    			<td><?php echo $sitetypeResult["SiteTypeName"] ; ?></td>
    			<!--<td><?php echo $siteResult["SiteName"] ; ?></td>-->
    			<td><?php echo $empResult["EmName"] ; ?></td>
    			<td><?php echo $objResult["Note"] ; ?></td>
  			</tr>
<?php
}
?>
		</table>
				</td>
       		</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<?php
}
mysql_close($Conn); 
?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
