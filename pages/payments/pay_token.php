<?php 
session_start();
include('../conn.php');

$title = "แบบฟอร์มซื้อ Token เพื่อลงประกาศขายบ้าน";


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
          
          
          <div class="row col-12 mb-2">
            <div class="col-10">
              <h4><?= $title ?></h4>
            </div>
            
          </div>
          <div class="col-12">
            <h4 class="text-center mt-4">ตารางราคาสำหรับ Token</h4>
            <table class="table table-bordered mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>จำนวน Token</th>
                            <th>ราคา (บาท)</th>
                            <th>ราคาเฉลี่ยต่อ Token</th>
                            <th>สิทธิพิเศษ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 Token</td>
                            <td>฿50</td>
                            <td>฿50</td>
                            <td>ลงประกาศ 1 รายการ</td>
                        </tr>
                        <tr>
                            <td>5 Tokens</td>
                            <td>฿200</td>
                            <td>฿40</td>
                            <td>ลดราคา 20%</td>
                        </tr>
                        <tr>
                            <td>10 Tokens</td>
                            <td>฿350</td>
                            <td>฿35</td>
                            <td>ลดราคา 30%</td>
                        </tr>
                        <tr>
                            <td>20 Tokens</td>
                            <td>฿600</td>
                            <td>฿30</td>
                            <td>ลดราคา 40%</td>
                        </tr>
                        <tr>
                            <td>50 Tokens</td>
                            <td>฿1,250</td>
                            <td>฿25</td>
                            <td>ลดราคา 50%</td>
                        </tr>
                        <tr>
                            <td>100 Tokens</td>
                            <td>฿2,000</td>
                            <td>฿20</td>
                            <td>ลดราคา 60% </td>
                        </tr>
                    </tbody>
                </table>
            <form 
              action="save_pay_token.php" 
              method="POST" 
              enctype="multipart/form-data"
            >

              <div class="form-group row">
                <label for="full_name" class="col-sm-2 col-form-label text-right">เลือกแพ็กเกจ Token : </label>
                <div class="col-sm-10">
                   <select id="token" name="token" class="form-control" required>
                      <option value="1">1 Token – ฿50</option>
                      <option value="5">5 Tokens – ฿200</option>
                      <option value="10">10 Tokens – ฿350</option>
                      <option value="20">20 Tokens – ฿600</option>
                      <option value="50">50 Tokens – ฿1,250</option>
                      <option value="100">100 Tokens – ฿2,000</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="full_name" class="col-sm-2 col-form-label text-right">ธนาคาร : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="full_name" name="full_name" value="กสิกร" placeholder="ชื่อบัญชี" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label for="tel" class="col-sm-2 col-form-label text-right">หมายเลขบัญชี : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="tel" name="tel" value="057-3592-964" placeholder="หมายเลขบัญชี" disabled>
                </div>
              </div>


              <div class="form-group row">
                <label for="payment_date" class="col-sm-2 col-form-label text-right">
                  วันและเวลาที่ชำระ : 
                </label>
                <div class="col-sm-10">
                  <input type="datetime-local" class="form-control" id="payment_date" name="payment_date" value="" placeholder="วันและเวลาที่ชำระ" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="payment_total" class="col-sm-2 col-form-label text-right">จำนวนเงินที่ชำระ : </label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="payment_total" name="payment_total" value="" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="slip" class="col-sm-2 col-form-label text-right">หลักฐานการชำระเงิน : </label>
                <div class="col-sm-10">
                  <input type="file" id="image-input" class="form-control-file"  accept="image/*" name="slip" onchange="previewImage()">
                </div>
              </div>
               <!-- <img id="image-preview" src="" alt="Image Preview"> -->
              
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                  <div class="col-sm-10">
                    <img id="image-preview" src="#" alt="Image Preview" width="150" style="display:none;">
                  </div>
                </div>


              <div class="row col-12 mb-5 pt-4">
                <div class="col-4 offset-3">
                  <a href="list_history_pay_token.php" class="btn btn-warning col-8">ย้อนกลับ</a>
                </div>
                <div class="col-4 offset-1">
                  <button type="submit" class="btn btn-success col-8">ยืนยันการชำระเงิน</button>
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

  <script>
    function previewImage(){

      const fileInput = document.getElementById('image-input');
      const file = fileInput.files[0];  // เลือกไฟล์แรกที่ผู้ใช้เลือก
      const preview = document.getElementById('image-preview');
      
      if (file) {
          const reader = new FileReader();  // สร้าง FileReader object
          reader.onload = function(e) {
              preview.src = e.target.result;  // แสดงผลลัพธ์ใน <img>
              preview.style.display = 'block'; // แสดงภาพตัวอย่าง
          };
          reader.readAsDataURL(file);  // อ่านไฟล์เป็น Data URL
      } else {
          preview.src = '';  // เคลียร์รูปถ้าไม่มีไฟล์ถูกเลือก
      }
    }
  </script>

    
  </body>
</html>