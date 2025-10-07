<?php
	session_start();

	include('../conn.php');

	$uername 	= $_POST['username'];
	$password 	= $_POST['pass'];


	$sql = "SELECT * FROM `users` WHERE `Username` = '".$uername."' AND `Password` = '".$password."' AND `status` = 'อนุมัติ' ";
	$result = mysqli_query($conn, $sql);


	$count = 0;

	foreach ($result as $key => $User) {
		$_SESSION["full_name"] 				= $User['full_name'];
		$_SESSION["user_id"] 				= $User['user_id'];
		$_SESSION["level"] 					= $User['access_level'];
		$count ++;
	}	


	if ($count > 0) {
		header( "location: /$project_name/" ); //ไปยังหน้าหลัก
		
	}else{
		
		echo "<script>
		alert('Username หรือ Password ไม่ถูกต้อง \\n\\nหรือ รอผู้ดูแลระบบอนุมัติเข้าใช้งานระบบ โปรดติดต่อผู้ดูแลระบบ\\n\\n\\nกรุณาลองใหม่อีกครั้ง!!');
		window.location.href='/$project_name/pages/manage_login';
		</script>";
		
		
		
	}

	$conn->close();

?>