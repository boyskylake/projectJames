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

$maxRows_activities = 10;
$pageNum_activities = 0;
if (isset($_GET['pageNum_activities'])) {
  $pageNum_activities = $_GET['pageNum_activities'];
}
$startRow_activities = $pageNum_activities * $maxRows_activities;

mysql_select_db($database_condb, $condb);
$query_activities = "SELECT * FROM activities";
$query_limit_activities = sprintf("%s LIMIT %d, %d", $query_activities, $startRow_activities, $maxRows_activities);
$activities = mysql_query($query_limit_activities, $condb) or die(mysql_error());
$row_activities = mysql_fetch_assoc($activities);

if (isset($_GET['totalRows_activities'])) {
  $totalRows_activities = $_GET['totalRows_activities'];
} else {
  $all_activities = mysql_query($query_activities);
  $totalRows_activities = mysql_num_rows($all_activities);
}
$totalPages_activities = ceil($totalRows_activities/$maxRows_activities)-1;
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
              <a href="#" class="active nav-link">กิจกรรม</a>
            </li>
            <br>
            <li class="nav-item">
              <a class="nav-link" href="AAddActivities.php">* เพิ่มกิจกรรม</a>
            </li>
          </ul>
        </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <thead>
                <tr>
                  <th>Activities_id</th>
                  <th>Activities_library</th>
                  <th>Activities_subject</th>
                  <th>Activities_information</th>
                  <th>Activities_date</th>
                  <th>Activities_ write</th>
                  <th>Activities_form</th>
                  <th>จัดการข้อมูล</th>
                </tr>
                </thead>
                <?php do { ?>
                  <tbody>
                  <tr>
                    <td><?php echo $row_activities['Activities_id']; ?></td>
                    <td><?php echo $row_activities['Activities_library']; ?></td>
                    <td><?php echo $row_activities['Activities_subject']; ?></td>
                    <td><?php echo $row_activities['Activities_information']; ?></td>
                    <td><?php echo $row_activities['Activities_date']; ?></td>
                    <td><?php echo $row_activities['Activities_ write']; ?></td>
                    <td><?php echo $row_activities['Activities_form']; ?></td>
                    <td><a href="AUpdateActivities.php">แก้ไข</a></td>
                    <td>ลบ</td>
                  </tr>
                  <?php } while ($row_activities = mysql_fetch_assoc($activities)); ?>
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
mysql_free_result($activities);
?>
