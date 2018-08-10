        <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <p class="active nav-link">ข้อมูลทั่วไป</p>
              </li>
              <li class="nav-item">
                <a href="LibraryHistory.php" class="nav-link">ประวัติความเป็นมา</a>
              </li>
              <li class="nav-item">
                <a href="vision.php" class="nav-link">ปรัชญา วิสัยทัศน์ พันธกิจ</a>
              </li>
              <li class="nav-item">
                <a href="personnel.php" class="nav-link">บุคลากรประจำงานบริการสารสนเทศ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ContactUs.php">ติดต่อเรา</a>
              </li>
              <li class="nav-item">
                <a href="order.php" class="nav-link">ระเบียบและมารยาทการใช้บริการห้องสมุด</a>
              </li>
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <p class="active nav-link">งานบริการสารสนเทศ</p>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Booking.php">บริการจอง – คืนทรัพยากรสารสนเทศ</a>
                </li>
                <li class="nav-item">
                  <a href="Subscription.php" class="nav-link">การสมัครสมาชิกห้องสมุด</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="CardRenewal.php">การต่ออายุบัตรสมาชิกห้องสมุด</a>
                </li>
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <p class="active nav-link">ล็อกอินเข้าใช้งาน</p>
                  </li>
                  <div class="row">
                    <div class="col-md-12">
                      <?php
                                // require('config.php');
                                if(isset($_SESSION['status']))
                                {
                                  echo '<h2>Hello :  '.$_SESSION['unm'].'</h2>';
                                }
                                else
                                {
                                  echo '<form action="../includes/process_login.php" method="POST">
                                      <div class="form-group">
                                      <label>UserName</label>
                                      <input type="text" name="usernm" class="form-control"> </div>
                                      <div class="form-group">
                                      <label>Password</label>
                                      <input type="password" name="pwd" class="form-control"> </div>
                                      <select name="ddlSelect" id="ddlSelect">
                                      <option value="member">สมาชิก</option>
                                      <option value="staff">บรรณารักษ์</option>
                                      <option value="admin">เจ้าหน้าที่</option>
                                      </select>
                                          <input class="btn btn-primary" type="submit" name="ok" value="ตกลง"/>
                                      </form>';
                                }
                      ?>

                      <br>
                    </div>
                  </div>
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                      <p class="active nav-link">เครือข่ายห้องสมุด</p>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">ห้องสมุดประชาชน "เฉลิมราชกุมารี" อำเภอเมืองสกลนคร</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">ห้องสมุดประชาชน กศน. อำเภอเมืองสกลนคร</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">ห้องสมุดประชาชน กศน. อำเภอกุดบาก</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">ห้องสมุดประชาชน กศน. อำเภอวาริชภูมิ</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">ห้องสมุดประชาชน กศน อำเภอพรรณนานิคม</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">ห้องสมุดประชาชน กศน. อำเภอปลาป่า</a>
                    </li>
                  </ul>
                </ul>
              </ul>
            </ul>