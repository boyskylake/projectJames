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

date_default_timezone_set("Asia/Bangkok");
$date = date('Y-m-d');
?>
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
      
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">เพิ่มบุคลากร</a>
            </li>
            <li class="nav-item">
                        <form action="AAddPersonnel_save.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return checkma()">
                          <div align="center">
                            <table  width="600" border="1">
                              <tr>
                                <td width="120">ห้องสมุด</td>
                                <td width="464"><label for="News_place"></label>
                                  <label for="personnel_library"></label>
                                  <select name="personnel_library" id="personnel_library">
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
                                <td>ชื่อ-สกุล</td>
                                <td><label for="personnel_name"></label>
                                <input name="personnel_name" type="text" id="personnel_name" size="50" /></td>
                              </tr>
                              <tr>
                                <td>ตำแหน่ง</td>
                                <td><label for="personnel_position"></label>
                                <input type="text" name="personnel_position" id="personnel_position" /></td>
                              </tr>
                              <tr>
                                <td>เบอร์โทร</td>
                                <td><label for="personnel_telephone"></label>
                                <input type="text" name="personnel_telephone" id="personnel_telephone" /></td>
                              </tr>
                              <tr>
                                <td>วันที่</td>
                                <td><label for="personnel_date"></label>
                                <input readonly type="text" name="personnel_date" id="personnel_date" value="<?php echo $date; ?>"></td>
                              </tr>
                              <tr>
                                <td>รูป</td>
                                <td><label for="personnel_form"></label>
                                <input type="file" name="personnel_form" id="personnel_form">
                                <label for="News_Write"></label></td>
                              </tr>
                              
                            </table>
                            <p align="center">
                              <input type="submit" name="save" id="save" value="บันทึก">
                              <input type="reset" name="delete" id="delete" value="ลบข้อมูล">
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
    <script language="JavaScript" type="text/javascript">
  function checkma()
  {
  d=document.form1
  if(d.personnel_library.value=="")
  {
  alert("กรุณาเลือก ห้องสมุด");
  d.personnel_library.focus();
  return false;
  }
  else if (d.personnel_name.value=="") {
  alert("กรุณากรอก ชื่อ-สกุล");
  d.personnel_name.focus();
  return false;
  }else if (d.personnel_position.value=="") {
  alert("กรุณากรอก ตำแหน่ง");
  d.personnel_position.focus();
  return false;
  }else if (d.personnel_telephone.value=="") {
  alert("กรุณากรอก เบอร์โทร");
  d.personnel_telephone.focus();
  return false;
  }else if (d.personnel_date.value=="") {
  alert("กรุณากรอก วันที่");
  d.personnel_date.focus();
  return false;
  }else if (d.personnel_form.value=="") {
  alert("กรุณาใส่ รูป");
  d.personnel_form.focus();
  return false;
  }
  else
  return true;
  }
</script>
    <br><br>
  <?php include 'includes/footer.inc.php'; ?>
</body>

</html>
<?php
mysql_free_result($Library);
?>
