<?php 
session_start();
include('../conn.php');

$title = "แบบฟร์อมเพิ่มผู้ใช้งานระบบ";

$user_id      = "";
$full_name    = "";
$tel          = "";
$email        = "";
$ID_Line      = "";
$username     = "";
$password     = "";
$access_level = "";

if (!empty($_GET['id'])) {
  $title = "แบบฟร์อมแก้ไขผู้ใช้งานระบบ";

  $results = $conn->query("SELECT * FROM `users` WHERE `user_id` = '".$_GET['id']."'");
  $row = $results->fetch_array();
  $user_id      = $row['user_id'];
  $full_name    = $row['full_name'];
  $tel          = $row['tel'];
  $email        = $row['email'];
  $ID_Line      = $row['ID_Line'];
  $username     = $row['username'];
  $password     = $row['password'];
  $access_level = $row['access_level'];

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('../layouts/title.php')?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/magnific-popup.css">
    <link rel="stylesheet" href="../../css/jquery-ui.css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../css/mediaelementplayer.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="../../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../../css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="../../css/aos.css">

    <link rel="stylesheet" href="../../css/style.css">

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css">



    <style type="text/css">
      body{
        font-family: "Kanit", system-ui !important;
        font-weight: 400;
        font-style: normal;
      }

      .site-navbar {
        background-color: black;
      }
    </style>
    
  </head>
  <body>
  
  
    <div class="site-wrap">

      <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div> <!-- .site-mobile-menu -->

      <?php include('../layouts/sitebar.php')?>
    </div>

    <br><br><br><br>
    <div class="site-section site-section-sm">
      <div class="container">
      
        <div class="row mb-5">
          
          
          <div class="row col-12 mb-5">
            <div class="col-10">
              <h4><?= $title ?></h4>
            </div>
            
          </div>
          <div class="col-12">
            <form 
              action="save_user.php" 
              method="POST" 
            >
              <input type="hidden" name="user_id" value="<?= $user_id  ?>">

              <div class="form-group row">
                <label for="full_name" class="col-sm-2 col-form-label text-right">ชื่อ-นามสกุล : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $full_name?>" placeholder="ชื่อ-นามสกุล">
                </div>
              </div>

              <div class="form-group row">
                <label for="tel" class="col-sm-2 col-form-label text-right">เบอร์ติดต่อ : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="tel" name="tel" value="<?= $tel?>" placeholder="เบอร์ติดต่อ">
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label text-right">อีเมล : </label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email" value="<?= $email?>" placeholder="อีเมล">
                </div>
              </div>

              <div class="form-group row">
                <label for="ID_Line" class="col-sm-2 col-form-label text-right">Id Line : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ID_Line" name="ID_Line" value="<?= $ID_Line?>" placeholder="Id Line">
                </div>
              </div>

              <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label text-right">username : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="username" value="<?= $username?>" placeholder="username">
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label text-right">password : </label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" value="<?= $password?>" placeholder="password">
                </div>
              </div>

              <div class="form-group row">
                <label for="access_level" class="col-sm-2 col-form-label text-right">สิทธิ์การเข้าใช้งานระบบ : </label>
                <div class="col-sm-10">
                  <select class="form-control" name="access_level" id="access_level">
                      <?php if($access_level == 'sale'){?>
                      <option value="admin">ผู้ดูแลระบบ</option>
                      <option value="sale" selected>พนักงานขาย</option>
                      <?php }else{?>
                      <option value="admin" selected>ผู้ดูแลระบบ</option>
                      <option value="sale">พนักงานขาย</option>
                      <?php }?>
                  </select>
                </div>
              </div>
              
              

              <div class="row col-12 mb-5 pt-4">
                <div class="col-4 offset-3">
                  <a href="index_users.php" class="btn btn-warning col-8">ย้อนกลับ</a>
                </div>
                <div class="col-4 offset-1">
                  <button type="submit" class="btn btn-success col-8">บันทึก</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
        
      </div>
    </div>


  </div>

  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../js/jquery-ui.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/owl.carousel.min.js"></script>
  <script src="../../js/mediaelement-and-player.min.js"></script>
  <script src="../../js/jquery.stellar.min.js"></script>
  <script src="../../js/jquery.countdown.min.js"></script>
  <script src="../../js/jquery.magnific-popup.min.js"></script>
  <script src="../../js/bootstrap-datepicker.min.js"></script>
  <script src="../../js/aos.js"></script>

  <script src="../../js/main.js"></script>

  <!-- datatables -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>


    
  </body>
</html>