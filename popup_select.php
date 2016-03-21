    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
    <html xmlns="http://www.w3.org/1999/xhtml">  
    <head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    <title>popup select</title>  
    </head>  
      
    <body>  
    <?php  
    $target=$_GET['target'];  
    ?>  
    <script language="javascript" src="js/jquery-1.4.1.min.js"></script>  
    <script type="text/javascript">  
    function returnData(indexTarget,data){  
        $(".text_data",window.opener.document).eq(<?php =$target?>).val(data);  
        window.close();  
    }  
    </script>  
    <table width="400" border="0" cellspacing="0" cellpadding="0">  
      <tr>  
        <td width="88" align="left">  
        <input type="button" name="button" id="button" onclick="returnData(<?php =$target?>,'data1');" value="Select" />  
        </td>  
        <td width="312" align="left">data1</td>  
      </tr>  
      <tr>  
        <td align="left">  
        <input type="button" name="button" id="button" onclick="returnData(<?php =$target?>,'data2');" value="Select" />  
        </td>  
        <td align="left">data2</td>  
      </tr>  
      <tr>  
        <td align="left">  
        <input type="button" name="button" id="button" onclick="returnData(<?php =$target?>,'data3');" value="Select" />  
        </td>  
        <td align="left">data3</td>  
      </tr>  
    </table>  
    </body>  
    </html>  