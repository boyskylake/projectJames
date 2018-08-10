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