<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
for($i=1;$i<=(int)$_POST["hdnMaxLine"];$i++)
{
	echo $_POST["txtDrawID_".$i];
	echo "<br>";
	echo $_POST["txtDraw_".$i];
	echo "<br>";
	echo $_POST["txtSiteCode_".$i];
	echo "<br>";
	echo $_POST["txtSiteName_".$i];
	echo "<hr>";
}
?>
</body>
</html>
