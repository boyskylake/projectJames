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

$maxRows_personnel = 10;
$pageNum_personnel = 0;
if (isset($_GET['pageNum_personnel'])) {
  $pageNum_personnel = $_GET['pageNum_personnel'];
}
$startRow_personnel = $pageNum_personnel * $maxRows_personnel;

mysql_select_db($database_condb, $condb);
$query_personnel = "SELECT * FROM personnel";
$query_limit_personnel = sprintf("%s LIMIT %d, %d", $query_personnel, $startRow_personnel, $maxRows_personnel);
$personnel = mysql_query($query_limit_personnel, $condb) or die(mysql_error());
$row_personnel = mysql_fetch_assoc($personnel);

if (isset($_GET['totalRows_personnel'])) {
  $totalRows_personnel = $_GET['totalRows_personnel'];
} else {
  $all_personnel = mysql_query($query_personnel);
  $totalRows_personnel = mysql_num_rows($all_personnel);
}
$totalPages_personnel = ceil($totalRows_personnel/$maxRows_personnel)-1;
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
              <a href="#" class="active nav-link">บุคลากร</a>
            </li>
            <br>
            <li class="nav-item">
              <a class="nav-link" href="AAddPersonnel.php">* เพิ่มบุลลากร</a>
            </li>
          </ul>
        </div>
        <br>
         <div class="row">
              <div class="col-md-12">
              <table class="table">
                <thead>
                <tr>
                  <th>กศน</th>
                  <th>ชื่อ</th>
                  <th>ตำแหน่ง</th>
                  <th>เบอร์โทร</th>
                  <th>เวลาเข้า</th>
                  <th>รูป</th>
                  <th colspan="2">จัดการข้อมูล</th>
                </tr>
                </thead>
                <?php do { ?>
                  <tbody>
                  <tr>
                    <td><?php echo $row_personnel['personnel_library']; ?></td>
                    <td><?php echo $row_personnel['personnel_name']; ?></td>
                    <td><?php echo $row_personnel['personnel_position']; ?></td>
                    <td><?php echo $row_personnel['personnel_telephone']; ?></td>
                    <td><?php echo $row_personnel['personnel_date']; ?></td>
                    <td> <script type="text/javascript" src="wz_tooltip.js"></script>  
                                  <FONT class=f-m-ora onmouseover="Tip('<img src=\'../img/<?php echo $row_personnel['personnel_form']; ?>\' width=\'150\'>')"><img src="activity/images/photo.PNG" width="19" height="16" border="0" />
                    </td>
                    <td><a href="AUpdatePersonnel.php?personnel_id=<?php echo $row_personnel['personnel_id']; ?>">แก้ไข</a></td>
                    <td><a href="personnel_delete.php?personnel_id=<?php echo $row_personnel['personnel_id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูล?');">ลบ</a></td>
                  </tr>
                  <?php } while ($row_personnel = mysql_fetch_assoc($personnel)); ?>
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
mysql_free_result($personnel);
?>
