<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>  
<script src="js/jqueryui_datepicker_thai.js"></script>  
<script type="text/javascript">  
$(function(){  
      
    $("#dateInput").datepicker({  
        dateFormat: 'dd-mm-yy',  
        showOn: 'button',  
//      buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',  
        buttonImageOnly: false,  
        changeMonth: true,  
        changeYear: true,
		yearRange: "1900:2015" 
    }); 
	$("#dateInput3").datepicker({  
        dateFormat: 'dd-mm-yy',  
        showOn: 'button',  
//      buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',  
        buttonImageOnly: false,  
        changeMonth: true,  
        changeYear: true  
    });     
});  
</script>