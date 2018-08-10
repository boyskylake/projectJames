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

mysql_select_db($database_condb, $condb);
$query_Library = "SELECT * FROM library";
$Library = mysql_query($query_Library, $condb) or die(mysql_error());
$row_Library = mysql_fetch_assoc($Library);
$totalRows_Library = mysql_num_rows($Library);

$colname_News = "-1";
if (isset($_GET['News_id'])) {
  $colname_News = $_GET['News_id'];
}
mysql_select_db($database_condb, $condb);
$query_News = sprintf("SELECT * FROM news WHERE News_id = %s", GetSQLValueString($colname_News, "int"));
$News = mysql_query($query_News, $condb) or die(mysql_error());
$row_News = mysql_fetch_assoc($News);
$totalRows_News = mysql_num_rows($News);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="test1_Update.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>แก้ไข</p>
  <table width="389" border="1">
    <tr>
      <td width="141">สถานทีออกข่าว</td>
      <td width="232"><label for="News_library3"></label>
        <label for="News_library3"></label>
        <select name="News_library" id="News_library3" title="<?php echo $row_News['News_library']; ?>">
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
      <td>หัวข้อข่าว</td>
      <td><label for="News_subject"></label>
        <input name="News_subject" type="text" required="required" id="News_subject" value="<?php echo $row_News['News_subject']; ?>" /></td>
    </tr>
    <tr>
      <td>เนื้อข่าว</td>
      <td><label for="News_information"></label>
        <input name="News_information" type="text" required="required" id="News_information" value="<?php echo $row_News['News_information']; ?>" /></td>
    </tr>
    <tr>
      <td>วันที่ออกข่าว</td>
      <td><label for="News_date"></label>
        <input name="News_date" type="date" required="required" id="News_date" value="<?php echo $row_News['News_date']; ?>" /></td>
    </tr>
    <tr>
      <td>เขียนโดย</td>
      <td><label for="News_write"></label>
        <label for="News_write"></label>
        <input name="News_write" type="text" required="required" id="News_write" value="<?php echo $row_News['News_write']; ?>" /></td>
    </tr>
    <tr>
      <td>รูปข่าว</td>
      <td><label for="News_form"></label>
        <label for="News_form" ></label>
        <label for="News_form"></label>
        <input type="file" name="News_form" id="News_form" />
        <input name="News_id" type="hidden" id="News_id" value="<?php echo $row_News['News_id']; ?>" /></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="save" id="save" value="บันทึก" />
  </p>
  <p><img src="img/<?php echo $row_News['News_form']; ?>" width="150" /></p>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
mysql_free_result($Library);

mysql_free_result($News);
?>
