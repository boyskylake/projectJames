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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["categories_book"])) && ($_POST["categories_book"] != "")) {
  $insertSQL = sprintf("INSERT INTO categories (categories_book) VALUES (%s)",
                       GetSQLValueString($_POST['categories_book'], "text"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "ACategories.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST['categories_id'])) && ($_POST['categories_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM categories WHERE categories_id=%s",
                       GetSQLValueString($_POST['categories_id'], "int"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($deleteSQL, $condb) or die(mysql_error());

  $deleteGoTo = "ACategories.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_Subjects = 10;
$pageNum_Subjects = 0;
if (isset($_GET['pageNum_Subjects'])) {
  $pageNum_Subjects = $_GET['pageNum_Subjects'];
}
$startRow_Subjects = $pageNum_Subjects * $maxRows_Subjects;

mysql_select_db($database_condb, $condb);
$query_Subjects = "SELECT * FROM categories";
$query_limit_Subjects = sprintf("%s LIMIT %d, %d", $query_Subjects, $startRow_Subjects, $maxRows_Subjects);
$Subjects = mysql_query($query_Subjects, $condb) or die(mysql_error());
$row_Subjects = mysql_fetch_assoc($Subjects);

if (isset($_GET['totalRows_Subjects'])) {
  $totalRows_Subjects = $_GET['totalRows_Subjects'];
} else {
  $all_Subjects = mysql_query($query_Subjects);
  $totalRows_Subjects = mysql_num_rows($all_Subjects);
}
$totalPages_Subjects = ceil($totalRows_Subjects/$maxRows_Subjects)-1;
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
            <a href="#" class="active nav-link">จัดการหมวดหมู่หนังสือย่อย</a>
            </li>
            <li class="nav-item">
              <form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
                <p>หมวดหมู่ย่อย </p>    
                  <label for="MainCategory">
                  <select class="form-control" name="MainCategory" id="MainCategory">
                    <?php
                    do {  
                    ?>
                    <option  value="<?php echo $row_Subjects['categories_book']?>"><?php echo $row_Subjects['categories_book']?></option>
                    <?php
                      } while ($row_Subjects = mysql_fetch_assoc($Subjects));
                        $rows = mysql_num_rows($Subjects);
                        if($rows > 0) {
                            mysql_data_seek($Subjects, 0);
                      	  $row_Subjects = mysql_fetch_assoc($Subjects);
                        }
                      ?>
                  </select>
                  

                  <input class="form-control" type="text" name="categories_book" id="categories_book">
                  <input class="btn btn-outline-primary" name="save" type="submit" id="save" value="เพิ่มหมวดหมู่ย่อย">
                  </label>
                  
              </form>
            </li>
        </ul>
        <br>

        <table class="table">
          <thead>
          <tr>
            <th>categories_id</th>
            <th>categories_book</th>
            <th>แก้ไข</th>
            <th>ลบข้อมูล</th>
          </tr>
        </thead>
          <?php do { ?>
            <tbody>
            <tr>
              <td><?php echo $row_Subjects['categories_id']; ?></td>
              <td><?php echo $row_Subjects['categories_book']; ?></td>
              <td><a href="ACategories_edie.php?categories_id=<?php echo $row_Subjects['categories_id']; ?>">แก้ไข</a></td>
              <td><form name="form2" method="post" action="">
                <input type="submit" name="delete" id="delete" value="ลบข้อมูล" onClick="return confirm('ต้องการลบข้อมูล?');">
                <input name="categories_id" type="hidden" id="categories_id" value="<?php echo $row_Subjects['categories_id']; ?>">
              </form></td>
            </tr>
            <?php } while ($row_Subjects = mysql_fetch_assoc($Subjects)); ?>
            </tbody>
        </table>
      </div>
    </div>
  <br><br>
  <?php include 'includes/footer.inc.php'; ?>
</body>

</html>
<?php
mysql_free_result($Subjects);
?>
