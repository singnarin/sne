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
$strSQL = "SELECT * FROM transfer WHERE 1 ";
	if($nbeginDate !='' &&  $nendDate !=''){
			$strSQL .= " AND `TransferDate` BETWEEN '".$nbeginDate."' AND '".$nendDate."'";
		}
		if($txtSiteTypeID !=''){
			$strSQL .= " AND SiteTypeID = '".$txtSiteTypeID."'";
		}
		if($txtEmpID !=''){
			$strSQL .= " AND empID = '".$txtEmpID."'";
		}
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
    			<th> <div align="center">พนักงาน</div></th>

          		<th> <div align="center">ประเภทไซต์</div></th>
          		<th> <div align="center">หมายเหตุ</div></th>
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  			<tr>
  				<td><a href="deltransfer.php?TransferID=<?php echo $objResult["TransferID"];?>" target = "_blank" onclick="window.reload();"><img src = "images/no.jpg"></a></td>
    			<td><div align="center"><a href="transferupdate.php?TransferID=<?php echo $objResult["TransferID"] ; ?>" target = "_blank"><?php echo $objResult["TransferID"];?> </a></div></td>
    	<?php 
				$sel_draw = mysql_query("SELECT * FROM drawmoney WHERE `DrawID` = '".$objResult["DrawID"]."'") or die (mysql_error());
            	$drawResult = mysql_fetch_array($sel_draw);

            	$sel_emp = mysql_query("SELECT * FROM employee WHERE `EmID` = '".$drawResult["empID"]."'") or die (mysql_error());
            	$empResult = mysql_fetch_array($sel_emp);

            	$sel_Expenses = mysql_query("SELECT * FROM expenses WHERE `ExpensesID` = '".$drawResult["ExpensesID"]."'") or die (mysql_error());
    			$ExpensesResult = mysql_fetch_array($sel_Expenses);

    			$sel_site = mysql_query("SELECT * FROM site WHERE `SiteCode` = '".$drawResult["SiteCode"]."'") or die (mysql_error());
            	$siteResult = mysql_fetch_array($sel_site);

    			$sel_sitetype = mysql_query("SELECT * FROM sitetype WHERE `SiteTypeID` = '".$siteResult["SiteTypeID"]."'") or die (mysql_error());
            	$sitetypeResult = mysql_fetch_array($sel_sitetype);

            	$sel_partners = mysql_query("SELECT * FROM partners WHERE `PartnersID` = '".$objResult["PartnersID"]."'") or die (mysql_error());
            	$partnersResult = mysql_fetch_array($sel_partners);

    			$date2 = explode("-",$objResult["TransferDate"]);
				$year2 = $date2['2'];
				$month2 = $date2['1'];
				$day2 = $date2['0'];
				$nTransferDate = $year2 . "-" . $month2. "-" . $day2 ;

				$date3 = explode("-",$drawResult["DrawDate"]);
				$year3 = $date3['2'];
				$month3 = $date3['1'];
				$day3 = $date3['0'];
				$nDrawDate = $year3 . "-" . $month3. "-" . $day3 ;
    		 
      ?>
    			<td><?php echo $nDrawDate; ?></td>
    			<td><?php echo $nTransferDate ; ?></td>
          		<td><?php echo $objResult["Pay"] ; ?></td>
          		<td><?php echo $ExpensesResult["ExpensesName"] ; ?></td>

          		<td><?php echo $drawResult["Draw"] ; ?></td>

          		<td><?php echo $drawResult['DrawTax'] ;?></td>
    			<td><?php echo $objResult["Transfer"] ; ?></td>
    			<td><?php echo $objResult["Fee"] ; ?></td>

    			<td><?php echo $drawResult['DrawID'] ; ?></td>
    			<td><?php 

    			echo $partnersResult["PartnersName"] ; ?></td>
    			<td><?php echo $empResult["EmName"] ; ?></td>

    			<td><?php echo $sitetypeResult["SiteTypeName"] ; ?></td>
    			<td><?php echo $objResult["TransferNote"] ; ?></td>
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
