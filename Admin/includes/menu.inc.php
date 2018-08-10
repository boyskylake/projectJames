            <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="addmin.php" class="active nav-link">
                <i class="fa fa-home fa-home"></i>หน้าหลัก</a>
            </li>
            <li class="nav-item">
              <a href="aMember.php" class="nav-link">จัดการสมาชิก</a>
            </li>
            <li class="nav-item">
              <a href="aAuthorities.php" class="nav-link">จัดการเจ้าหน้าที่</a>
            </li>
            <li class="nav-item">
              <a href="aBookNow.php" class="nav-link">จัดการรายการจอง</a>
            </li>

            <?php             
                    session_start();
                              if(isset($_SESSION['status']))
                                {
                                  echo '<li class="nav-item">
                                        <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                                        </li>';
                                }
                                else
                                {
                                  echo '<li class="nav-item">
                                      <a class="nav-link" href="../Library.php">ลงชื่อเข้าใช้</a>
                                    </li>';
                                }
             ?>
          
          </ul>
          <?php include 'includes/check_login.php'; ?>