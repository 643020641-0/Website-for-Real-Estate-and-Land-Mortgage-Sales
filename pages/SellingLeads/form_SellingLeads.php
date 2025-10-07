<?php 
include('../conn.php');
session_start();

$title = "แบบฟร์อมเพิ่มข้อมูลบ้าน/ที่ดิน";

$results = $conn->query("SELECT MAX(`houseandland_id`) FROM `houseandlands`");

if ($results !== false && $results->num_rows > 0){
  $Houseandlan = $results->fetch_row();
}else{
  $Houseandlan = [0];
}

$houseandland_id          = ""; 
$Announcement_Date        = date("Y-m-d"); 
$Area_Space               = ""; 
$Land_Size                = ""; 
$Price_Per_Square_Meter   = ""; 
$Price                    = ""; 
$Location                 = ""; 
$type_name                = ""; 
$Number_Of_Floors         = ""; 
$Completed_Year           = ""; 
$Detail                   = ""; 
$Picture1                 = ""; 
$Picture2                 = ""; 
$Picture3                 = ""; 
$Picture4                 = ""; 
$Picture5                 = "";
$Picture1_old             = ""; 
$Picture2_old             = ""; 
$Picture3_old             = ""; 
$Picture4_old             = ""; 
$Picture5_old             = ""; 
$Number_Of_Toilet         = ""; 
$Number_Of_Room           = ""; 
$status_sale              = ""; 
$user_id                  = $_SESSION["user_id"] ; 
if ($_SESSION["level"] == 'admin') {
  $Status                  = "อนุมัติลงประกาศ"; 
}else{
  $Status                  = "รออนุมัติลงประกาศ"; 
}
$check_open = "checked";
$check_close = "";

$Maps                     = "-"; 
$Farm_Size                = "";
$Work_Size                = "";
$Square_wah_Size          = "";

