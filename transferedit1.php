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

$txtSiteTypeID = $_POST["txtSiteTypeID"];
$txtEmpID = $_POST["txtEmpID"];

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

//$sel = $_POST['txtsel'];
//echo $nbeginDate . "--->" . $nendDate ;
$strSQL = "SELECT * FROM site_draw WHERE 1 AND TransferID != ''";
		if($nbeginDate !='' &&  $nendDate !=''){
			$strSQL .= " AND `TransferDate` BETWEEN '".$nbeginDate."' AND '".$nendDate."'";
		}
		if($txtSiteTypeID !=''){
			$strSQL .= " AND SiteTypeID = '".$txtSiteTypeID."'";
		}
		if($txtEmpID !=''){
			$strSQL .= " AND empID = '".$txtEmpID."'";
		}
		$strSQL .= "GROUP BY TransferID";
$objQuery = mysql_query($strSQL) or die (mysql_error());

?>
<div align="center">
<table width="100%" border="0">
<form name="form1" method="post" action="deltransfer.php">
  <tr>
    <td><table width="100%" border="0">  	
      	<tr>
        	 <td colspan="5"><div align="center">
		<table  class="table table-bordered" >
  			<tr>
    			<th> <div align="center">ลบ</div></th>
    			<th> <div align="center">ลำดับที่โอน</div></th>
    			<th> <div align="center">วันที่เบิก</div></th>
    			<th> <div align="center">วันที่โอน</div></th>
          		<th> <div align="center">ใบสำคัญจ่าย</div></th>
    			<th> <div align="center">ค่าใช้จ่าย</div></th>
    			<th> <div align="center">ยอดเบิก</div></th>
          		<th> <div align="center">หัก</div></th>
         		<th> <div align="center">ยอดโอน</div></th>
    			<th> <div align="center">ค่าธรรมเนียม</div></th>
    			<th> <div align="center">เลขที่เบิก</div></th>
    			<th> <div align="center">คู่ค้า</div></th>
          		<th> <div align="center">หมายเหตุ</div></th>
    			<th> <div align="center">พนักงาน</div></th>
          		<th> <div align="center">ประเภทไซต์</div></th>
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
	$objQuery1 = mysql_query("SELECT * FROM transfer WHERE TransferID = '".$objResult["TransferID"]."'") or die (mysql_error());
	$objResult1 = mysql_fetch_array($objQuery1);

	$sel_Expenses = mysql_query("SELECT * FROM expenses WHERE `ExpensesID` = '".$objResult1["ExpensesID"]."'") or die (mysql_error());
    $ExpensesResult = mysql_fetch_array($sel_Expenses);

    $strSQL1 = "SELECT * FROM site_draw WHERE 1 ";
		if($objResult["TransferID"] !=''){
			$strSQL1 .= " AND TransferID = '".$objResult["TransferID"]."'";
		}
		if($txtSiteTypeID !=''){
			$strSQL1 .= " AND SiteTypeID = '".$txtSiteTypeID."'";
		}
		if($txtEmpID !=''){
			$strSQL1 .= " AND empID = '".$txtEmpID."'";
		}
	$sel_siteDraw = mysql_query($strSQL1) or die (mysql_error());
	$num = mysql_num_rows($sel_siteDraw) + 1;
