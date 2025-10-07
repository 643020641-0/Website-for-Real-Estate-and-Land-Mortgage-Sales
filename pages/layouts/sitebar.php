<div class="site-navbar mt-4">
  <div class="container py-1">
    <div class="row align-items-center">
      <div class="col-8 col-md-8 col-lg-2">
        <h1 class="mb-0"><a href="/<?= $project_name ?>/" class="text-white h2 mb-0"><strong>LandScout<span class="text-danger">.</span></strong></a></h1>
      </div>
      <div class="col-4 col-md-4 col-lg-10">
        <nav class="site-navigation text-right text-md-right" role="navigation">

          <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          <ul class="site-menu js-clone-nav d-none d-lg-block">
            

            <?php if (empty($_SESSION['level'] )) {?>
            <li>
              <a href="/<?= $project_name ?>/">หน้าหลัก</a>
            </li> 
            <li class="has-children">
              <a href="#">ประกาศขายบ้านและที่ดิน</a>
              <ul class="dropdown arrow-top">
                <?php foreach ($array_categority as $key => $value) { ?>
                
                <li><a href="/<?= $project_name ?>/pages/SellingLeads/list_type_SellingLeads.php?type=<?= $value ?>"><?= $value ?></a></li>
                <?php } ?>
              </ul>
            </li>
            
            <li>
              <a href="/<?= $project_name ?>/pages/manage_login">เข้าสู่ระบบ</a>
              <a href="/<?= $project_name ?>/pages/registers/form_register.php">สมัครสมาชิก</a>
            </li>
            <?php } ?>

            <?php if (!empty($_SESSION['level'] )) {?>
            <?php if ($_SESSION['level'] == 'admin') {?>

            <li class="has-children">
              <a href="#">ข้อมูลบ้าน/ที่ดิน</a>
              <ul class="dropdown arrow-top">
                <li><a href="/<?= $project_name ?>/pages/SellingLeads/List_all_SellingLeads.php">รายการข้อมูลบ้าน/ที่ดิน</a></li>
                <li>
                  <a href="/<?= $project_name ?>/pages/SellingLeads/Index_SellingLeads.php">ลงประกาศขายบ้าน/ที่ดิน</a>
                </li>
                
              </ul>
            </li>
            <?php }else{ ?>  
            <li>
              <a href="/<?= $project_name ?>/pages/SellingLeads/Index_SellingLeads.php">ลงประกาศขายบ้าน/ที่ดิน</a>
            </li>
            <?php } ?>

            <?php if ($_SESSION['level'] == 'admin') {?>
            
            <li class="has-children">
              <a href="#">รายชื่อผู้ติดต่อ</a>
              <ul class="dropdown arrow-top">
                <li><a href="/<?= $project_name ?>/pages/appointments/list_appointments.php">ผู้ติดต่อขอดูบ้าน</a></li>
                <li><a href="/<?= $project_name ?>/pages/appointments/list_admin_appointments.php">ผู้ติดต่อแอดมิน</a></li>
                
                
              </ul>
            </li>
            <li><a href="/<?= $project_name ?>/pages/payments/list_admin_payments.php">ตรวจสอบการชำระเงิน</a></li>

            <li class="has-children">
              <a href="#">รายงาน</a>
              <ul class="dropdown arrow-top">
                <li>
                  <a href="/<?= $project_name ?>/pages/reports/report_total_visitors.php">
                    ยอดผู้เข้าชมบ้าน/ที่ดินแต่ละประกาศ
                  </a>
                </li>
                <li>
                  <a href="/<?= $project_name ?>/pages/reports/report_advertisement.php">
                    การลงประกาศขาย รายเดือน
                  </a>
                </li>
                <li>
                  <a href="/<?= $project_name ?>/pages/reports/report_commission.php">
                    สรุปยอดค่า Token
                  </a>
                </li>
                
              </ul>
            </li>
            <!-- <li><a href="buy.html">สมาชิก</a></li> -->
            <li><a href="/<?= $project_name ?>/pages/users/index_users.php">ผู้ใช้งานระบบ</a></li>
            <?php }else{ ?>
            <!-- <li>
              <a href="/<?= $project_name ?>/pages/payments/list_payments.php">แจ้งชำระเงิน</a>
            </li> -->
            <li>
              <a href="/<?= $project_name ?>/pages/payments/list_history_pay_token.php">
                ซื้อ Token
              </a>
            </li>
            <li><a href="/<?= $project_name ?>/pages/appointments/list_appointments.php">ผู้ติดต่อขอดูบ้าน</a></li>
            <li><a href="/<?= $project_name ?>/pages/appointments/form_appointment.php">ติดต่อผู้ดูแลระบบ</a></li>
            <li>
              <a href="/<?= $project_name ?>/pages/reports/report_total_visitors.php">
                รายงานยอดผู้เข้าชม
              </a>
            </li>
            <?php } ?>
            <li><a href="/<?= $project_name ?>/pages/manage_login/logout.php">ออกจากระบบ</a></li>
            <?php } ?>
          </ul>
        </nav>
      </div>
     

    </div>
  </div>
</div>