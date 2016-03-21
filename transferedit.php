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
  var obj = new createobject(); 
   
  function createobject(Mode) { 
  var XMLHttp = false ; 
  if (window.XMLHttpRequest) { 
    XMLHttp = new XMLHttpRequest() ; 
  } else if (window.ActiveXobject) { 
    XMLHttp = new ActiveXobject("Microsoft.XMLHTTP") ;   
  } else { 
    alert ("Browser ไม่สามารถรองรับการท างาน Ajax ได้") ;    
  } 
  return XMLHttp ; 
  } 
   
  function getData() { 
  if(obj) { 
   var url = "transferedit1.php"; 
   var area = document.getElementById("show") ; 
   var params =  "dateInput3=" + document.getElementById("dateInput3").value + "&dateInput4=" + document.getElementById("dateInput4").value + "&txtSiteTypeID=" + document.getElementById("txtSiteTypeID").value + "&txtEmpID=" + document.getElementById("txtEmpID").value; 
     
    obj.open("POST", url, true) ; 
    obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    obj.setRequestHeader("Content-length", params.length); 
    obj.setRequestHeader("Connection","close");  
    obj.send(params) ;  
 
    obj.onreadystatechange = function() { 
    if (obj.readyState == 3 ){ 
      area.innerHTML = "กาลังโหลดข้อมูล..." ;   
    } 
      if (obj.readyState == 4 ) { 
        area.innerHTML = obj.responseText ; 
        document.getElementById("dateInput3").value = '' ; 
        document.getElementById("dateInput4").value = '' ;
        document.getElementById("txtSiteTypeID").value = '' ; 
        document.getElementById("txtEmpID").value = '' ;
     } 
    } 
  }   
  }

  function ExportData() { 
   window.location =  "transferExport.php?dateInput3=" + document.getElementById("dateInput3").value + "&dateInput4=" + document.getElementById("dateInput4").value + "&txtSiteTypeID=" + document.getElementById("txtSiteTypeID").value + "&txtEmpID=" + document.getElementById("txtEmpID").value ;  
  }
  function OpenPopup1()
	{
		window.open('getDataEmp.php','myPopup','width=650,height=800,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
</script>
</head>
<body onload="createobject('List')"> 
<?php include("cssmenu/menu.php"); ?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" target="ifrm"> 
<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  		<tr>
        		<td colspan="5"><div align="center">แบบรายงานการโอนเงิน</div></td>
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
        	 <td colspan="5"><div align="center">
        	 เลือกงาน 
        	<select id="txtSiteTypeID" name="txtSiteTypeID">
		    <option  value="">- กรุณาเลือก -</option>
				<?php
					$query_list=mysql_query("Select * From sitetype order by SiteTypeID");
						while($sl < mysql_num_rows($query_list)){
							$arrL= mysql_fetch_array($query_list);
			?>
              <option value="<?php echo $arrL['SiteTypeID'];?>"><?php echo $arrL['SiteTypeName'];?></option>
<?php
$sl++;
}
?>
          </select>
        	 เลือกพนักงาน
        	 <input type="hidden" name="txtEmpID" id="txtEmpID" />
		  <input type="text" name="txtEmpName" id="txtEmpName" readonly="readonly" />
		  <INPUT TYPE="BUTTON" NAME="btnPopup_1"  ID="btnPopup_0" VALUE="..." OnClick="OpenPopup1()"></td>
       	</tr>
       	<tr>
        	 <td colspan="5"><div align="center">
        	 <div align="center"><input class="btn btn-primary" type="button" name="button" id="button" value="ค้นหาข้อมูล" onclick="getData()" />
        	 <input class="btn btn-primary" type="button" name="button" id="button" value="ExportData" onclick="ExportData()" />
        	 </div></td>
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
<div id="show"></div>
</body>

</html>
