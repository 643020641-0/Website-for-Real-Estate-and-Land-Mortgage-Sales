<?php 
session_start();
include('../conn.php');

$payment_date_time 	= $_POST['payment_date'];
$payment_total 		= $_POST['payment_total'];
$token 					= $_POST['token'];
$payment_status		= "รอตรวจสอบ";


if ($tokens[$token] > $payment_total) {
	echo "
      <script>
        alert('จำนวนเงินที่ชำระน้อยกว่าที่กำหนด กรุณาลองอีกครั้ง')
        window.location.href = 'pay_token.php'
      </script>
    ";
}else{
	$slip = uploadimage($_FILES["slip"]);


	$insert = "INSERT INTO `payments`(`payment_date_time`, `payment_total`, `slip`, `payment_status`, `user_id`, `token`) VALUES ('".$payment_date_time."','".$payment_total."','".$slip."','".$payment_status."','".$_SESSION["user_id"]."','".$token."')";

	if ($conn->query($insert) === true) {
	  echo "
	    <script>
	      alert('ชำระเงินค่า commission เรียบร้อย')
	      window.location.href = 'list_history_pay_token.php'
	    </script>
	  ";
	}else{
		echo "Error: " . $insert . "<br>" . $conn->error;
	}
}



function uploadimage($image){
	if($image["name"] != ""){
      	
        $target_dir = "images/";
        $target_name = $image["name"];
        $target_file = $target_dir . basename($target_name);

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
        	
           $picture = $target_name;
        } else {
           $picture = "";
        }

    }else{
    	echo "
	      <script>
	        alert('กรุณาแนบหลักฐาน การชำระเงิน')
	        window.location.href = 'pay_token.php'
	      </script>
	    ";
    }

    return $picture;
}



?>