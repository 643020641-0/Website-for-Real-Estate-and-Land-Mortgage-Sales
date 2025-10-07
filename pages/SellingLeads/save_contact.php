<?php 
include('../conn.php');

$houseandland_id 			= $_POST['houseandland_id'];
$Customer_full_name 		= $_POST['Customer_full_name'];
$Customer_email 			= $_POST['Customer_email'];
$Customer_tel 				= $_POST['Customer_tel'];
$Appointment_Date_time 		= $_POST['Appointment_Date_time'];
$note 						= $_POST['note'];
$houseandland_id 			= $_POST['houseandland_id'];
$status 					= "รอติดต่อกลับ";


$Appointment_Date = date('Y-m-d', strtotime($Appointment_Date_time));
$Appointment_Time = date('H:i', strtotime($Appointment_Date_time));


$insert = "INSERT INTO `appointments`(`Appointment_Date`, `Appointment_Time`, `houseandland_id`, `Customer_full_name`, `Customer_email`, `Customer_tel`, `status`, `note`) VALUES ('".$Appointment_Date."','".$Appointment_Time."','".$houseandland_id."','".$Customer_full_name."','".$Customer_email."','".$Customer_tel."','".$status."','".$note."')";


if ($conn->query($insert) === true) {
  echo "
    <script>
      alert('บันทึกข้อมูลเรียบร้อย')
      window.location.href = '/$project_name/'
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