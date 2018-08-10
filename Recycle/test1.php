<?php require_once('Connections/condb.php'); ?>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="Authorities/test_save.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  <table width="389" border="1">
    <tr>
      <td width="141">สถานทีออกข่าว</td>
      <td width="232"><label for="News_library"></label>
        <label for="News_library"></label>
        <select name="News_library" id="News_library">
          <option>อำเภอเมือง</option>
          <option>อำเภอกุดบาก</option>
        </select></td>
    </tr>
    <tr>
      <td>หัวข้อข่าว</td>
      <td><label for="News_subject"></label>
        <input type="text" name="News_subject" id="News_subject" required="required" /></td>
    </tr>
    <tr>
      <td>เนื้อข่าว</td>
      <td><label for="News_information"></label>
        <input type="text" name="News_information" id="News_information" required="required" /></td>
    </tr>
    <tr>
      <td>วันที่ออกข่าว</td>
      <td><label for="News_date"></label>
        <input type="date" name="News_date" id="News_date" required="required" /></td>
    </tr>
    <tr>
      <td>เขียนโดย</td>
      <td><label for="News_write"></label>
        <label for="News_write"></label>
      <input type="text" name="News_write" id="News_write" required="required" /></td>
    </tr>
    <tr>
      <td>รูปข่าว</td>
      <td><label for="News_form"></label>
        <label for="News_form" ></label>
      <input type="file" name="News_form" id="News_form" required="required"/></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="save" id="save" value="บันทึก" />
  </p>
  <p>&nbsp; </p>
</form>
<p>&nbsp;</p>
<table border="1">
  <tr>
    <td>News_id</td>
    <td>News_library</td>
    <td>News_subject</td>
    <td>News_information</td>
    <td>News_date</td>
    <td>News_write</td>
    <td>News_form</td>
    <td colspan="2">จัดการข้อมูล</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_news['News_id']; ?></td>
      <td><?php echo $row_news['News_library']; ?></td>
      <td><?php echo $row_news['News_subject']; ?></td>
      <td><?php echo $row_news['News_information']; ?></td>
      <td><?php echo $row_news['News_date']; ?></td>
      <td><?php echo $row_news['News_write']; ?></td>
      <td><img src="img/<?php echo $row_news['News_form']; ?>" width="100" /></td>
      <td><a href="test1_delete.php?News_id=<?php echo $row_news['News_id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูล?');">ลบ</a></td>
      <td><a href="test1_edie.php?News_id=<?php echo $row_news['News_id']; ?>">แก้ไข</a></td>
    </tr>
    <?php } while ($row_news = mysql_fetch_assoc($news)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($news);
?>
