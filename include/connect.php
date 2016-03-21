<?php

// เชื่่อมต่อฐานข้อมูล
$host="localhost"; // กำหนด host
$username="root"; // กำหนด username
$pass_word="tootuu7413"; // กำหนด Password
$db="sne_db"; // กำหนดชื่อฐานข้อมูล
$Conn = mysql_connect( $host,$username,$pass_word) or die ("ติดต่อฐานข้อมูลไม่ได้");// ติดต่อฐานข้อมูล
mysql_query("SET NAMES utf8",$Conn); // set กำหนดมาตราฐาน
mysql_select_db($db) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล
//--->

?>