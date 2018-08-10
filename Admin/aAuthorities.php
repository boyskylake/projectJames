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

$maxRows_authorities = 10;
$pageNum_authorities = 0;
if (isset($_GET['pageNum_authorities'])) {
  $pageNum_authorities = $_GET['pageNum_authorities'];
}
$startRow_authorities = $pageNum_authorities * $maxRows_authorities;

mysql_select_db($database_condb, $condb);
$query_authorities = "SELECT * FROM authorities";
$query_limit_authorities = sprintf("%s LIMIT %d, %d", $query_authorities, $startRow_authorities, $maxRows_authorities);
$authorities = mysql_query($query_limit_authorities, $condb) or die(mysql_error());
$row_authorities = mysql_fetch_assoc($authorities);

if (isset($_GET['totalRows_authorities'])) {
  $totalRows_authorities = $_GET['totalRows_authorities'];
} else {
  $all_authorities = mysql_query($query_authorities);
  $totalRows_authorities = mysql_num_rows($all_authorities);
}
$totalPages_authorities = ceil($totalRows_authorities/$maxRows_authorities)-1;
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
      
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">ข้อมูลเจ้าหน้าที่</a>
            </li>
            <br>
            <form class="form-inline">
              <div class="input-group">
                <input type="email" class="form-control" placeholder="">
                <div class="btn-group">
                  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ไม่ระบุ </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">คำนำหน้า</a>
                    <a class="dropdown-item" href="#">ชื่อ</a>
                    <a class="dropdown-item" href="#">ที่อยู่</a>
                    <a class="dropdown-item" href="#">วันที่สมัคร</a>
                  </div>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">ตกลง</button>
                </div>
              </div>
            </form>
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a href="aAddAuthorities.php" class="nav-link">*เพิ่มเจ้าหนัาที่</a>
              </li>
            </ul>
             </ul>
        </div>

        <div class="col-md-12">
                <table class="table">
                  <thead>
                  <tr>
                    <th>ที่</th>
                    <th>ชื่อ</th>
                    <th>ผู้ใชงาน</th>
                    <th>กศน</th>
                    <th>รูป</th>
                    <th>เบอร์ติดต่อ</th>
                    <th>ดูข้อมูล</th>
                    <th>จัดการข้อมูล</th>
                    <th>ลบ</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php do { ?>
 
                    <tr>
                      <td><?php echo $row_authorities['authorities_id']; ?></td>
                      <td><?php echo $row_authorities['authorities_name']; ?></td>
                      <td><?php echo $row_authorities['authorities_user']; ?></td>
                      <td><?php echo $row_authorities['Activities_library']; ?></td>
                      <td><img src="../img/<?php echo $row_authorities['authorities_form']; ?>" width="150"></td>
                      <td><?php echo $row_authorities['authorities_phone1']; ?></td>
                      <td><a href="aAuthorities_Viewall.php?authorities_id=<?php echo $row_authorities['authorities_id']; ?>">ดูข้อมูล</a></td>
                      <td><a href="aUpdateAuthorities.php?authorities_id=<?php echo $row_authorities['authorities_id']; ?>">แก้ไข</a></td>
                      <td><a href="aAddAuthorities_delete.php?authorities_id=<?php echo $row_authorities['authorities_id']; ?>" onClick="return confirm('ต้องการลบข้อมูล?')">ลบข้อมูล</a></td>
                    </tr>
                    <?php } while ($row_authorities = mysql_fetch_assoc($authorities)); ?>
                    </tbody>
                </table>

      </div>
    </div>

    <br>
    <br>
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>
<?php
mysql_free_result($authorities);
?>
