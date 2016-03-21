<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>jquery add remove row</title>  
</head>  
  
<body>  
  
  
  
  
  
<form id="form1" name="form1" method="post" action="">  
<table id="myTbl" width="650" border="1" cellspacing="2" cellpadding="0">  
  <tr id="firstTr">  
    <td width="119"><select name="data1[]" id="data1[]">  
      <option value="1">data1</option>  
      <option value="2">data2</option>  
    </select></td>  
    <td width="519"><input type="text" class="text_data" name="data2[]" id="data2[]" />  
    <input type="button" name="button" id="button" class="ipopup"  value="Button" /></td>  
    </tr>  
</table>  
<br />  
<table width="500" border="0" cellspacing="0" cellpadding="0">  
  <tr>  
    <td>  
    <button id="addRow" type="button">+</button>    
    <button id="removeRow" type="button">-</button>  
    <button id="Submit" type="submit">Submit</button>      
    </td>  
  </tr>  
</table>  
</form>  
<pre>  
<?php print_r($_POST); ?>  
</pre>  
<br />  
<script language="javascript" src="js/jquery-1.4.1.min.js"></script>  
<script type="text/javascript">  
$(function(){  
    $("#addRow").click(function(){  
        $("#myTbl").append($("#firstTr").clone());  
    });  
    $("#removeRow").click(function(){  
        if($("#myTbl tr").size()>1){  
            $("#myTbl tr:last").remove();  
        }else{  
            alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");  
        }  
    });   
      
    // onclick="popup('popup_select.php',600,300);"   
    $(".ipopup").live("click",function(){  
        var indexThis=$(".ipopup").index(this);  
        popup('popup_select.php?target='+indexThis,600,300);  
    });  
});  
</script>  
<script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){      
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;   
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;     
    properties = "width="+windowWidth+",height="+windowHeight;  
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;     
    window.open(url,name,properties);  
}  
</script>  
<?php  
//echo strtotime("2010-07-21");  
?>  
</body>  
</html> 