?>
  			<tr>
  				<td rowspan="<?php echo $num;?>"><a href="deltransfer.php?TransferID=<?php echo $objResult["TransferID"];?>" target = "_blank"><img src = "images/no.jpg"></a></td>
    			<td rowspan="<?php echo $num;?>"><div align="center"><a href="transferupdate.php?TransferID=<?php echo $objResult["TransferID"] ; ?>" target = "_blank">
    			<?php echo $objResult["TransferID"];?> </a></div></td>
    	<?php 
            	$sel_partners = mysql_query("SELECT * FROM partners WHERE `PartnersID` = '".$objResult1["PartnersID"]."'") or die (mysql_error());
            	$partnersResult = mysql_fetch_array($sel_partners);

            	$sel_draw = mysql_query("SELECT * FROM drawmoney WHERE DrawID = '".$objResult1["DrawID"]."'") or die (mysql_error());
				$sel_drawResult1 = mysql_fetch_array($sel_draw);

    			$date2 = explode("-",$objResult1["TransferDate"]);
				$year2 = $date2['2'];
				$month2 = $date2['1'];
				$day2 = $date2['0'];
				$nTransferDate = $year2 . "-" . $month2. "-" . $day2 ;

				$date3 = explode("-",$sel_drawResult1["DrawDate"]);
				$year3 = $date3['2'];
				$month3 = $date3['1'];
				$day3 = $date3['0'];
				$nDrawDate = $year3 . "-" . $month3. "-" . $day3 ;

      	?>
    			<td rowspan="<?php echo $num;?>"><?php echo $nDrawDate; ?></td>
    			<td rowspan="<?php echo $num;?>"><?php echo $nTransferDate ; ?></td>
          		<td rowspan="<?php echo $num;?>"><?php echo $objResult1["Pay"] ; ?></td>
         		<td rowspan="<?php echo $num;?>"><?php echo $ExpensesResult["ExpensesName"] ; ?></td>
          		<td rowspan="<?php echo $num;?>"><?php echo $sel_drawResult1["Draw"] ; ?></td>
          		<td rowspan="<?php echo $num;?>"><?php echo $sel_drawResult1['DrawTax'] ;?></td>
    			<td rowspan="<?php echo $num;?>"><?php echo $objResult1["Transfer"] ; ?></td>
    			<td rowspan="<?php echo $num;?>"><?php echo $objResult1["Fee"] ; ?></td>
    			<td rowspan="<?php echo $num;?>"><?php echo $sel_drawResult1['DrawID'] ; ?></td>
    			<td rowspan="<?php echo $num;?>"><?php echo $partnersResult["PartnersName"] ; ?></td>
          		<td rowspan="<?php echo $num;?>"><?php echo $objResult1["TransferNote"] ; ?></td>
    <?php
        while($sel_siteDrawResult = mysql_fetch_array($sel_siteDraw))
    {
           $sel_sitetype = mysql_query("SELECT * FROM sitetype WHERE `SiteTypeID` = '".$sel_siteDrawResult["SiteTypeID"]."'") or die (mysql_error());
           $sitetypeResult = mysql_fetch_array($sel_sitetype);

           $sel_emp = mysql_query("SELECT * FROM employee WHERE `EmID` = '".$sel_siteDrawResult["empID"]."'") or die (mysql_error());
           $empResult = mysql_fetch_array($sel_emp);

    ?>
        <tr>
    			<td><?php echo $empResult["EmName"] ; ?></td>
    			<td><?php echo $sitetypeResult["SiteTypeName"] ; ?></td>
  		</tr>
<?php
}}
?>
		</table>
<?php
if ($txtSiteTypeID == '' && $txtEmpID == '') {
?>
<div align="center"><h4>รายงานการโอนที่ไม่มีใบเบิก</h4></div>
		<table class="table table-bordered">
		<tr>
    			<th> <div align="center">ลบ</div></th>
    			<th> <div align="center">ลำดับที่โอน</div></th>
    			<th> <div align="center">วันที่โอน</div></th>
          		<th> <div align="center">ใบสำคัญจ่าย</div></th>
    			<th> <div align="center">ค่าใช้จ่าย</div></th>
         		<th> <div align="center">ยอดโอน</div></th>
    			<th> <div align="center">ค่าธรรมเนียม</div></th>
          		<th> <div align="center">หมายเหตุ</div></th>
  			</tr>
		<?php
			$sel_transfer = mysql_query("SELECT * FROM transfer WHERE DrawID = '' AND `TransferDate` BETWEEN '".$nbeginDate."' AND '".$nendDate."'") or die (mysql_error());
			while($sel_transferResult = mysql_fetch_array($sel_transfer))
			{
		?>
			<td><a href="deltransfer.php?TransferID=<?php echo $sel_transferResult["TransferID"];?>" target = "_blank"><img src = "images/no.jpg"></a></td>
			<td><a href="transferupdate.php?TransferID=<?php echo $sel_transferResult["TransferID"] ; ?>" target = "_blank"><?php echo $sel_transferResult["TransferID"]?></a></td>
			<td><?php echo $sel_transferResult["TransferDate"] ;?></td>
			<td><?php echo $sel_transferResult["Pay"]?></td>
			<?php
				$sel_Expenses2 = mysql_query("SELECT * FROM expenses WHERE `ExpensesID` = '".$sel_transferResult["ExpensesID"]."'") or die (mysql_error());
    			$ExpensesResult2 = mysql_fetch_array($sel_Expenses2);
			?>
			<td><?php echo $ExpensesResult2["ExpensesName"]?></td>
			<td><?php echo $sel_transferResult["Transfer"]?></td>
			<td><?php echo $sel_transferResult["Fee"]?></td>
			<td><?php echo $sel_transferResult["TransferNote"]?></td>
		</tr>
		<?php } ?>
		</table>
<?php } ?>
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
