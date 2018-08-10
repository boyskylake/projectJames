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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO information (information_library, information_history, information_philosophy, information_vision, information_mission, information_data) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['information_library'], "text"),
                       GetSQLValueString($_POST['information_history'], "text"),
                       GetSQLValueString($_POST['information_philosophy'], "text"),
                       GetSQLValueString($_POST['information_vision'], "text"),
                       GetSQLValueString($_POST['information_mission'], "text"),
                       GetSQLValueString($_POST['information_data'], "date"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "AInformation.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_information = "-1";
if (isset($_GET['information_id'])) {
  $colname_information = $_GET['information_id'];
}
mysql_select_db($database_condb, $condb);
$query_information = sprintf("SELECT * FROM information WHERE information_id = %s", GetSQLValueString($colname_information, "int"));
$information = mysql_query($query_information, $condb) or die(mysql_error());
$row_information = mysql_fetch_assoc($information);
$totalRows_information = mysql_num_rows($information);

mysql_select_db($database_condb, $condb);
$query_Library = "SELECT * FROM library";
$Library = mysql_query($query_Library, $condb) or die(mysql_error());
$row_Library = mysql_fetch_assoc($Library);
$totalRows_Library = mysql_num_rows($Library);
?>
<!DOCTYPE html>
<html>

<head>
   <?php
    include("includes/head.inc.php");
   ?>
</head>

<body>
  <div class="container">
    <?php
    include("includes/slideshow.inc.php");
   ?>
  </div>
<!--   <div class=""> -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           <?php
              include("includes/menu.inc.php");
           ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">เพิ่มข้อมูลทั่วไป</a>
            </li>
            <li class="nav-item">
                        <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST" onsubmit="return checkma()">
                          <div align="center">
                            <table width="500" border="1">
                              <tr>
                                <td width="141">ห้องสมุด</td>
                                <td width="232"><label for="News_place"></label>
                                  <label for="information_mission"></label>
                                  <select name="information_library" id="information_library">
                                    <option value="">[ ] เลือกห้องสมุด</option>
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
                                <td>ประวัติความเป็นมา</td>
                                <td><label for="information_mission"></label>
                                <textarea name="information_history" rows="3" class="form-control" id="information_history"></textarea></td>
                              </tr>
                              <tr>
                                <td>ปรัชญา</td>
                                <td><label for="information_mission"></label>
                                <textarea name="information_philosophy" rows="3" class="form-control" id="information_philosophy"></textarea></td>
                              </tr>
                              <tr>
                                <td>วิสัยทัศน์</td>
                                <td><label for="information_mission"></label>
                                <textarea name="information_vision" rows="3" class="form-control" id="information_vision"></textarea></td>
                              </tr>
                              <tr>
                                <td>พันธกิจ</td>
                                <td><label for="information_mission"></label>
                                <textarea name="information_mission" rows="3" class="form-control" id="information_mission"></textarea></td>
                              </tr>
                              <tr>
                                <td>วันที่</td>
                                <td><label for="News_form"></label>
                                  <label for="information_data"></label>
                                  <label for="information_data"></label>
                                  <input type="date" name="information_data" id="information_data"></td>
                              </tr>
                            </table>
                            <p align="center">
                              <input type="submit" name="save" id="save" value="บันทึกข้อมูล">
                              <input type="reset" name="delete" id="delete" value="ลบข้อมูล">
                            </p>
                          </div>
                          <input type="hidden" name="MM_insert" value="form1">
              </form>
            </li>
            <div class="row">
              <div class="col-md-12"></div>
            </div>
          </ul>
        </div>
    </div>
    </div>
<script language="JavaScript" type="text/javascript">
  function checkma()
  {
  d=document.form1
  if(d.information_library.value=="")
  {
  alert("กรุณาเลือก ห้องสมุด");
  d.information_library.focus();
  return false;
  }
  else if (d.information_history.value=="") {
  alert("กรุณากรอก ประวัติความเป็นมา");
  d.information_history.focus();
  return false;
  }else if (d.information_philosophy.value=="") {
  alert("กรุณากรอก ปรัชญา");
  d.information_philosophy.focus();
  return false;
  }else if (d.information_vision.value=="") {
  alert("กรุณากรอก วิสัยทัศน์");
  d.information_vision.focus();
  return false;
  }else if (d.information_mission.value=="") {
  alert("กรุณากรอก พันธกิจ");
  d.information_mission.focus();
  return false;
  }else if (d.information_data.value=="") {
  alert("กรุณาใส่ วันที่");
  d.information_data.focus();
  return false;
  }
  else
  return true;
  }
</script>
      <br>
      <br>
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>
<?php
mysql_free_result($information);

mysql_free_result($Library);
?>
