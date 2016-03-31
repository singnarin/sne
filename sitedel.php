<?php
include("include/connect.php");

for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			 mysql_query("DELETE FROM site WHERE SiteCode = '".$_POST["chkDel"][$i]."'");
		}
	}
	$message = "OK!!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=siteedit.php'>";
?>