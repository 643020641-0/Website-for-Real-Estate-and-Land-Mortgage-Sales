<?php
include ("../conn.php");

$houseandland_id = $_REQUEST['id'];

$DeleteCategory = "DELETE FROM `houseandlands` WHERE `houseandland_id` = '".$houseandland_id."'";

if ($conn->query($DeleteCategory) === TRUE) { //เช็คว่าสามารถบันทึกข้อมูลได้ไหม
	echo "<script>
		alert('ลบข้อมูลาเรียบร้อย');
		window.location.href='Index_SellingLeads.php';
		</script>";
} else {
	echo "Error: " . $DeleteCategory . "<br>" . $conn->error;
} // end เช็คว่าสามารถบันทึกข้อมูลได้ไหม	
?>