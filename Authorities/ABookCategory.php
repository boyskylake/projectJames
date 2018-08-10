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

if ((isset($_POST["MainCategory_book"])) && ($_POST["MainCategory_book"] != "")) {
  $insertSQL = sprintf("INSERT INTO maincategory (MainCategory_book) VALUES (%s)",
                       GetSQLValueString($_POST['MainCategory_book'], "text"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($insertSQL, $condb) or die(mysql_error());

  $insertGoTo = "ABookCategory.php";
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

  $deleteGoTo = "ABookCategory.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_MainCategory = 10;
$pageNum_MainCategory = 0;
if (isset($_GET['pageNum_MainCategory'])) {
  $pageNum_MainCategory = $_GET['pageNum_MainCategory'];
}
$startRow_MainCategory = $pageNum_MainCategory * $maxRows_MainCategory;

mysql_select_db($database_condb, $condb);
$query_MainCategory = "SELECT * FROM maincategory";
$query_limit_MainCategory = sprintf("%s LIMIT %d, %d", $query_MainCategory, $startRow_MainCategory, $maxRows_MainCategory);
$MainCategory = mysql_query($query_MainCategory, $condb) or die(mysql_error());
$row_MainCategory = mysql_fetch_assoc($MainCategory);

if (isset($_GET['totalRows_MainCategory'])) {
  $totalRows_MainCategory = $_GET['totalRows_MainCategory'];
} else {
  $all_MainCategory = mysql_query($query_MainCategory);
  $totalRows_MainCategory = mysql_num_rows($all_MainCategory);
}
$totalPages_MainCategory = ceil($totalRows_MainCategory/$maxRows_MainCategory)-1;
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
              <P class="active nav-link">จัดการหมวดหมู่หลัก</P>
            </li>
            <li class="nav-item">
              <form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
                <p>หมวดหมู่หลัก</p>
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                  <label for="MainCategory">
                  <select name="MainCategory" id="MainCategory" class="form-control">
                    <?php
                      do {  
                      ?>
                      <option value="<?php echo $row_MainCategory['MainCategory_book']?>"><?php echo $row_MainCategory['MainCategory_book']?>
                      </option>
                    <?php
                      } while ($row_MainCategory = mysql_fetch_assoc($MainCategory));
                        $rows = mysql_num_rows($MainCategory);
                        if($rows > 0) {
                            mysql_data_seek($MainCategory, 0);
                      	  $row_MainCategory = mysql_fetch_assoc($MainCategory);
                        }
                    ?>
                  </select>
                </label>
                </li>
                <li class="nav-item">
                  <label for="MainCategory_book">
                  <input class="form-control" type="text" name="MainCategory_book" id="MainCategory_book">
                  <input class="btn btn-outline-primary" type="submit" name="save" id="save" value="เพิ่มหมวดหมู่หลัก">
                  </label>
                </li>
              </ul>
              </form>
            </li>
          </ul>
          <br>
          <table class="table">
            <thead>
            <tr>
              <th>ที่</th>
              <th>หมวดหมู่หลัก</th>
              <th>แก้ไข</th>
              <th>ลบข้อมูล</th>
            </tr>
            </thead>
            <?php do { ?>
              <tbody>
              <tr>
                <td><?php echo $row_MainCategory['MainCategory_id']; ?></td>
                <td><?php echo $row_MainCategory['MainCategory_book']; ?></td>
                <td><a href="ABookCategory_edie.php?MainCategory_id=<?php echo $row_MainCategory['MainCategory_id']; ?>">แก้ไข</a></td>
                <td><form name="form2" method="post" action="">
                  <input type="submit" name="delete" id="delete" value="ลบข้อมูล" onClick="return confirm('ต้องการลบข้อมูล?');">
                  <input name="MainCategory_id" type="hidden" id="MainCategory_id" value="<?php echo $row_MainCategory['MainCategory_id']; ?>">
                </form></td>
              </tr>
              <?php } while ($row_MainCategory = mysql_fetch_assoc($MainCategory)); ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <br><br>
  <?php include 'includes/footer.inc.php'; ?>
</body>

</html>
<?php
mysql_free_result($MainCategory);
?>
