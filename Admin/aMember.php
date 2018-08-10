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

$maxRows_Member = 10;
$pageNum_Member = 0;
if (isset($_GET['pageNum_Member'])) {
  $pageNum_Member = $_GET['pageNum_Member'];
}
$startRow_Member = $pageNum_Member * $maxRows_Member;

mysql_select_db($database_condb, $condb);
$query_Member = "SELECT * FROM member";
$query_limit_Member = sprintf("%s LIMIT %d, %d", $query_Member, $startRow_Member, $maxRows_Member);
$Member = mysql_query($query_limit_Member, $condb) or die(mysql_error());
$row_Member = mysql_fetch_assoc($Member);

if (isset($_GET['totalRows_Member'])) {
  $totalRows_Member = $_GET['totalRows_Member'];
} else {
  $all_Member = mysql_query($query_Member);
  $totalRows_Member = mysql_num_rows($all_Member);
}
$totalPages_Member = ceil($totalRows_Member/$maxRows_Member)-1;
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
              <p class="active nav-link">ข้อมูลสมาชิก</p>
            </li>
            <br>
            <form class="form-inline">
              <div class="input-group">
                <input type="email" class="form-control" placeholder="">
                <div class="btn-group">
                  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ไม่ระบุ </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">คำนำหน้า</a>
                    <a class="dropdown-item" href="#">เลขบัตรประชาชน</a>
                    <a class="dropdown-item" href="#">ชื่อ</a>
                    <a class="dropdown-item" href="#">อายุ</a>
                    <a class="dropdown-item" href="#">วันที่ออกบัตร</a>
                    <a class="dropdown-item" href="#">วันที่บัตรหมดอายุ</a>
                  </div>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">ตกลง</button>
                </div>
              </div>
            </form>
          </ul>
        </div>
        <!--             <div class="row"> -->
              <div class="col-md-12">
                <br>
                <table class="table">
                  <thead>
                  <tr>
                    <th>ที่</th>
                    <th>ชื่อ</th>
                    <th>ชื่อผู้ใช้งาน</th>
                    <th>กศน</th>
                    <th>สถานะ</th>
                    <th>วันที่ออกบัตร</th>
                    <th>วันที่หมดอายุ</th>
                    <th>ดูข้อมูล</th>
                    <th>แก้ไข</th>
                    <th>ลบ</td>
                  </tr>
                  </thead>
                  <?php do { ?>
                    <tbody>
                    <tr>
                      <th scope="row"><?php echo $row_Member['member_id']; ?></th>
                      <td><?php echo $row_Member['member_Name']; ?></td>
                      <td><?php echo $row_Member['member_user']; ?></td>
                      <td><?php echo $row_Member['member_Library']; ?></td>
                      <td><a href="a_mb_status.php?status=<?php echo $row_Member['member_Status']; ?>&id=<?php echo $row_Member['member_id']; ?>"><input type="button" name="status" value="<?php echo $row_Member['member_Status']; ?>"></a></input></td>
                      <td><?php echo $row_Member['member_Registration']; ?></td>
                      <td><?php echo $row_Member['member_ExpiredDate']; ?></td>
                      <td><a href="javascript:getpopup('<?php echo $row_Member['member_id']; ?>');">ดูข้อมูล</a></td>
                      <td><a href="aUpdate.php?member_id=<?php echo $row_Member['member_id']; ?>">แก้ไข</a></td>
                      <td><a href="../RPerson_delete.php?member_id=<?php echo $row_Member['member_id']; ?>" onClick="return confirm('ต้องการลบข้อมูล?')">ลบข้อมูล</a></td>
                    </tr>
                    <?php } while ($row_Member = mysql_fetch_assoc($Member)); ?>
                  </tbody>
                </table>
              </div>
            </div>
<br>
<br>
  <script type="text/javascript">
    function getpopup(id) {
  window.open('view_aMember.php?member_id='+id,'','width=700, height=700, scrollbars=yes, resizable=no');
}
  </script>
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>
<?php
mysql_free_result($Member);
?>
