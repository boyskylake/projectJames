<!DOCTYPE html>
<html>

<head>
  <?php include 'includes/head.inc.php'; ?>
</head>

<body>
  <div class="container">
    <?php include 'includes/slideshow.inc.php'; ?>
  </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php include 'includes/menu.inc.php'; ?>
        </div>
      </div>
    <?php
        require_once "includes/config.php";
       $uid = $_SESSION['uid'];
       $q="SELECT * FROM `authorities` WHERE `authorities_id` = '".$uid."' ";
				$res = mysqli_query($conn,$q) or die("wrong query");
				$rs = mysqli_fetch_assoc($res);
    ?>

      <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a href="#" class="active nav-link">บรรณารักษ์</a>
              </li>
              <img class="img-fluid d-block" src="../img/<?php echo $rs['authorities_form']; ?>">
              <table class="table">
                <thead>
                  <tr>
                    <th><?php echo $rs['authorities_name']; ?></th>
                  </tr>
                </thead>
              </table>
            </ul>
        </div>
        <div class="col-md-9">
          <ul class="nav nav-pills flex-column">
            <div class="row">
            <table style="background-color: #fff; width: 100%; border: solid 1px #ccc;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ชื่อ : </strong><?php echo $rs["authorities_prefix"]; echo $rs["authorities_name"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>รหัสสมาชิก : </strong><?php echo $rs["authorities_user"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>วันเกิด : </strong><?php echo $rs["authorities_date"]."/"; echo $rs["authorities_Month"]."/"; echo $rs["authorities_Year"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>อายุ : </strong><?php echo $rs["authorities_age"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>เพศ : </strong><?php echo $rs["authorities_sex"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ที่อยู่ : </strong><?php  echo $rs["authorities_address"]; echo $rs["authorities_province"]; echo $rs["authorities_zipCode"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>กสน. : </strong><?php echo $rs["Activities_library"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>โทร. : </strong><?php echo $rs["authorities_phone1"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>โทร. : </strong><?php echo $rs["authorities_phone2"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ประเภทสมาชิก : </strong> <?php echo $rs["authorities_career"]; ?></td>
                    </tr>


                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>Email : </strong><?php echo ($rs["authorities_mail"]);?></td>
                    </tr>
                   
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ที่อยู่ที่ติดต่อได้ : </strong><?php echo ($rs["authorities_contact"]);?></td>
                    </tr>
                   
                    
                    
                  </table>
            </div>
          </ul>
        </div>
      </div>
    </div>
  <br><br>
  <?php include 'includes/footer.inc.php'; ?>
</body>

</html>