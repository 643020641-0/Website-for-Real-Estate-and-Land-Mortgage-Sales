<?php 
include('../conn.php');

$user_id 	= $_GET['id'];
$status 	= $_GET['status'];


$insert = "UPDATE `users` SET `status`='".$status."' WHERE `user_id`='".$user_id."'";
if ($conn->query($insert) === true) {
  echo "
    <script>
      alert('บันทึกข้อมูลเรียบร้อย')
      window.location.href = 'index_users.php'
    </script>
  ";
}else{
	echo "Error: " . $insert . "<br>" . $conn->error;
  	// echo "
    //     <script>
    //       alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
    //       window.location.href = 'form_SellingLeads.php'
    //     </script>
  	// ";
}

?>