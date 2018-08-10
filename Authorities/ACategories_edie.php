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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE categories SET categories_book=%s WHERE categories_id=%s",
                       GetSQLValueString($_POST['categories_book'], "text"),
                       GetSQLValueString($_POST['categories_id'], "int"));

  mysql_select_db($database_condb, $condb);
  $Result1 = mysql_query($updateSQL, $condb) or die(mysql_error());

  $updateGoTo = "ACategories.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_categories = "-1";
if (isset($_GET['categories_id'])) {
  $colname_categories = $_GET['categories_id'];
}
mysql_select_db($database_condb, $condb);
$query_categories = sprintf("SELECT * FROM categories WHERE categories_id = %s", GetSQLValueString($colname_categories, "int"));
$categories = mysql_query($query_categories, $condb) or die(mysql_error());
$row_categories = mysql_fetch_assoc($categories);
$totalRows_categories = mysql_num_rows($categories);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body>
  <div class="container">
    <div class="py-5 text-center" style="background-image: url(&quot;https://pingendo.github.io/templates/sections/assets/cover_event.jpg&quot;);"></div>
  </div>
  <div class="">
    <div class="container">
     
      
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item"><a href="#" class="active nav-link">แก้ไขหมวดหมู่หนังสือย่อย</a></li>
            <li class="nav-item">
              <form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
                <p>
                  <label for="categories_book"></label>
                  <label for="categories_book2"></label>
                  <input name="categories_book" type="text" id="categories_book2" value="<?php echo $row_categories['categories_book']; ?>">
                  <input type="submit" name="save" id="save" value="บันทึก">
                  <input name="categories_id" type="hidden" id="categories_id" value="<?php echo $row_categories['categories_id']; ?>">
                </p>
                <input type="hidden" name="MM_update" value="form1">
              </form>
            </li>
            <div class="row">
              <div class="col-md-12"></div>
            </div>
            <form class="form-inline">
              <div class="input-group">
                <div class="input-group-append">
                  <div class="input-group">
                    <div class="input-group-append">
                      <div class="btn-group">        </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="col-md" align="right"></div>
          </ul>
        </div>
    </div>
</div>
  </div>
  <div class="container">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
      <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
    </pingendo>
  </div>
</body>

</html>
<?php
mysql_free_result($categories);
?>
