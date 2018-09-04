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

if ((isset($_POST['information_id'])) && ($_POST['information_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM information WHERE information_id=%s",
                       GetSQLValueString($_POST['information_id'], "int"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($deleteSQL, $condb) or die(mysql_error());

  $deleteGoTo = "AInformation.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_information = 10;
$pageNum_information = 0;
if (isset($_GET['pageNum_information'])) {
  $pageNum_information = $_GET['pageNum_information'];
}
$startRow_information = $pageNum_information * $maxRows_information;

mysql_select_db($database_condb, $condb);
$query_information = "SELECT * FROM information";
$query_limit_information = sprintf("%s LIMIT %d, %d", $query_information, $startRow_information, $maxRows_information);
$information = mysql_query($query_limit_information, $condb) or die(mysql_error());
$row_information = mysql_fetch_assoc($information);

if (isset($_GET['totalRows_information'])) {
  $totalRows_information = $_GET['totalRows_information'];
} else {
  $all_information = mysql_query($query_information);
  $totalRows_information = mysql_num_rows($all_information);
}
$totalPages_information = ceil($totalRows_information/$maxRows_information)-1;
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
              <a href="#" class="active nav-link">ข้อมูลทั่วไป</a>
            </li>
            <br>
            <li class="nav-item">
              <a class="nav-link" href="AAddInformation.php">* เพิ่มข้อมูลทั่วไป</a>
            </li>
          </ul>
        </div>
        <br>
            <div class="row">
              <div class="col-md-12">
              <table class="table">
                <thead>
                  
                <tr>
                  <th>ที่</th>
                  <th>ห้องสมุด</th>
                  <th>ประวัติ</th>
                  <th>ปรัชญา</th>
                  <th>วิสัยทัศน์</th>
                  <th>พันธกิจ</th>
                  <th>เวลา</th>
                  <th>แก้ไข</th>
                  <th>ลบข้อมูล</th>
                </tr>
                </thead>
                <?php do { ?>
                  <tbody>
                    
                  <tr>
                    <td><?php echo $row_information['information_id']; ?></td>
                    <td><?php echo $row_information['information_library']; ?></td>
                    <td><?php echo $row_information['information_history']; ?></td>
                    <td><?php echo $row_information['information_philosophy']; ?></td>
                    <td><?php echo $row_information['information_vision']; ?></td>
                    <td><?php echo $row_information['information_mission']; ?></td>
                    <td><?php echo $row_information['information_data']; ?></td>
                    <td><a href="AUpdateInformation.php?information_id=<?php echo $row_information['information_id']; ?>">แก้ไข</a></td>
                    <td><form name="form1" method="post" action="">
                      <input type="submit" name="delete" id="delete" value="ลบข้อมูล" onClick="return confirm('ต้องการลบข้อมูล?');">
                      <input name="information_id" type="hidden" id="information_id" value="<?php echo $row_information['information_id']; ?>">
                    </form></td>
                  </tr>
                  <?php } while ($row_information = mysql_fetch_assoc($information)); ?>
                  </tbody>
              </table>
            
        </div>
      </div>
    </div>

     <br><br>
  <?php include 'includes/footer.inc.php'; ?>
</body>

</html>
<?php
mysql_free_result($information);
?>
