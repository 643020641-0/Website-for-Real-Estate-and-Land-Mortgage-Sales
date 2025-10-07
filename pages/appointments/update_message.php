<?php 
include('../conn.php');

$id 	  = $_GET['id'];
$status 	          = $_GET['status'];


$insert = "UPDATE `messages` SET `status`='".$status."' WHERE `id`='".$id."'";
if ($conn->query($insert) === true) {
  echo "
    <script>
      alert('บันทึกข้อมูลเรียบร้อย')
      window.location.href = 'list_admin_appointments.php'
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