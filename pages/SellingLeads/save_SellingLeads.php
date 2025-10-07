<?php 
include('../conn.php');
session_start();

$houseandland_id          = $_POST['houseandland_id']; 
$Announcement_Date        = $_POST['Announcement_Date']; 
$Area_Space               = $_POST['Area_Space']; 
$Land_Size                = $_POST['Land_Size']; 
$Price_Per_Square_Meter   = $_POST['Price_Per_Square_Meter']; 
$Price                    = $_POST['Price']; 
$Location                 = $_POST['Location']; 
$type_name                = $_POST['type_name']; 
$Number_Of_Floors         = $_POST['Number_Of_Floors'] != "" ?  $_POST['Number_Of_Floors'] : 0; 
$Completed_Year           = $_POST['Completed_Year'] != "" ?  $_POST['Completed_Year'] : 0;
$Detail                   = $_POST['Detail']; 
$Number_Of_Toilet         = $_POST['Number_Of_Toilet'] != "" ?  $_POST['Number_Of_Toilet'] : 0; 
$Number_Of_Room           = $_POST['Number_Of_Room'] != "" ?  $_POST['Number_Of_Room'] : 0; 
$user_id                  = $_POST['user_id']; 
$Status                   = $_POST['Status']; 
$Maps                     = $_POST['Maps']; 
// $Farm_Size                = $_POST['Farm_Size'];
// $Work_Size                = $_POST['Work_Size'];
// $Square_wah_Size          = $_POST['Square_wah_Size'];
$Picture1_old             = $_POST['Picture1_old']; 
$Picture2_old             = $_POST['Picture2_old']; 
$Picture3_old             = $_POST['Picture3_old']; 
$Picture4_old             = $_POST['Picture4_old']; 
$Picture5_old             = $_POST['Picture5_old'];
$status_sale             	= $_POST['status_sale'];



if(empty($Land_Size)){
	$Farm_Size 				= $_POST['Farm_Size'];
	$Work_Size 				= $_POST['Work_Size'];
	$Square_wah_Size 	= $_POST['Square_wah_Size'];
	$Land_Size 				= (intval($Farm_Size)*1600)+(intval($Work_Size)*400)+(intval($Square_wah_Size)*4);
	$Price_Per_Square_Meter = round($Price/$Land_Size);
	
}else{
	$Land_Size 				= $_POST['Land_Size'];
	$Square_wah_Size 	= $_POST['Square_wah_Size'];
	$Price_Per_Square_Meter = round($Price/$Land_Size);
	
}



if ($houseandland_id != "") {

	$results = $conn->query("SELECT * FROM `houseandlands` WHERE `Area_Space` ='".$Area_Space."' AND `houseandland_id` != '".$houseandland_id."'");
	if ($results !== false && $results->num_rows > 0){
		echo "
          <script>
            alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
            window.location.href = 'form_SellingLeads.php?id=$houseandland_id'
          </script>
        ";
		
	}else{

		$Picture1 = uploadimage($_FILES["Picture1"],$Picture1_old);
		$Picture2 = uploadimage($_FILES["Picture2"],$Picture2_old);
		$Picture3 = uploadimage($_FILES["Picture3"],$Picture3_old);
		$Picture4 = uploadimage($_FILES["Picture4"],$Picture4_old);
		$Picture5 = uploadimage($_FILES["Picture5"],$Picture5_old);

		$update = "UPDATE `houseandlands` SET 	`Announcement_Date`		='".$Announcement_Date."',
												`Area_Space`			='".$Area_Space."',
												`Land_Size`				='".$Land_Size."',
												`Price_Per_Square_Meter`='".$Price_Per_Square_Meter."',
												`Price`					='".$Price."',
												`Location`				='".$Location."',
												`type_name`				='".$type_name."',
												`Number_Of_Floors`		='".$Number_Of_Floors."',
												`Completed_Year`		='".$Completed_Year."',
												`Detail`				='".$Detail."',
												`Picture1`				='".$Picture1."',
												`Picture2`				='".$Picture2."',
												`Picture3`				='".$Picture3."',
												`Picture4`				='".$Picture4."',
												`Picture5`				='".$Picture5."',
												`Number_Of_Toilet`		='".$Number_Of_Toilet."',
												`Number_Of_Room`		='".$Number_Of_Room."',
												`user_id`				='".$user_id."',
												`Status`				='".$Status."',
												`status_sale`				='".$status_sale."',
												`Square_wah_Size`		='".$Square_wah_Size."',
												`Maps`					='".$Maps."' 
										WHERE `houseandland_id`			='".$houseandland_id."'";
		if ($conn->query($update) === true) {
	      echo "
	        <script>
	          alert('บันทึกข้อมูลเรียบร้อย')
	          window.location.href = 'Index_SellingLeads.php'
	        </script>
	      ";
	    }else{

	      	echo "
		        <script>
		          alert('บันทึกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง')
		          window.location.href = 'form_SellingLeads.php?id=$houseandland_id'
		        </script>
	      	";
	    }
	}
}else{
	$results = $conn->query("SELECT * FROM `houseandlands` WHERE `Area_Space` ='".$Area_Space."'");
	if ($results !== false && $results->num_rows > 0){
		echo "
          <script>
            alert('พบข้อมูลซ้ำ กรุณาลองอีกครั้ง')
            window.location.href = 'form_SellingLeads.php'
          </script>
        ";
		
	}else{
		$Picture1 = uploadimage($_FILES["Picture1"],$Picture1_old);
		$Picture2 = uploadimage($_FILES["Picture2"],$Picture2_old);
		$Picture3 = uploadimage($_FILES["Picture3"],$Picture3_old);
		$Picture4 = uploadimage($_FILES["Picture4"],$Picture4_old);
		$Picture5 = uploadimage($_FILES["Picture5"],$Picture5_old);

		$insert = "INSERT INTO `houseandlands`(`Announcement_Date`, `Area_Space`, `Land_Size`, `Price_Per_Square_Meter`, `Price`, `Location`, `type_name`, `Number_Of_Floors`, `Completed_Year`, `Detail`, `Picture1`, `Picture2`, `Picture3`, `Picture4`, `Picture5`, `Number_Of_Toilet`, `Number_Of_Room`, `user_id`, `Status`, `Maps`, `status_sale`, `Square_wah_Size`) VALUES ('".$Announcement_Date."','".$Area_Space."','".$Land_Size."','".$Price_Per_Square_Meter."','".$Price."','".$Location."','".$type_name."','".$Number_Of_Floors."','".$Completed_Year."','".$Detail."','".$Picture1."','".$Picture2."','".$Picture3."','".$Picture4."','".$Picture5."','".$Number_Of_Toilet."','".$Number_Of_Room."','".$user_id."','".$Status."','".$Maps."','".$status_sale."','".$Square_wah_Size."')";
		if ($conn->query($insert) === true) {
	      echo "
	        <script>
	          alert('บันทึกข้อมูลเรียบร้อย')
	          window.location.href = 'Index_SellingLeads.php'
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
}


function uploadimage($image, $image_old){
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
    	$picture = $image_old;
    }

    return $picture;
}


?>
