<?php
include("../conn.php");
session_start();

$results = $conn->query("SELECT * FROM `houseandlands` WHERE `user_id` = '".$_SESSION["user_id"]."' AND `status_sale` = 'ปิดการขาย'");
 
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
  <body >
  
  
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
              <h4>รายการขัอมูลบ้าน/ที่ดินรอจ่ายค่า commission</h4>
            </div>
            
          </div>
          <div class="col-12">
            <table class="table table-bordered" id="example" style="width:100%">
              <thead>
                <tr>
                  <th>รหัสประกาศ</th>
                  <th>วันที่ประกาศ</th>
                  <th>ชื่อโครงการ</th>
                  <th>ประเภท</th>
                  <!-- <th>ผู้ประกาศ</th> -->
                  <th>สถานะ</th>
                  <th>ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($results as $key => $value): ?>
                <?php
                  $payments = $conn->query("SELECT * FROM `payments` WHERE `houseandland_id` ='".$value['houseandland_id']."'");
                ?>
                <?php if($payments !== false && $payments->num_rows == 0){?>
                <tr>
                  <td width="10%"><?= "HL-".date("m")."-0".$value['houseandland_id']?></td>
                  <td width="10%"><?= $value['Announcement_Date']?></td>
                  <td width="35%"><?= $value['Area_Space']?></td>
                  <td width="10%"><?= $value['type_name']?></td>
                  <!-- <td width="10%"><?= $value['user_id']?></td> -->
                  <td width="10%"><?= $value['status_sale']?></td>
                  <td width="15%">
                    <a href="form_payment.php?id=<?= $value['houseandland_id'] ?>" class="btn btn-success">ชำระค่า commission</a>
                  </td>
                </tr>
                <?php } ?>
                <?php endforeach ?>
              </tbody>
            </table>
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

  <script type="text/javascript">
    new DataTable('#example');
  </script>
    
  </body>
</html>