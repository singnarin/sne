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
$strSQL = "SELECT * FROM site_draw WHERE 1 ";
		if($nbeginDate !='' &&  $nendDate !=''){
			$strSQL .= " AND `DrawDate` BETWEEN '".$nbeginDate."' AND '".$nendDate."'";
		}
		if($txtSiteTypeID !=''){
			$strSQL .= " AND SiteTypeID = '".$txtSiteTypeID."'";
		}
		if($txtEmpID !=''){
			$strSQL .= " AND empID = '".$txtEmpID."'";
		}
		$strSQL .= "GROUP BY DrawID";
$objQuery = mysql_query($strSQL) or die (mysql_error());

?>
<div align="center">
<table width="100%" border="0">
<form name="form1" method="post" action="deldraw.php">
  <tr>
    <td><table width="100%" border="0">  	
      	<tr>
        	 <td colspan="5"><div align="center">
		<table class="table table-bordered" >
  			<tr>
    			<th> <div align="center">ลบ</div></th>
    			<th> <div align="center">เลขที่ขอเบิก</div></th>
    			<th> <div align="center">วันที่</div></th>
          		<th> <div align="center">ค่าใช้จ่าย</div></th>
    			<th> <div align="center">ส่งที่</div></th>
    			<th> <div align="center">ยอดเบิก</div></th>
          		<th> <div align="center">หัก</div></th>
         		<th> <div align="center">ยอดจ่าย</div></th>
          		<th> <div align="center">เงินโอน</div></th>
          		<th> <div align="center">หมายเหตุ</div></th>
          		<th> <div align="center">SiteCode</div></th>
          		<th> <div align="center">SiteName</div></th>
          		<th> <div align="center">ประเภทไซต์</div></th>
          		<th> <div align="center">พนักงาน</div></th>
    			<th> <div align="center">วางบิล</div></th>
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
	$objQuery1 = mysql_query("SELECT * FROM drawmoney WHERE DrawID = '".$objResult["DrawID"]."'") or die (mysql_error());
	$objResult1 = mysql_fetch_array($objQuery1);

	$sel_Expenses = mysql_query("SELECT * FROM expenses WHERE `ExpensesID` = '".$objResult1["ExpensesID"]."'") or die (mysql_error());
    $ExpensesResult = mysql_fetch_array($sel_Expenses);

    $strSQL1 = "SELECT * FROM site_draw WHERE 1 AND DrawID = '".$objResult["DrawID"]."'";
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
				<td rowspan="<?php echo $num;?>"><a href="deldraw.php?DrawID=<?php echo $objResult["DrawID"];?>" target = "_blank" onclick="window.reload();"><img src = "images/no.jpg"></a></td>
    			<td rowspan="<?php echo $num;?>"><div align="center"><?php echo $objResult["DrawID"];?></div></td>
    			<td rowspan="<?php echo $num;?>"><div align="center"><?php echo $objResult["DrawDate"];?></div></td>
    			<td rowspan="<?php echo $num;?>"><div align="center"><?php echo $ExpensesResult["ExpensesName"];?></div></td>
    			<td rowspan="<?php echo $num;?>"><div align="center"><?php echo $objResult1["SentAt"];?></div></td>
    			<td rowspan="<?php echo $num;?>"><div align="center"><?php echo $objResult1["Draw"];?></div></td>
    			<td rowspan="<?php echo $num;?>"><div align="center"><?php echo $objResult1["DrawTax"];?></div></td>
<?php
            $nDraw = $objResult1["Draw"] - $objResult1["DrawTax"];
?>
				<td rowspan="<?php echo $num;?>"><?php echo $nDraw ; ?></td>
				<td rowspan="<?php echo $num;?>">
           			<?php 
						if($objResult1['transtatus']>0){
								$sel_transfer = mysql_query("SELECT * FROM transfer WHERE `DrawID` = '".$objResult["DrawID"]."'") or die (mysql_error());
           						$transferResult = mysql_fetch_array($sel_transfer);
								echo $transferResult["TransferDate"];
						}else{
								echo "<img src='images/no.jpg'>";
						}
	      			?>
	     		</td>
	     		<td rowspan="<?php echo $num;?>"><?php echo $objResult1["DrawNote"] ; ?></td>

    		<?php
        while($sel_siteDrawResult = mysql_fetch_array($sel_siteDraw))
		{
		   $sel_site = mysql_query("SELECT * FROM site WHERE `SiteCode` = '".$sel_siteDrawResult["SiteCode"]."'") or die (mysql_error());
           $siteResult = mysql_fetch_array($sel_site);

           $sel_sitetype = mysql_query("SELECT * FROM sitetype WHERE `SiteTypeID` = '".$sel_siteDrawResult["SiteTypeID"]."'") or die (mysql_error());
           $sitetypeResult = mysql_fetch_array($sel_sitetype);

           $sel_emp = mysql_query("SELECT * FROM employee WHERE `EmID` = '".$sel_siteDrawResult["empID"]."'") or die (mysql_error());
           $empResult = mysql_fetch_array($sel_emp);

		?>
	    <tr>
          		<td><?php echo $sel_siteDrawResult["SiteCode"] ; ?></td>
          		<td><?php echo $siteResult["SiteName"] ; ?></td>
          		<td><?php echo $sitetypeResult["SiteTypeName"] ; ?></td>
    			<td><?php echo $empResult ["EmName"] ; ?></td>
    			<td>
          <?php 
			if(empty($sel_siteDrawResult['poID'])){
				echo "<img src='images/no.jpg'>";
			}else{
				echo $sel_siteDrawResult["poID"];
			}
	      ?>
          		</td>
  		</tr>
  		<?php } ?>

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
