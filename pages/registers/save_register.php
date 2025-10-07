<?php 
include('../conn.php');

$full_name    = $_POST['full_name'];
$tel          = $_POST['tel'];
$email        = $_POST['email'];
$ID_Line      = $_POST['ID_Line'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$access_level = 'sale';
$status 	  = 'รออนุมัติ';

$results = $conn->query("SELECT * FROM `users` WHERE `full_name` ='".$full_name."' '");
if ($results !== false && $results->num_rows > 0){
	echo "
      <script>
        alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
        window.location.href = 'form_register.php'
      </script>
    ";
	
}else{
	$insert = "INSERT INTO `users`(`full_name`, `tel`, `email`, `ID_Line`, `username`, `password`, `access_level`, `status`) VALUES ('".$full_name."','".$tel."','".$email."','".$ID_Line."','".$username."','".$password."','".$access_level."','".$status."')";

	if ($conn->query($insert) === true) {
      echo "
        <script>
          alert('สมัครสมาชิกเรียบร้อย กรุณารอแอดมินตรวจาสอบข้อมูล ภายใน 24 ชั่วโมง \\n เพื่อเริ่มใช้งานระบบ')
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

}