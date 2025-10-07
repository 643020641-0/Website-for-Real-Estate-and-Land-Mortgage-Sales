<?php include('pages/conn.php')?>
<?php
session_start();
$results = $conn->query("SELECT * FROM `houseandlands` WHERE `Status` != 'รออนุมัติลงประกาศ' AND `Status` != 'ยกเลิกประกาศ' AND `status_sale` = 'เปิดการขาย'");
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('pages/layouts/title.php')?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
      body{
        font-family: "Kanit", system-ui !important;
        font-weight: 400;
        font-style: normal;
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

      <?php include('pages/layouts/sitebar.php')?>
    </div>

    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <span class="d-inline-block bg-success text-white px-3 mb-5 property-offer-type rounded">สำหรับซื้อ - ขาย</span>
              <h1 class="mb-5">ที่ปรึกษาที่คุณวางใจ ในการหาบ้าน/ที่ดินที่ใช่</h1>
              <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">ดูรายละเอียดเพิ่มเติม</a></p>
            </div>
          </div>
        </div>
      </div>  

    </div>


    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form class="form-search col-md-12" action="pages/SellingLeads/list_type_SellingLeads.php" method="get" style="margin-top: -120px;">
            <div class="row  align-items-end">
              <div class="col-md-9">
                <label for="list-types">ประเภทอสังหาริมทรัพย์</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select id="type" name="type" class="form-control d-block rounded-0">
                    <?php foreach ($array_categority as $key => $value): ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
             
              <div class="col-md-3">
                <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="ค้นหา">
              </div>
            </div>
          </form>
        </div>  
  
       
      </div>
    </div>

    <div class="site-section site-section-sm">
      <div class="container">
      
        <div class="row mb-5">
          <?php foreach ($results as $key => $value) { ?>
          
          
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="pages/SellingLeads/detail_user_SellingLead.php?id=<?= $value['houseandland_id']?>" class="property-thumbnail">
                <div class="offer-type-wrap">
                 <!--  <span class="offer-type bg-danger">ขาย</span>
                  <span class="offer-type bg-success">ลงประกาศใหม่</span> -->
                </div>
                <img src="pages/SellingLeads/images/<?= $value['Picture1']?>" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <h2 class="property-title">
                  <a href="pages/SellingLeads/detail_user_SellingLead.php?id=<?= $value['houseandland_id']?>"><?= $value['Area_Space']?></a>
                </h2>
                <span class="property-location d-block mb-3">
                  <span class="property-icon icon-room"></span> <?= $value['Location']?>
                z</span>
                <strong class="property-price text-primary mb-3 d-block text-success"><?= number_format($value['Price'],0)?></strong>
                
              </div>
            </div>
          </div>
          <?php } ?>

          
        </div>

        
      </div>
    </div>


  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/mediaelement-and-player.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>