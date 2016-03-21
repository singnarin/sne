<?php
include("include/connect.php");
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
</head>
<body> 
<?php include("cssmenu/menu.php"); ?>
<form action="poedit1.php" method="post" name="form1" id="form1" target="ifrm"> 
<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  		<tr>
        		<td colspan="5"><div align="center">แบบรายงานการวางบิล</div></td>
        </tr>
      	<tr>
        	 <td colspan="5"><div align="center">เลือกช่วงวันที่</td>
       	</tr>
       	<tr>
        	 <td colspan="5"><div align="center">
        	 ระหว่างวันที่
        	 <input name="dateInput3" type="text" id="dateInput3" value="" readonly="readonly" >
        	 ถึงวันที่
        	 <input name="dateInput4" type="text" id="dateInput4" value="" readonly="readonly" >
		  	<?php  include ("include/calendaScript.php"); ?></td>
       	</tr>
       	<tr>
        	 <td colspan="5"><div align="center"><input name="Submit" type="submit" value="OK"></div></td>
       	</tr>
       	</form>
		</table>
	</td>
  </tr>
</table>
</div>
<?php
mysql_close($Conn); 
?>
<div align="left"><iframe id="iframe_target" name="ifrm" src="#" height="900" width="1500" scrolling="no" frameborder="no"></iframe></div>
</body>

</html>
