<?php 
include('../conn.php');

$user_id      = $_POST['user_id'];
$full_name    = $_POST['full_name'];
$tel          = $_POST['tel'];
$email        = $_POST['email'];
$ID_Line      = $_POST['ID_Line'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$access_level = $_POST['access_level'];
$status 			= 'อนุมัติ';


if ($user_id != "") {
	$results = $conn->query("SELECT * FROM `users` WHERE `full_name` ='".$full_name."' AND `user_id` != '".$user_id."' ");
	if ($results !== false && $results->num_rows > 0){
		echo "
          <script>
            alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
            window.location.href = 'form_user.php?id=$user_id'
          </script>
        ";
		
	}else{
		$insert = "UPDATE `users` SET `full_name`='".$full_name."',`tel`='".$tel."',`email`='".$email."',`ID_Line`='".$ID_Line."',`username`='".$username."',`password`='".$password."',`access_level`='".$access_level."' WHERE `user_id`='".$user_id."'";
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
	}
}else{
	$results = $conn->query("SELECT * FROM `users` WHERE `full_name` ='".$full_name." '");
	if ($results !== false && $results->num_rows > 0){
		echo "
          <script>
            alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
            window.location.href = 'form_user.php'
          </script>
        ";
		
	}else{
		$insert = "INSERT INTO `users`(`full_name`, `tel`, `email`, `ID_Line`, `username`, `password`, `access_level`, `status`) VALUES ('".$full_name."','".$tel."','".$email."','".$ID_Line."','".$username."','".$password."','".$access_level."','".$status."')";
		if ($conn->query($insert) === true) {
	      echo "
	        <script>
	          alert('บันทึกข้อมูลเรียบร้อย')
	          window.location.href = 'index_users.php'
	        </script>
	      ";
	    }else{
	    	echo "dd-->".$Number_Of_Floors;
	    	echo "Error: " . $insert . "<br>" . $conn->error;
	      	// echo "
		    //     <script>
		    //       alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
		    //       window.location.href = 'form_SellingLeads.php'
		    //     </script>
	      	// ";
	    }
	}
}



?>