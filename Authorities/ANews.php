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

$maxRows_news = 10;
$pageNum_news = 0;
if (isset($_GET['pageNum_news'])) {
  $pageNum_news = $_GET['pageNum_news'];
}
$startRow_news = $pageNum_news * $maxRows_news;

mysql_select_db($database_condb, $condb);
$query_news = "SELECT * FROM news";
$query_limit_news = sprintf("%s LIMIT %d, %d", $query_news, $startRow_news, $maxRows_news);
$news = mysql_query($query_limit_news, $condb) or die(mysql_error());
$row_news = mysql_fetch_assoc($news);

if (isset($_GET['totalRows_news'])) {
  $totalRows_news = $_GET['totalRows_news'];
} else {
  $all_news = mysql_query($query_news);
  $totalRows_news = mysql_num_rows($all_news);
}
$totalPages_news = ceil($totalRows_news/$maxRows_news)-1;
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
              <a href="#" class="active nav-link">ข่าวประชาสัมพันธ์</a>
            </li>
            <br>
            <li class="nav-item">
              <a class="nav-link" href="AAddNews.php">* เพิ่มข่าวประชาสัมพันธ์</a>
            </li>
          </ul>
         </div>
          <br>
            <div class="row">
              <div class="col-md-12">
              <table class="table">
                <thead>
                <tr>
                  <th>News_library</th>
                  <th>News_subject</th>
                  <th>News_information</th>
                  <th>News_date</th>
                  <th>News_write</th>
                  <th>News_form</th>
                  <th colspan="2">จัดการข้อมูล</th>
                </tr>
                </thead>
                <?php do { ?>
                  <tbody>
                  <tr>
                    <td><?php echo $row_news['News_library']; ?></td>
                    <td><?php echo $row_news['News_subject']; ?></td>
                    <td><?php echo $row_news['News_information']; ?></td>
                    <td><?php echo $row_news['News_date']; ?></td>
                    <td><?php echo $row_news['News_write']; ?></td>
                    <td><img src="../img/<?php echo $row_news['News_form']; ?>" width="100"></td>
                    <td><a href="AUpdateNews.php?News_id=<?php echo $row_news['News_id']; ?>">แก้ไข</a></td>
                    <td><a href="ANews _delete.php?News_id=<?php echo $row_news['News_id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูล?');">ลบ</a></td>
                  </tr>
                  <?php } while ($row_news = mysql_fetch_assoc($news)); ?>
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
mysql_free_result($news);
?>
