<?php
include("include/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SNE Management System</title>
</head>
<body>
<?php 

$beginDate = $_POST["dateInput3"];
$endDate = $_POST["dateInput4"];

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

$objQuery = mysql_query("SELECT * FROM oder WHERE `OderDate` BETWEEN '".$nbeginDate."' AND '".$nendDate."'") or die (mysql_error());

?>
<div align="center">
<table width="100%" border="0">
<form name="form1" method="post" action="deloder.php">
  <tr>
    <td><table width="100%" border="0">  	
      	<tr>
        	 <td colspan="5"><div align="center">
		<table border="1" bordercolor="#0000FF" style="border-collapse:collapse;" >
  			<tr>
    			<th> <div align="center">ลบ</div></th>
    			<th> <div align="center">เลขที่ใบสั่งซื้อ</div></th>
    			<th> <div align="center">วันที่</div></th>
    			<th> <div align="center">บริษัทคู่ค้า</div></th>
    			<th> <div align="center">ประเภทไซต์</div></th>
          <th> <div align="center">พนักงาน</div></th>
          <th> <div align="center">หมายเหตุ</div></th>
          		
  			</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  			<tr>
  				<td><input name="chkDel[]" type="checkbox" value="<?php echo $objResult["OderID"] ?>"></td>
    			<td><div align="center"><a href="oderupdate.php?OderID=<?php echo $objResult["OderID"] ; ?>" target = "_blank"><?php echo $objResult["OderID"];?> </a></div></td>
    			<td>
    			<?php 
    			$date2 = explode("-",$objResult["OderDate"]);
				  $year2 = $date2['2'];
				  $month2 = $date2['1'];
				  $day2 = $date2['0'];
				  $nDate2 = $year2 . "-" . $month2. "-" . $day2 ;
    			echo $nDate2 ; ?>
    			</td>
    			<?php
    				$sel_partners = mysql_query("SELECT * FROM partners WHERE `PartnersID` = '".$objResult["PartnersID"]."'") or die (mysql_error());
    				$partnersResult = mysql_fetch_array($sel_partners);
    			?>
    			<td><?php echo $partnersResult["PartnersName"] ; ?></td>
          <?php
        $sel_sitetype = mysql_query("SELECT * FROM sitetype WHERE `SiteTypeID` = '".$objResult["SiteTypeID"]."'") or die (mysql_error());
        $sitetypeResult = mysql_fetch_array($sel_sitetype);
          ?>
    			<td><?php echo $sitetypeResult["SiteTypeName"];?></td>
          <?php
            $sel_emp = mysql_query("SELECT * FROM employee WHERE `EmID` = '".$objResult["EmpID"]."'") or die (mysql_error());
            $empResult = mysql_fetch_array($sel_emp);
          ?>
    			<td><?php echo $empResult["EmName"] ; ?></td>
    			<td><?php echo $objResult["OderNote"] ; ?></td>
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
    <td><div align="center">
    <input name="Submit" type="submit" value="คลิกที่นี่ เพื่อลบใบสั่งซื้อ">
	</div></td>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form
</div>
<?php
mysql_close($Conn); 
?>
</body>

</html>
