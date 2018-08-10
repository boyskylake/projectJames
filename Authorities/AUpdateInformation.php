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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE information SET information_library=%s, information_history=%s, information_philosophy=%s, information_vision=%s, information_mission=%s, information_data=%s WHERE information_id=%s",
                       GetSQLValueString($_POST['information_library'], "text"),
                       GetSQLValueString($_POST['information_history'], "text"),
                       GetSQLValueString($_POST['information_philosophy'], "text"),
                       GetSQLValueString($_POST['information_vision'], "text"),
                       GetSQLValueString($_POST['information_mission'], "text"),
                       GetSQLValueString($_POST['information_data'], "date"),
                       GetSQLValueString($_POST['information_id'], "int"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($updateSQL, $condb) or die(mysql_error());

  $updateGoTo = "AInformation.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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
$query_library = "SELECT * FROM library";
$library = mysql_query($query_library, $condb) or die(mysql_error());
$row_library = mysql_fetch_assoc($library);
$totalRows_library = mysql_num_rows($library);
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
              <a href="#" class="active nav-link">แก้ไขข้อมูลทั่วไป</a>
            </li>
            <li class="nav-item">
            <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <div align="center">
    <table width="389" border="1">
      <tr>
        <td width="141">ห้องสมุด</td>
        <td width="232"><label for="News_place"></label>
          <label for="information_library"></label>
          <select name="information_library" id="information_library" title="<?php echo $row_information['information_library']; ?>">
           <?php
                        do { 
                            echo '<option value="';
                          if($row_information['information_library'] == $row_library['Library_Library']){
                            echo $row_library['Library_Library'].'" selected';
                          }else{
                            echo $row_library['Library_Library'].'"';
                          }
                            echo '>'.$row_library['Library_Library'].'</option>';
       
                            } while ($row_library = mysql_fetch_assoc($library));
                              $rows = mysql_num_rows($library);
                              if($rows > 0) {
                                  mysql_data_seek($library, 0);
                                $row_library = mysql_fetch_assoc($library);
                              }
                 ?>
            </select>
          </td>
        </tr>
      <tr>
        <td>ประวัติความเป็นมา</td>
        <td><label for="News_topics"></label>
          <textarea name="information_history" rows="3" class="form-control" id="information_history"><?php echo $row_information['information_history']; ?></textarea></td>
        </tr>
      <tr>
        <td>ปรัชญา</td>
        <td><label for="News_meat">
          <textarea name="information_philosophy" rows="3" class="form-control" id="information_philosophy"><?php echo $row_information['information_philosophy']; ?></textarea>
          </label></td>
        </tr>
      <tr>
        <td>วิสัยทัศน์</td>
        <td><label for="News_date">
          <textarea name="information_vision" rows="3" class="form-control" id="information_vision"><?php echo $row_information['information_vision']; ?></textarea>
          </label></td>
        </tr>
      <tr>
        <td>พันธกิจ</td>
        <td><label for="News_Write"></label>
          <textarea name="information_mission" rows="3" class="form-control" id="information_mission"><?php echo $row_information['information_mission']; ?></textarea></td>
        </tr>
      <tr>
        <td>วันที่</td>
        <td><label for="information_data"></label>
          <input name="information_data" type="text" id="information_data" value="<?php echo $row_information['information_data']; ?>" /></td>
        </tr>
    </table>
    <p>
      <input name="information_id" type="hidden" id="information_id" value="<?php echo $row_information['information_id']; ?>">
    </p>
  </div>
  <p align="right">
    <input type="submit" name="save" id="save" value="บันทึก">
    <input type="submit" name="delete" id="delete" value="ลบข้อมูล">
  </p>
  <input type="hidden" name="MM_update" value="form1">
            </form>
            </li>
            <div class="row">
              <div class="col-md-12"></div>
            </div>
          </ul>
        </div>
      </div>

     <br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>

</html>
<?php
mysql_free_result($information);
?>
