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

$maxRows_nesw = 10;
$pageNum_nesw = 0;
if (isset($_GET['pageNum_nesw'])) {
  $pageNum_nesw = $_GET['pageNum_nesw'];
}
$startRow_nesw = $pageNum_nesw * $maxRows_nesw;

mysql_select_db($database_condb, $condb);
$query_nesw = "SELECT * FROM news";
$query_limit_nesw = sprintf("%s LIMIT %d, %d", $query_nesw, $startRow_nesw, $maxRows_nesw);
$nesw = mysql_query($query_limit_nesw, $condb) or die(mysql_error());
$row_nesw = mysql_fetch_assoc($nesw);

if (isset($_GET['totalRows_nesw'])) {
  $totalRows_nesw = $_GET['totalRows_nesw'];
} else {
  $all_nesw = mysql_query($query_nesw);
  $totalRows_nesw = mysql_num_rows($all_nesw);
}
$totalPages_nesw = ceil($totalRows_nesw/$maxRows_nesw)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="Authorities/test_save.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>สถานทีออกข่าว</td>
      <td><label for="News_library"></label>
      <input type="text" name="News_library" id="News_library" /></td>
    </tr>
    <tr>
      <td>หัวข้อข่าว</td>
      <td><label for="News_subject"></label>
      <input type="text" name="News_subject" id="News_subject" /></td>
    </tr>
    <tr>
      <td>เนื้อข่าว</td>
      <td><label for="News_information"></label>
      <input type="text" name="News_information" id="News_information" /></td>
    </tr>
    <tr>
      <td>วันที่ออกข่าว</td>
      <td><label for="News_date"></label>
      <input type="text" name="News_date" id="News_date" /></td>
    </tr>
    <tr>
      <td>เขียนโดย</td>
      <td><label for="News_write"></label>
      <input type="text" name="News_write" id="News_write" /></td>
    </tr>
    <tr>
      <td>รูปข่าว</td>
      <td><label for="News_form"></label>
      <input type="file" name="News_form" id="News_form" /></td>
    </tr>
  </table>
  <input type="submit" name="save" id="save" value="บันทึก" />
</form>
<table border="1">
  <tr>
    <td>News_id</td>
    <td>News_library</td>
    <td>News_subject</td>
    <td>News_information</td>
    <td>News_date</td>
    <td>News_write</td>
    <td>News_form</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_nesw['News_id']; ?></td>
      <td><?php echo $row_nesw['News_library']; ?></td>
      <td><?php echo $row_nesw['News_subject']; ?></td>
      <td><?php echo $row_nesw['News_information']; ?></td>
      <td><?php echo $row_nesw['News_date']; ?></td>
      <td><?php echo $row_nesw['News_write']; ?></td>
      <td><img src="img/<?php echo $row_nesw['News_form']; ?>" /></td>
    </tr>
    <?php } while ($row_nesw = mysql_fetch_assoc($nesw)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($nesw);
?>
