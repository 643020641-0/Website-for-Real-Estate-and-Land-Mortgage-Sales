<?php
include ("../conn.php");

$user_id = $_REQUEST['id'];

$deleteuser = "DELETE FROM `users` WHERE `user_id` = '".$user_id."'";

if ($conn->query($deleteuser) === TRUE) { //เช็คว่าสามารถบันทึกข้อมูลได้ไหม
	echo "<script>
		alert('ลบข้อมูลาเรียบร้อย');
		window.location.href='index_users.php';
		</script>";
} else {
	echo "Error: " . $deleteuser . "<br>" . $conn->error;
} // end เช็คว่าสามารถบันทึกข้อมูลได้ไหม	
?>