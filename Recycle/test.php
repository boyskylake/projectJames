<?php require_once('Connections/condb.php'); ?>
<?php require_once('Connections/condb.php'); ?>
<?php require_once('Connections/condb.php'); ?>
<?php

   ('Connections/condb.php'); 
?>
<?php require_once('Connections/condb.php'); ?>
<?php require_once('Connections/condb.php'); ?>
<?php require_once('Connections/condb.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO maincategory (MainCategory_book) VALUES (%s)",
                       GetSQLValueString($_POST['MainCategory_book'], "text"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST['MainCategory_id'])) && ($_POST['MainCategory_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM maincategory WHERE MainCategory_id=%s",
                       GetSQLValueString($_POST['MainCategory_id'], "int"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($deleteSQL, $condb) or die(mysql_error());

  $deleteGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_POST['categories_id'])) && ($_POST['categories_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM categories WHERE categories_id=%s",
                       GetSQLValueString($_POST['categories_id'], "int"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($deleteSQL, $condb) or die(mysql_error());

  $deleteGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO categories (categories_book) VALUES (%s)",
                       GetSQLValueString($_POST['categories_book'], "text"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "test1.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO categories (categories_book) VALUES (%s)",
                       GetSQLValueString($_POST['categories_book'], "text"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO categories (categories_book) VALUES (%s)",
                       GetSQLValueString($_POST['categories_book'], "text"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO categories (categories_id, categories_book) VALUES (%s, %s)",
                       GetSQLValueString($_POST['categories_id'], "int"),
                       GetSQLValueString($_POST['categories_book'], "text"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO categories (categories_id) VALUES (%s)",
                       GetSQLValueString($_POST['categories_id'], "int"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO categories (categories_book) VALUES (%s)",
                       GetSQLValueString($_POST['categories_book'], "text"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "test.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_condb, $condb);
$query_Recordset1 = "SELECT * FROM maincategory";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $condb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$maxRows_categories = 10;
$pageNum_categories = 0;
if (isset($_GET['pageNum_categories'])) {
  $pageNum_categories = $_GET['pageNum_categories'];
}
$startRow_categories = $pageNum_categories * $maxRows_categories;

mysql_select_db($database_condb, $condb);
$query_categories = "SELECT * FROM categories";
$query_limit_categories = sprintf("%s LIMIT %d, %d", $query_categories, $startRow_categories, $maxRows_categories);
$categories = mysql_query($query_limit_categories, $condb) or die(mysql_error());
$row_categories = mysql_fetch_assoc($categories);

if (isset($_GET['totalRows_categories'])) {
  $totalRows_categories = $_GET['totalRows_categories'];
} else {
  $all_categories = mysql_query($query_categories);
  $totalRows_categories = mysql_num_rows($all_categories);
}
$totalPages_categories = ceil($totalRows_categories/$maxRows_categories)-1;
?>

<form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p>หมวดหมู่หลัก
    &nbsp;
    <label for="maincategory2"></label>
    <select name="maincategory" id="maincategory2">
      <option value="">กรุณาเลือก</option>
      <?php
do {  
?>
      <option value="<?php echo $row_Recordset1['MainCategory_book']?>"><?php echo $row_Recordset1['MainCategory_book']?></option>
      <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
    </select>
  </p>
  <p>
    <label for="MainCategory_book"></label>
    <input type="text" name="MainCategory_book" id="MainCategory_book" required placeholder="ต้องเป็นตัวอักษรเท่านั้น" />
    <input type="submit" name="save" id="save" value="เพิ่มหมวดหมู่หลัก" />
  </p>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>
<table border="1">
  <tr>
    <td>MainCategory_id</td>
    <td>MainCategory_book</td>
    <td colspan="2">จัดการข้อมูล</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['MainCategory_id']; ?></td>
      <td><?php echo $row_Recordset1['MainCategory_book']; ?></td>
      <td><a href="test_edie.php?MainCategory_id=<?php echo $row_Recordset1['MainCategory_id']; ?>">แก้ไข</a></td>
      <td><form name="form2" method="post" action="">
        <input type="submit" name="button" id="button" value="ลบข้อมูล" onClick="return confirm('ยืนยันการลบข้อมูล?');">
        <input name="MainCategory_id" type="hidden" id="MainCategory_id" value="<?php echo $row_Recordset1['MainCategory_id']; ?>">
      </form></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>
<form name="form3" method="POST" action="<?php echo $editFormAction; ?>">
  <p>
    <label for="categories"></label>
    <select name="categories" id="categories">
      <?php
do {  
?>
      <option value="<?php echo $row_categories['categories_book']?>"><?php echo $row_categories['categories_book']?></option>
      <?php
} while ($row_categories = mysql_fetch_assoc($categories));
  $rows = mysql_num_rows($categories);
  if($rows > 0) {
      mysql_data_seek($categories, 0);
	  $row_categories = mysql_fetch_assoc($categories);
  }
?>
    </select>
  </p>
  <p>
    <label for="categories_book"></label>
    <label for="categories_book"></label>
    <input type="text" name="categories_book" id="categories_book">
    <input type="submit" name="save23" id="save23" value="Submit">
  </p>
  <input type="hidden" name="MM_insert" value="form3">
</form>
<p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($Recordset1);
?>