if (!empty($_GET['id'])) {
  $title = "แบบฟร์อมแก้ไขข้อมูลบ้าน/ที่ดิน";

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
  $Picture1_old             = $row['Picture1']; 
  $Picture2_old             = $row['Picture2']; 
  $Picture3_old             = $row['Picture3']; 
  $Picture4_old             = $row['Picture4']; 
  $Picture5_old             = $row['Picture5']; 
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
  <body onload="myFunction('<?= $type_name ?>')">
  
  
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
              action="save_SellingLeads.php" 
              method="POST" 
              enctype="multipart/form-data"
            >
              <input type="hidden" name="houseandland_id" value="<?= $houseandland_id  ?>">
              <input type="hidden" name="Status" value="<?= $Status  ?>">
              <input type="hidden" name="Maps" value="<?= $Maps ?>">
              <input type="hidden" name="Price_Per_Square_Meter" value="<?= $Price_Per_Square_Meter ?>">
              <input type="hidden" name="user_id" value="<?= $user_id ?>">
              <input type="hidden" name="Picture1_old" value="<?= $Picture1_old ?>">
              <input type="hidden" name="Picture2_old" value="<?= $Picture2_old ?>">
              <input type="hidden" name="Picture3_old" value="<?= $Picture3_old ?>">
              <input type="hidden" name="Picture4_old" value="<?= $Picture4_old ?>">
              <input type="hidden" name="Picture5_old" value="<?= $Picture5_old ?>">
              
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right">รหัสประกาศ : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="colFormLabel" placeholder="รหัสประกาศ" value="<?= "HL-".date("m")."-0".intval($Houseandlan['0']+1)?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right">สถานะ : </label>
                <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_sale" id="inlineRadio1" value="เปิดการขาย" <?= $check_open ?>>
                    <label class="form-check-label" for="inlineRadio1">เปิดการขาย</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_sale" id="inlineRadio2" value="ปิดการขาย"  <?= $check_close ?>>
                    <label class="form-check-label" for="inlineRadio2">ปิดการขาย </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="type_name" class="col-sm-2 col-form-label text-right">ประเภทบ้าน/ที่ดิน : </label>
                <div class="col-sm-10">
                  <select name="type_name" id="type_name" class="form-control" onchange="getComboA(this)">
                    <?php foreach ($array_categority as $key => $value): ?>
                    <?php if($type_name == $value){?>
                    <option value="<?= $value ?>" selected><?= $value ?></option>
                    <?php }else{?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                    <?php }?>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="Announcement_Date" class="col-sm-2 col-form-label text-right">วันที่ประกาศ : </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="Announcement_Date" name="Announcement_Date" value="<?= $Announcement_Date ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="Area_Space" class="col-sm-2 col-form-label text-right">ชื่อประกาศ : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="Area_Space" name="Area_Space" value="<?= $Area_Space?>" placeholder="ชื่อประกาศ">
                </div>
              </div>

              <div class="form-group row">
                <label for="Price" class="col-sm-2 col-form-label text-right">ราคาขาย : </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="Price" name="Price" value="<?= $Price?>">
                </div> 
                <label for="Price" class="col-sm-2 col-form-label">บาท </label>
              </div>

              <!-- start Lands -->
              <div id="Lands" style="display:none;">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right">ขนาดที่ดิน : </label>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group row">
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Farm_Size" name="Farm_Size" value="<?= $Farm_Size ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">ไร่</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group row">
    
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Work_Size" name="Work_Size" value="<?= $Work_Size ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">งาน</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group row">
    
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="Square_wah_Size" name="Square_wah_Size" value="<?= $Square_wah_Size ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-4 col-form-label">ตารางวา</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- end Lands -->

              <!-- start House -->
              <div id="House">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right">ขนาดที่ดิน : </label>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group row">
    
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="Land_Size" name="Land_Size" value="<?= $Land_Size ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-3 col-form-label">
                          ตารางเมตร
                        </label>
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group row">
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="Square_wah_Size" name="Square_wah_Size" value="<?= $Square_wah_Size ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-3 col-form-label">ตารางวา</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group row">
                <label for="Land_Size" class="col-sm-2 col-form-label text-right">ขนาดที่ดิน : </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="Land_Size" name="Land_Size" value="<?= $Land_Size ?>" placeholder="ขนาดที่ดิน">
                </div>
                <label for="Land_Size" class="col-sm-2 col-form-label">ตารางเมตร </label>
              </div> -->

              <div class="form-group row">
                <label for="Number_Of_Floors" class="col-sm-2 col-form-label text-right">จำนวนชั้น : </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="Number_Of_Floors" name="Number_Of_Floors" value="<?= $Number_Of_Floors ?>" placeholder="จำนวนชั้น">
                </div>
                <label for="Number_Of_Floors" class="col-sm-2 col-form-label">ชั้น </label>
              </div>

              <div class="form-group row">
                <label for="Number_Of_Room" class="col-sm-2 col-form-label text-right">จำนวนห้อง : </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="Number_Of_Room" name="Number_Of_Room" value="<?= $Number_Of_Room ?>" placeholder="จำนวนห้อง">
                </div>
                <label for="Number_Of_Room" class="col-sm-2 col-form-label">ห้อง </label>
              </div>

              <div class="form-group row">
                <label for="Number_Of_Toilet" class="col-sm-2 col-form-label text-right">จำนวนห้องน้ำ : </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="Number_Of_Toilet" name="Number_Of_Toilet" value="<?= $Number_Of_Toilet ?>" placeholder="รหัสประกาศ">
                </div>
                <label for="Number_Of_Toilet" class="col-sm-2 col-form-label">ห้อง </label>
              </div>

              <div class="form-group row">
                <label for="Completed_Year" class="col-sm-2 col-form-label text-right">ปีที่สร้างเสร็จ : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="Completed_Year" name="Completed_Year" value="<?= $Completed_Year ?>" placeholder="รหัสประกาศ">
                </div>
              </div>
              </div>
              <!-- end House -->

              <div class="form-group row">
                <label for="Location" class="col-sm-2 col-form-label text-right">ตำแหน่งที่ตั้ง : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="Location" name="Location" value="<?= $Location ?>" placeholder="รหัสประกาศ" >
                </div>
              </div>

              <div class="form-group row">
                <label for="Detail" class="col-sm-2 col-form-label text-right">รายละเอียดเพิ่มเติม : </label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="Detail" name="Detail" rows="3"><?= $Detail ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="Picture1" class="col-sm-2 col-form-label text-right">รูปที่ 1 : </label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-file" name="Picture1" id="Picture1" placeholder="รหัสประกาศ" onchange="showimgae('Picture1','preview1')">
                </div>
                
              </div>
              <div id="div_preview1" style="display:none;">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                <div class="col-sm-10">
                  <img id="preview1" src="#" alt="Image Preview" width="150">
                </div>
                
              </div>
              </div>
              <?php if($Picture1_old != ""){?>
              <div id="div_preview1_old">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                <div class="col-sm-10">
                  
                  <img id="preview1_old" src="images/<?= $Picture1_old  ?>" alt="Image Preview" width="150">
                  
                </div>
                
              </div>
              </div>
              <?php } ?>

              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right">รูปที่ 2 : </label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-file"  name="Picture2" id="Picture2"  placeholder="รหัสประกาศ" onchange="showimgae('Picture2','preview2')">
                </div>
              </div>
              <div id="div_preview2" style="display:none;">
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                  <div class="col-sm-10">
                    <img id="preview2" src="#" alt="Image Preview" width="150">
                  </div>
                </div>
              </div>
              <?php if($Picture2_old != ""){?>
              <div id="div_preview2_old">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                <div class="col-sm-10">
                  
                  <img id="preview2_old" src="images/<?= $Picture2_old ?>" alt="Image Preview" width="150">
                  
                </div>
                
              </div>
              </div>
              <?php } ?>

              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right">รูปที่ 3 : </label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-file"  name="Picture3" id="Picture3"  placeholder="รหัสประกาศ" onchange="showimgae('Picture3','preview3')">
                </div>
              </div>
              <div id="div_preview3" style="display:none;">
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                  <div class="col-sm-10">
                    <img id="preview3" src="#" alt="Image Preview" width="150">
                  </div>
                </div>
              </div>
              <?php if($Picture3_old != ""){?>
              <div id="div_preview3_old">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                <div class="col-sm-10">
                  
                  <img id="preview3_old" src="images/<?= $Picture3_old  ?>" alt="Image Preview" width="150">
                  
                </div>
                
              </div>
              </div>
              <?php } ?>

              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right">รูปที่ 4 : </label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-file"  name="Picture4" id="Picture4"  placeholder="รหัสประกาศ" onchange="showimgae('Picture4','preview4')">
                </div>
              </div>
              <div id="div_preview4" style="display:none;">
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                  <div class="col-sm-10">
                    <img id="preview4" src="#" alt="Image Preview" width="150">
                  </div>
                </div>
              </div>
              <?php if($Picture4_old != ""){?>
              <div id="div_preview4_old">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                <div class="col-sm-10">
                  
                  <img id="preview4_old" src="images/<?= $Picture4_old  ?>" alt="Image Preview" width="150">
                  
                </div>
                
              </div>
              </div>
              <?php } ?>

              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right">รูปที่ 5 : </label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-file"  name="Picture5" id="Picture5"  placeholder="รหัสประกาศ" onchange="showimgae('Picture5','preview5')">
                </div>
              </div>
              <div id="div_preview5" style="display:none;">
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                  <div class="col-sm-10">
                    <img id="preview5" src="#" alt="Image Preview" width="150">
                  </div>
                </div>
              </div>
              <?php if($Picture5_old != ""){?>
              <div id="div_preview5_old">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label text-right"></label>
                <div class="col-sm-10">
                  
                  <img id="preview5_old" src="images/<?= $Picture5_old  ?>" alt="Image Preview" width="150">
                  
                </div>
                
              </div>
              </div>
              <?php } ?>

              
              

              <div class="row col-12 mb-5 pt-4">
                <div class="col-4 offset-3">
                  <a href="Index_SellingLeads.php" class="btn btn-warning col-8">ย้อนกลับ</a>
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

  <script type="text/javascript">

    function myFunction(TypeHouseandlanCheck){
       console.log(TypeHouseandlanCheck);
      if (TypeHouseandlanCheck == 'ที่ดินเปล่า') {
          document.getElementById("Lands").style.display = "block";
          document.getElementById("House").style.display = "none";                
      }else{
          document.getElementById("Lands").style.display = "none";
          document.getElementById("House").style.display = "block";
      }
    };
    function getComboA(selectObject) {

        var selectedText = selectObject.options[selectObject.selectedIndex].text
        if (selectedText == 'ที่ดินเปล่า') {
            document.getElementById("Lands").style.display = "block";
            document.getElementById("House").style.display = "none";
            
            console.log(selectedText);
        }else{
            document.getElementById("Lands").style.display = "none";
            document.getElementById("House").style.display = "block";
        }
        
    }

   

    function showimgae(Picture,showpreview){
      const fileInput = document.getElementById(Picture);
      const preview = document.getElementById(showpreview);
      const div_preview = document.getElementById('div_'+showpreview);
      const div_preview_old = document.getElementById('div_'+showpreview+'_old');

      const file = event.target.files[0];

      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              preview.src = e.target.result; // ตั้งค่า src ของภาพตัวอย่างให้เป็นผลลัพธ์จาก FileReader
              preview.style.display = 'block'; // แสดงภาพตัวอย่าง
              div_preview.style.display = 'block'; // แสดงภาพตัวอย่าง
              div_preview_old.style.display = 'none'; // แสดงภาพตัวอย่าง
          }
          reader.readAsDataURL(file); // อ่านไฟล์เป็น data URL
      } else {
          preview.style.display = 'none'; // ซ่อนภาพตัวอย่างถ้าไม่มีไฟล์ที่เลือก
      }
    }
    
  </script>
    
  </body>
</html>