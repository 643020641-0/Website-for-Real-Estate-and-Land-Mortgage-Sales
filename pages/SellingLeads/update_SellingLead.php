<?php 
include('../conn.php');

$houseandland_id 	  = $_GET['id'];
$status 	          = $_GET['status'];

$houseandlans = $conn->query("SELECT * FROM `houseandlands` WHERE `houseandland_id` = '".$houseandland_id."'");
$houseandlan = $houseandlans->fetch_array(); 

$users = $conn->query("SELECT * FROM `users` WHERE `user_id` = '".$row_payment["user_id"]."'");
$row_user = $users->fetch_array(); 

if ($status == 'อนุมัติ') {
  $new_token = $row_user['token']-1;
}else{
  $new_token = $row_user['token'];
}


$update = "UPDATE `users` SET `token`='".$new_token."' WHERE `user_id`='".$row_user['user_id']."'";
$insert = "UPDATE `houseandlands` SET `Status`='".$status."' WHERE `houseandland_id`='".$houseandland_id."'";

if ($conn->query($update) === true && $conn->query($insert) === true) {
  echo "
    <script>
      alert('บันทึกข้อมูลเรียบร้อย')
      window.location.href = 'List_all_SellingLeads.php'
    </script>
  ";
}else{
	// echo "Error: " . $insert . "<br>" . $conn->error;
  echo "
    <script>
      alert('บันทึกข้อมูลเรียบร้อย')
      window.location.href = 'List_all_SellingLeads.php'
    </script>
  ";
}

?>