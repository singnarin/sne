<?php
include("include/connect.php");

$objQuery = mysql_query("SELECT * FROM persen WHERE persenID = 'BWLANST003' ") or die (mysql_error());
$siteResult = mysql_fetch_array($objQuery) or die (mysql_error());

//echo "----->".$siteResult['persenID'];

echo substr($siteResult['persenID'],-5 , 20);

echo "sdjflsdfsdkfjls";
?>