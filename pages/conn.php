<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LandScoutDB";
$timezone = date_default_timezone_set("Asia/Bangkok");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$project_name = "LandScouts";

$array_categority = ['คอนโดมิเนียม','บ้านเดี่ยว','บ้านแฝด','ทาวน์เฮาส์-ทาวน์โฮม','ที่ดินเปล่า'];

$arr_month = ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];

$max_years = array_combine(range(date("Y"), 2012), range(date("Y"), 2012));


$ArrUser = array("admin"=>"ผู้ดูแลระบบ","sale"=>"ผู้ฝากขาย");


$tokens = [
             1 => 50,
             5 => 200,
             10 => 350,
             20 => 600,
             50 => 1250,
             100 => 2000
          ];
?>