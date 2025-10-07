<?php
include("../conn.php");
session_start();

  $results = $conn->query("SELECT * FROM `houseandlands` WHERE `houseandland_id` = '".$_GET['id']."'");
  $row = $results->fetch_array();

  $houseandland_id          = $row['houseandland_id']; 
  $Announcement_Date        = $row['Announcement_Date'];
  $Area_Space               = $row['Area_Space']; 
  $Land_Size                = $row['Land_Size']; 
  $Price_Per_Square_Meter   = $row['Price_Per_Square_Meter']; 
  $Price                    = $row['Price']; 
  $Location                 = $row['Location']; 
  $type_name                = $row['type_name']; 
  $Number_Of_Floors         = $row['Number_Of_Floors']; 
  $Completed_Year           = $row['Completed_Year']; 
  $Detail                   = $row['Detail']; 
  $Picture1                 = $row['Picture1']; 
  $Picture2                 = $row['Picture2']; 
  $Picture3                 = $row['Picture3']; 
  $Picture4                 = $row['Picture4']; 
  $Picture5                 = $row['Picture5'];
  $Number_Of_Toilet         = $row['Number_Of_Toilet']; 
  $Number_Of_Room           = $row['Number_Of_Room']; 
  $user_id                  = $row['user_id']; 
  $Status                   = $row['Status']; 
  $Maps                     = $row['Maps']; 
  $status_sale              = $row['status_sale']; 


  if ($status_sale == 'ปิดการขาย') {
    $check_open = "";
    $check_close = "checked";

  }
  $ModFram_size = intval($row['Land_Size']%1600);
  $Farm_Size = intval($row['Land_Size']/1600);


  $ModWork_Size = intval($ModFram_size%400);
  $Work_Size = intval($ModFram_size/400);


  $Square_wah_Size = intval($ModWork_Size/4);
 
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

    
    <br><br><br><br>
    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div>
              <div class="slide-one-item home-slider owl-carousel">
                <div><img src="images/<?= $row['Picture1']?>" alt="Image" class="img-fluid"></div>
                <div><img src="images/<?= $row['Picture2']?>" alt="Image" class="img-fluid"></div>
                <div><img src="images/<?= $row['Picture3']?>" alt="Image" class="img-fluid"></div>
              </div>
            </div>
            <div class="bg-white property-body border-bottom border-left border-right">
              <div class="row mb-5">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3"><?= number_format($Price,2) ?> </strong> 
                </div>
                <?php if($row['type_name'] != 'ที่ดินเปล่า'){?>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs">
                      <img src="../../images/bed.png" width="30">
                    </span>
                    <span class="property-specs-number">2</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">
                      <img src="../../images/bathtub.png" width="30">
                    </span>
                    <span class="property-specs-number">2</span>
                    
                  </li>
                  
                </ul>
                </div>
                <?php }?>
              </div>
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 text-center border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">ประเภท</span>
                  <strong class="d-block"><?= $row['type_name'] ?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">ลงประกาศเมื่อ</span>
                  <strong class="d-block"><?= $row['Announcement_Date'] ?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">รหัสประกาศ</span>
                  <strong class="d-block"><?= "HL-".date("m")."-0".$row['houseandland_id']?></strong>
                </div>
                 <div class="col-md-6 col-lg-4 text-center border-bottom py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">ขนาดที่ดิน</span>
                  <strong class="d-block"><?= $row['Land_Size'] ?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">ราคาต่อ ตร.ม.</span>
                  <strong class="d-block"><?= number_format($row['Price_Per_Square_Meter'],2) ?></strong>
                </div>
                
                <div class="col-md-6 col-lg-4 text-center border-bottom py-3">
                  <?php if($row['type_name'] != 'ที่ดินเปล่า'){?>
                  <span class="d-inline-block text-black mb-0 caption-text">จำนวนชั้น</span>
                  <strong class="d-block"><?= $row['Number_Of_Floors'] ?></strong>
                  <?php }?>
                </div>
                
              </div>

              <h2 class="h4 text-black">รายละเอียดเพิ่มเติม</h2>
              <p><?= $row['Detail'] ?></p>

              <div class="row no-gutters mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3">Gallery</h2>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="images/<?= $row['Picture1']?>" class="image-popup gal-item"><img src="images/<?= $row['Picture1']?>" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="images/<?= $row['Picture2']?>" class="image-popup gal-item"><img src="images/<?= $row['Picture2']?>" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="images/<?= $row['Picture3']?>" class="image-popup gal-item"><img src="images/<?= $row['Picture3']?>" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="images/<?= $row['Picture4']?>" class="image-popup gal-item"><img src="images/<?= $row['Picture4']?>" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="images/<?= $row['Picture5']?>" class="image-popup gal-item"><img src="images/<?= $row['Picture5']?>" alt="Image" class="img-fluid"></a>
                </div>
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <div class="row col-12 mb-2">
      <div class="col-3 offset-2">
        <a href="List_all_SellingLeads.php" class="btn btn-warning col-8">ย้อนกลับ</a>
      </div>
      <?php if($row['Status'] == 'รออนุมัติลงประกาศ'){?>
      <div class="col-3">
        <a href="update_SellingLead.php?id=<?= $row['houseandland_id'] ?>&status=อนุมัติ" class="btn btn-success col-8">อนุมัติ</a>
      </div>
      <div class="col-3">
        <a href="update_SellingLead.php?id=<?= $row['houseandland_id'] ?>&status=ไม่อนุมัติ" class="btn btn-danger col-8">ไม่อนุมัติ</a>
      </div>
      <?php }?>
      
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