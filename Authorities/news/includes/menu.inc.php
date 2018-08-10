  <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="../Authorities.php" class="active nav-link">
                <i class="fa fa-home fa-home"></i>หน้าหลัก</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">หมวดหมู่หนังสือ</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="../Abook.php">จัดการหนังสือ</a>
                <a class="dropdown-item" href="../ABookCategory.php">จัดการหมวดหมู่หลัก</a>
                <a class="dropdown-item" href="../ACategories.php">จัดการหมวดหมู่ย่อย</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../ABookList.php">รายการจองหนังสือ</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">ข่าวประชาสัมพันธ์</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="data_news_add.php">เพิ่มข่าวประชาสัมพันธ์</a>
                <a class="dropdown-item" href="data_news.php">จัดการข่าวประชาสัมพันธ์</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">กิจกรรม</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="../activity/data_act_add.php">เพิ่มกิจกรรม</a>
                <a class="dropdown-item" href="../activity/data_act.php">จัดการกิจกรรม</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="../APersonnel.php" class="nav-link">บุคลากร</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../AInformation.php">ข้อมูลทั่วไป</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../AAnswer.php">จัดการตอบคำถาม</a>
            </li>
            <?php             
                       session_start();
                            if(isset($_SESSION['status']))
                                {
                                  echo '<li class="nav-item">
                                        <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
                                        </li>';
                                }
                                else
                                {
                                  echo '<li class="nav-item">
                                      <a class="nav-link" href="../../Library.php">ลงชื่อเข้าใช้</a>
                                    </li>';
                                }
             ?>
          
          </ul>
          <?php include '../includes/check_login.php'; ?>