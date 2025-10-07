<?php include('../conn.php')?>
<?php
session_start();

$format = '';
$Check_report = 0;
$DateInput = '';
$dataPoints = array(); //array ข้อมูลสำหรับเอาไว้สร้างกราฟ
$temp_array =array(); // array เตรียมข้อมูลสำหรับบันทึกลง array $dataPoints

if (!empty($_GET['action']) && ($_GET['action']=='Report')) {
  $DateInput = $_POST['DateInput'];

  if ($_POST['textID'] == ""){
      $YaerInput = date('Y');
  }else{
      $YaerInput = $_POST['YaerInput'];
  }


  $DateShow = $DateInput;
   

  $Check_report += 1 ;
  if ($_SESSION["level"] == 'admin') {
      $TypeHouseAndLands = $conn->query("SELECT houseandlands.Area_Space AS name,COUNT(houseandlands.houseandland_id) AS COUNT_num FROM houseandlands INNER JOIN appointments ON appointments.houseandland_id = houseandlands.houseandland_id WHERE MONTH(appointments.Appointment_Date)='".$DateInput."' AND YEAR(appointments.Appointment_Date)='".$YaerInput."' GROUP BY houseandlands.Area_Space");
  }else{
     $TypeHouseAndLands = $conn->query("SELECT houseandlands.Area_Space AS name,COUNT(houseandlands.houseandland_id) AS COUNT_num FROM houseandlands INNER JOIN appointments ON appointments.houseandland_id = houseandlands.houseandland_id WHERE MONTH(appointments.Appointment_Date)='".$DateInput."' AND YEAR(appointments.Appointment_Date)='".$YaerInput."' AND houseandlands.user_id = '".$_SESSION["user_id"]."' GROUP BY houseandlands.Area_Space");
  }

  foreach ($TypeHouseAndLands as $key => $TypeHouseAndLand) {
      $temp_array['y'] = intval($TypeHouseAndLand['COUNT_num']);
      $temp_array['label'] = $TypeHouseAndLand['name'];

      array_push($dataPoints, $temp_array);
  }

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
              <h4>รายงานยอดผู้เข้าชมบ้าน/ที่ดิน แต่ละประกาศ</h4>

            </div>
            
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-md-2 offset-10">
                <button 
                    type="button" 
                    class="btn btn-block btn-success btn-flat" 
                    data-toggle="modal" 
                    data-target=".bd-example-modal-lg"
                > 
                    สร้างรายงาน
                </button>
              </div>
            </div>


            <?php if($Check_report != 0){?>
            <div class="datatable-dashv1-list custom-datatable-overright" style="font-family: 'Kanit'">
                <?php if(mysqli_num_rows($TypeHouseAndLands) == 0){ ?>
                    <center><br><br><br>
                        <font color="red">
                            <h3>
                            ไม่พบข้อมูลรายงานประจำเดือน 
                            <?php 
                             echo $arr_month[$DateShow-1]." ปี ".($YaerInput+543);
                            ?>
                            </h3>
                        </font>
                    </center>
                <?php }else{?>
                    <div id="chartContainer" style="height: 370px; width: 100%;" ></div>
                <?php }?>
            </div>
            <?php }?>
          </div>
        </div>
        
        
      </div>
    </div>


  <!-- start modal -->
<div 
    class="modal fade bd-example-modal-lg" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="myLargeModalLabel" 
    aria-hidden="true"
>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">กรุณาเลือกเดือน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="report_total_visitors.php?action=Report" method="POST">
          <div class="modal-body">
            <div class="input-group col-md-12">
              <select class="form-control select2" style="width: 100%;" name="DateInput" id="DateInput">
                <?php foreach ($arr_month as $key => $value): ?>
                <option value="<?= $key+1 ?>"><?= $value ?></option> 
                <?php endforeach ?>?>
                 
              </select>
            </div><br>
            <div class="form-group offset-8">
              <input type="checkbox" id="myCheck"  onclick="myFunction()">
              <input type="hidden" id="textID" name="textID">
              ต้องการระบุปี
              <script>
                function myFunction() {
                  var checkBox = document.getElementById("myCheck");
                  if (checkBox.checked == true){
                    $("#textID").val("select");
                    text.style.display = "block";
                  } else {
                     text.style.display = "none";
                     $("#textID").val("");
                  }
                }
              </script>
            </div><br>

            <div class="input-group col-md-12" id="text" style="display:none">
              <select class="form-control select2" style="width: 100%;" name="YaerInput" id="YaerInput">
                    <?php foreach ($max_years as $key => $max_year) { ?>
                        <option value="<?= $max_year ?>"><?= $max_year+543 ?></option>
                    <?php } ?>
              </select>
            </div>
            
          </div><br><br><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">เลือก</button>
          </div>
        </form>
      </div>
    </div>
</div>
<!-- end modal -->

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
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
      window.onload = function() {
       
      var arr_month = ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];

      var chart = new CanvasJS.Chart("chartContainer", {

          animationEnabled: true,
          title: {
              text: "เดือน "+arr_month[<?php echo $DateShow-1; ?>]+" ปี "+<?php echo $YaerInput+543; ?>
          },
          
          data: [{
              type: "column",
              // yValueFormatString: "#,##0.00\"%\"",
              // indexLabel: "{label} ({y})",
              indexLabel: "จำนวน {y} ครั้ง",
              dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
          }]
      });
      chart.render();

    
      

      }
  </script>
  </body>
</html>