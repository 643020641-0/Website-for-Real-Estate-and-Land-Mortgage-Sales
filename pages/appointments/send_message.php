<?php
session_start();
include('../conn.php');

echo $_POST['user_id'];
$user_id = $conn->real_escape_string($_POST['user_id']);
$tel = $conn->real_escape_string($_POST['tel']);
$message = $conn->real_escape_string($_POST['message']);
$status = "รอติดต่อกลับ";

$sql = "INSERT INTO messages (users_id, tel, message, status) VALUES ('$user_id', '$tel', '$message', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "
      <script>
        alert('บันทึกข้อมูลาเรียบร้อย \\nกรุณารอเจ้าหน้าที่ติดต่อกลับภายใน 24 ชม.')
        window.location.href = '/$project_name/'
      </script>
    ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>