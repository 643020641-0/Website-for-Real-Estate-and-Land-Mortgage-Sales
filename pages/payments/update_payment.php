<?php 
include('../conn.php');

$payment_id 	  = $_GET['id'];
$status 	      = "ตรวจสอบเรียบร้อย";

$payments = $conn->query("SELECT * FROM `payments` WHERE `payment_id` = '".$payment_id ."'");
$row_payment = $payments->fetch_array(); 

$users = $conn->query("SELECT * FROM `users` WHERE `user_id` = '".$row_payment["user_id"]."'");
$row_user = $users->fetch_array(); 

$new_token = $row_user['token']+$row_payment['token'];

$update = "UPDATE `users` SET `token`='".$new_token."' WHERE `user_id`='".$row_user['user_id']."'";
$insert = "UPDATE `payments` SET `payment_status`='".$status."' WHERE `payment_id`='".$payment_id."'";

if ($conn->query($update) === true && $conn->query($insert) === true) {
      echo "
        <script>
          alert('บันทึกข้อมูลเรียบร้อย')
          window.location.href = 'list_admin_payments.php'
        </script>
      ";
    
}else{
	  echo "Error: " . $insert . "<br>" . $conn->error;
  	echo "
        <script>
          alert('บันทึกข้อมูลเรียบร้อย')
          window.location.href = 'list_admin_payments.php'
        </script>
      ";
}

?>