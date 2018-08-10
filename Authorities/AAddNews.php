<?php require_once('../Connections/condb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_condb, $condb);
$query_Library = "SELECT * FROM library";
$Library = mysql_query($query_Library, $condb) or die(mysql_error());
$row_Library = mysql_fetch_assoc($Library);
$totalRows_Library = mysql_num_rows($Library);
?>
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
    
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
            <a href="#" class="active nav-link">เพิ่มข่าวประชาสัมพันธ์</a>
            <form action="AAddNews_save.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <div align="center">
                <table width="800" border="1">
                  <tr>
                    <td width="141">สถานทีออกข่าว</td>
                    <td width="232"><label for="News_place"></label>
                      <label for="News_subject"></label>
                      <select name="News_library" id="News_library">
                        <option value="">เลือกห้องสมุด</option>
                        <?php
do {  
?>
                        <option value="<?php echo $row_Library['Library_Library']?>"><?php echo $row_Library['Library_Library']?></option>
                        <?php
} while ($row_Library = mysql_fetch_assoc($Library));
  $rows = mysql_num_rows($Library);
  if($rows > 0) {
      mysql_data_seek($Library, 0);
	  $row_Library = mysql_fetch_assoc($Library);
  }
?>
                    </select></td>
                  </tr>
                  <tr>
                    <td>หัวข้อข่าว</td>
                    <td><label for="News_subject"></label>
                    <textarea name="News_subject" cols="80" id="News_subject"></textarea></td>
                  </tr>
                  <tr>
                    <td>เนื้อข่าว</td>
                    <td><label for="News_information"></label>
                    <textarea name="News_information" cols="80" id="News_information"></textarea></td>
                  </tr>
                  <tr>
                    <td>วันที่ออกข่าว</td>
                    <td><label for="News_date"></label>
                    <input type="date" name="News_date" id="News_date" /></td>
                  </tr>
                  <tr>
                    <td>เขียนโดย</td>
                    <td><label for="News_write"></label>
                    <input name="News_write" type="text" id="News_write" size="50" /></td>
                  </tr>
                  <tr>
                    <td>รูปข่าว</td>
                    <td><label for="News_form"></label>
                      <label for="News_form2"></label>
                    <input type="file" name="News_form" id="News_form2"></td>
                  </tr>
                </table>
                <p align="right">
                  <input type="submit" name="save" id="save" value="บันทึก">
                  <input type="submit" name="delete" id="delete" value="ลบข้อมูล">
                </p>
              </div>
            </form>
            </li>
            <div class="row">
              <div class="col-md-12"></div>
            </div>
            <div class="col-md" align="right"></div>
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
<?php
mysql_free_result($Library);
?>
