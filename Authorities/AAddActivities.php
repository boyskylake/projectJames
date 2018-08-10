<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body>
  <div class="container">
    <div class="py-5 text-center" style="background-image: url(&quot;https://pingendo.github.io/templates/sections/assets/cover_event.jpg&quot;);"></div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="Authorities.php" class="active nav-link">
                <i class="fa fa-home fa-home"></i>&nbsp;หน้าหลัก</a>
            </li>
            <li class="nav-item">
              <a href="Bookcategory.php" class="nav-link">หมวดหมู่หนังสือ</a>
            </li>
            <li class="nav-item">
              <a href="Abook.php" class="nav-link">หนังสือ</a>
            </li>
            <li class="nav-item">
              <a href="ANews.php" class="nav-link">ข่าวประชาสัมพันธ์</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AActivities.php">กิจกรรม</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ABookList.php">รายการจองหนังสือ</a>
            </li>
            <li class="nav-item">
              <a href="APersonnel.php" class="nav-link">บุคลากร</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AInformation.php">ข้อมูลทั่วไป</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AAnswer.php">จัดการตอบคำถาม</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">เพิ่มกิจกรรม</a>
            </li>
            <div class="row">
              <div class="col-md-12">
                <form id="form1" name="form1" method="post" action="">
                  <div align="center">
                    <table >
                      <tr>
                        <td width="141">รหัสกิจกรรม</td>
                        <td width="232"><label for="News_id"></label>
                        <input type="text" name="News_id" id="News_id" /></td>
                      </tr>
                      <tr>
                        <td>ห้องสมุด</td>
                        <td><label for="News_place"></label>
                        <input type="text" name="News_place" id="News_place" /></td>
                      </tr>
                      <tr>
                        <td>หัวข้อกิจกรรม</td>
                        <td><label for="News_topics"></label>
                        <input type="text" name="News_topics" id="News_topics" /></td>
                      </tr>
                      <tr>
                        <td>รายละเอียดกิจกรรม</td>
                        <td><label for="News_meat"></label>
                        <input type="text" name="News_meat" id="News_meat" /></td>
                      </tr>
                      <tr>
                        <td>วันที่</td>
                        <td><label for="News_date"></label>
                        <input type="text" name="News_date" id="News_date" /></td>
                      </tr>
                      <tr>
                        <td>เขียนโดย</td>
                        <td><label for="News_Write"></label>
                        <input type="text" name="News_Write" id="News_Write" /></td>
                      </tr>
                      <tr>
                        <td>รูปกิจกรรม</td>
                        <td><label for="News_form"></label>
                        <input type="text" name="News_form" id="News_form" />
                        <input type="submit" name="button" id="button" value="..."></td>
                      </tr>
                    </table>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md" align="right">
              <a href="#" class="btn btn-outline-primary">บันทึก</a>
              <a href="#" class="btn btn-outline-primary">เครียร์</a>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
      <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
    </pingendo>
  </div>
</body>

</html>