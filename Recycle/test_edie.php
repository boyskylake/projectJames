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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE maincategory SET MainCategory_book=%s WHERE MainCategory_id=%s",
                       GetSQLValueString($_POST['MainCategory_book'], "text"),
                       GetSQLValueString($_POST['MainCategory_id'], "int"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($updateSQL, $condb) or die(mysql_error());

  $updateGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_edie = "-1";
if (isset($_GET['MainCategory_id'])) {
  $colname_edie = $_GET['MainCategory_id'];
}
mysql_select_db($database_condb, $condb);
$query_edie = sprintf("SELECT * FROM maincategory WHERE MainCategory_id = %s", GetSQLValueString($colname_edie, "int"));
$edie = mysql_query($query_edie, $condb) or die(mysql_error());
$row_edie = mysql_fetch_assoc($edie);
$totalRows_edie = mysql_num_rows($edie);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p>แก้ไข้หมวดหมู่หลัก</p>
  <p>&nbsp;</p>
  <p>
    <input name="MainCategory_book" type="text" required="required" id="MainCategory_book" placeholder="ต้องเป็นตัวอักษรเท่านั้น" value="<?php echo $row_edie['MainCategory_book']; ?>" size="50" />
    <input type="submit" name="save" id="save" value="แก้ไขหมวดหมู่หลัก" />
  </p>
  <p>
    <input name="MainCategory_id" type="hidden" id="MainCategory_id" value="<?php echo $row_edie['MainCategory_id']; ?>" />
  </p>
  <p>&nbsp;</p>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($edie);
?>
