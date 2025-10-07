<?php 
include('../conn.php');

$Appointment_ID 	  = $_GET['id'];
$status 	          = $_GET['status'];


$insert = "UPDATE `appointments` SET `status`='".$status."' WHERE `Appointment_ID`='".$Appointment_ID."'";
if ($conn->query($insert) === true) {
  echo "
    <script>
      alert('บันทึกข้อมูลเรียบร้อย')
      window.location.href = 'list_appointments.php'
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