  <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="Library.php" class="active nav-link">
                <i class="fa fa-home fa-home"></i>&nbsp;หน้าหลัก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="News.php">ข่าวประชาสัมพันธ์</a>
            </li>
            <li class="nav-item">
              <a href="Activities.php" class="nav-link">กิจกรรม</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Board.php">กระดานสนทนา</a>
            </li>
            <?php             
                          session_start();
                          if(isset($_SESSION['status']))
                                {
                                  echo '<li class="nav-item">
                                        
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">การจอง</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="Order.php">สั่งจอง</a>
                <a class="dropdown-item" href="Order_status.php">ติดตามการจอง</a>
              </div></li>';
                                  
                                  echo '<li class="nav-item">
                                        <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                                        </li>';
                                }
                                else
                                {
                                  echo '<li class="nav-item">
                                      <a class="nav-link" href="RPerson.php">สมัครสมาชิก</a>
                                    </li>';
                                }
             ?>
          
          </ul>