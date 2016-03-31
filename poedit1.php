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

$objQuery = mysql_query("SELECT * FROM po WHERE `poDate` BETWEEN '".$nbeginDate."' AND '".$nendDate."'") or die (mysql_error());

?>
<div align="center">
<table width="100%" border="0">
<form name="form1" method="post" action="podel.php">
  <tr>
    <td><table width="100%" border="0">  	
      	<tr>
        	 <td colspan="5"><div align="center">
		<table class="table table-bordered">
  			<tr>
    			<th> <div align="center">ลบ</div></th>
    			<th> <div align="center">เลขที่Po</div></th>
    			<th> <div align="center">วันที่</div></th>
         		<th> <div align="center">กำกับ</div></th>
         		<th> <div align="center">ยอดใบกำกับ</div></th>
    			<th> <div align="center">ใบเสร็จ</div></th>
         		<th> <div align="center">ยอดใบเสร็จ</div></th>
         		<th> <div align="center">ยอด Matt</div></th>
         		<th> <div align="center">ยอด Service</div></th>
         		<th> <div align="center">ชื่อคู่ค้า</div></th>
         		<th> <div align="center">ยอด</div></th>
            	<th> <div align="center">วางค่า</div></th>
         		<th> <div align="center">หมายเหตุ</div></th> 
         		<th> <div align="center">SiteCode</div></th>     
         		<th> <div align="center">SiteName</div></th>
         		<th> <div align="center">ประเภทไซต์</div></th>	
         		<th> <div align="center">พนักงาน</div></th>
         	</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
	  	$sel_partners = mysql_query("SELECT * FROM partners WHERE `PartnersID` = '".$objResult["PartnersID"]."'") or die (mysql_error());
    	$partnersResult = mysql_fetch_array($sel_partners);
        	$sel_persen = mysql_query("SELECT * FROM persen WHERE `po` = '".$objResult["poNo"]."'") or die (mysql_error());
        	$num = mysql_num_rows($sel_persen) +1;
        	$numSite = $num - 1 ;
?>
  			<tr>
          	 <td rowspan="<?php echo $num; ?>"><a href="podel.php?poID=<?php echo $objResult["poID"];?>&numSite=<?php echo $numSite;?>&poNo=<?php echo $objResult['poNo'];?>" target = "_blank"><img src = "images/no.jpg"></a></td>
    			   <td rowspan="<?php echo $num; ?>"><div align="center"><?php 
    			   echo $objResult["poID"];?> </td>
          	 <td rowspan="<?php echo $num; ?>">
    			<?php 
    				$date2 = explode("-",$objResult["poDate"]);
				  	$year2 = $date2['2'];
				  	$month2 = $date2['1'];
				  	$day2 = $date2['0'];
				 	  $nDate2 = $year2 . "-" . $month2. "-" . $day2 ;
    				echo $nDate2 ; 
    			?>
          		</td>
    			      <td rowspan="<?php echo $num; ?>"><?php echo $objResult["NoIn"] ; ?></td>
    			      <td rowspan="<?php echo $num; ?>"><?php echo $objResult["NoInNum"] ; ?></td>
          		  <td rowspan="<?php echo $num; ?>"><?php echo $objResult["TaxIn"] ; ?></td>
          		  <td rowspan="<?php echo $num; ?>"><?php echo $objResult["TaxInNum"] ; ?></td>
          		  <td rowspan="<?php echo $num; ?>"><?php echo $objResult["Matt"] ; ?></td>
          		  <td rowspan="<?php echo $num; ?>"><?php echo $objResult["Service"] ; ?></td>
          		  <td rowspan="<?php echo $num; ?>"><?php echo $partnersResult["PartnersName"] ; ?></td>
    			      <td rowspan="<?php echo $num; ?>"><?php echo $objResult["po"] ; ?></td>
          		  <td rowspan="<?php echo $num; ?>"><?php echo $objResult["project"] ; ?></td>
    			      <td rowspan="<?php echo $num; ?>"><?php echo $objResult["poNote"] ; ?></td>
    		
<?php
          	while($persenResult = mysql_fetch_array($sel_persen)){
?>
      <tr>
				<td>
					<?php 
						$sel_site = mysql_query("SELECT * FROM site WHERE `SiteCode` = '".substr($persenResult['persenID'],0 , -5)."'") or die (mysql_error());
						$siteResult = mysql_fetch_array($sel_site);

						$sel_sitetype = mysql_query("SELECT * FROM sitetype WHERE `SiteTypeID` = '".substr($persenResult['persenID'],-5 , 20)."'") or die (mysql_error());
						$sitetypeResult = mysql_fetch_array($sel_sitetype);

						$sel_emp = mysql_query("SELECT * FROM employee WHERE `EmID` = '".$siteResult["EmID"]."'") or die (mysql_error());
						$empResult = mysql_fetch_array($sel_emp);

 				echo substr($persenResult['persenID'],0 , -5); ?>
				</td>
				<td><?php echo $siteResult['SiteName'] ; ?></td>
				<td><?php echo $sitetypeResult['SiteTypeName']; ?></td>
				<td><?php echo $empResult['EmName']; ?></td>
  	</tr>
<?php
          }
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
mysql_close($Conn); 
}
?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
