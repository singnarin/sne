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

$objQuery = mysql_query("SELECT * FROM po_in WHERE `poDateIn` BETWEEN '".$nbeginDate."' AND '".$nendDate."'") or die (mysql_error());

?>
<div align="center">
<table width="100%" border="0">
<form name="form1" method="post" action="poindel.php">
  <tr>
    <td><table width="100%" border="0">  	
      	<tr>
        	 <td colspan="5"><div align="center">
		<table class="table table-bordered">
  			<tr>
    			<th> <div align="center">ลบ</div></th>
    			<th> <div align="center">เลขที่</div></th>
    			<th> <div align="center">วันที่รับ</div></th>
         		<th> <div align="center">ราคาไซต์</div></th>
         		<th> <div align="center">ใบสั่งซื้อราคา</div></th>
    			<th> <div align="center">หมายเหตุ</div></th>
         		<th> <div align="center">รหัสคู่ค้า</div></th>
         		<th> <div align="center">ชื่อคู่ค้า</div></th>
         		<th> <div align="center">วันที่วางบิล</div></th>
         		<th> <div align="center">ยอดวางบิล</div></th>
            	<th> <div align="center">VAT 7%</div></th>
         		<th> <div align="center">ยอดรวม</div></th> 
         		<th> <div align="center">ประเภทไซต์</div></th>
         	</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
        $sel_po = mysql_query("SELECT * FROM po WHERE `poID` = '".$objResult["poID"]."'") or die (mysql_error());
        $num = mysql_num_rows($sel_po) +1;
?>
  			<tr>
          	 	<td rowspan="<?php echo $num; ?>"><a href="podel.php?poID=<?php echo $objResult["poID"];?>" target = "_blank"><img src = "images/no.jpg"></a></td>
    			<td rowspan="<?php echo $num; ?>"><div align="center"><?php echo $objResult["poID"];?> </td>
          	 	<td rowspan="<?php echo $num; ?>">
    			<?php 
    				$date2 = explode("-",$objResult["poDateIn"]);
				  	$year2 = $date2['2'];
				  	$month2 = $date2['1'];
				  	$day2 = $date2['0'];
				 	  $nDate2 = $year2 . "-" . $month2. "-" . $day2 ;
    				echo $nDate2 ; 
    			?>
          		</td>
    			<td rowspan="<?php echo $num; ?>"><?php echo $objResult["priceSite"] ; ?></td>
    			<td rowspan="<?php echo $num; ?>"><?php echo $objResult["priceOrder"] ; ?></td>
          		<td rowspan="<?php echo $num; ?>"><?php echo $objResult["poInNote"] ; ?></td>
<?php
          	while($poResult = mysql_fetch_array($sel_po)){

				$vat7 = $poResult["po"] * 7 / 100;
				$sumpovat = $poResult["po"] + $vat7 ;
?>
      		<tr>
          		<td><?php echo $poResult["PartnersID"] ; ?></td>
          		<td><?php echo $poResult["PartnersID"] ; ?></td>
          		<td><?php echo $poResult["poDate"] ; ?></td>
          		<td><?php echo $poResult["po"] ; ?></td>
    			<td><?php echo $vat7 ; ?></td>
          		<td><?php echo $sumpovat ; ?></td>
    			<td><?php echo "ประเภทไซต์";?></td>
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
