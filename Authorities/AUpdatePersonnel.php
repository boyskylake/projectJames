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

mysql_select_db($database_condb, $condb);
$query_library = "SELECT * FROM library";
$library = mysql_query($query_library, $condb) or die(mysql_error());
$row_library = mysql_fetch_assoc($library);
$totalRows_library = mysql_num_rows($library);

$colname_personnel = "-1";
if (isset($_GET['personnel_id'])) {
  $colname_personnel = $_GET['personnel_id'];
}
mysql_select_db($database_condb, $condb);
$query_personnel = sprintf("SELECT * FROM personnel WHERE personnel_id = %s", GetSQLValueString($colname_personnel, "int"));
$personnel = mysql_query($query_personnel, $condb) or die(mysql_error());
$row_personnel = mysql_fetch_assoc($personnel);
$totalRows_personnel = mysql_num_rows($personnel);
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
              <a href="#" class="active nav-link">แก้ไขบุคลากร</a>
              <form action="AUpdatePersonnel_Update.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return checkma()">
                <div align="center">
                  <table width="600" border="1">
                    <tr>
                      <td width="120">ห้องสมุด</td>
                      <td width="464"><label for="News_place2"></label>
                        <label for="personnel_library"></label>
                        <select name="personnel_library" id="personnel_library" title="<?php echo $row_personnel['personnel_library']; ?>">
                           <?php
                          do { 
                            echo '<option value="';
                          if($row_personnel['personnel_library'] == $row_library['Library_Library']){
                            echo $row_library['Library_Library'].'" selected';
                          }else{
                            echo $row_library['Library_Library'].'"';
                          }
                            echo '>'.$row_library['Library_Library'].'</option>';
                          
                            } while ($row_library = mysql_fetch_assoc($library));
                              $rows = mysql_num_rows($library);
                              if($rows > 0) {
                                  mysql_data_seek($library, 0);
                            	  $row_library = mysql_fetch_assoc($library);
                              }
                            ?>
                      </select></td>
                    </tr>
                    <tr>
                      <td>ชื่อ-สกุล</td>
                      <td><label for="personnel_name"></label>
                        <input name="personnel_name" type="text" id="personnel_name" value="<?php echo $row_personnel['personnel_name']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>ตำแหน่ง</td>
                      <td><label for="personnel_position"></label>
                        <input name="personnel_position" type="text" id="personnel_position" value="<?php echo $row_personnel['personnel_position']; ?>" /></td>
                    </tr>
                    <tr>
                      <td>เบอร์โทร</td>
                      <td><label for="personnel_telephone"></label>
                        <input name="personnel_telephone" type="text" id="personnel_telephone" value="<?php echo $row_personnel['personnel_telephone']; ?>" /></td>
                    </tr>
                    <tr>
                      <td>วันที่</td>
                      <td><label for="personnel_date"></label>
                        <input readonly name="personnel_date" type="text" id="personnel_date" value="<?php echo $row_personnel['personnel_date']; ?>"></td>
                    </tr>
                    <tr>
                      <td>รูป</td>
                      <td><label for="personnel_form"></label>
                        <input type="file" name="personnel_form" id="personnel_form">
                        <label for="News_Write"><img src="../img/<?php echo $row_personnel['personnel_form']; ?>" width="100">
                          <input name="personnel_id" type="hidden" id="personnel_id" value="<?php echo $row_personnel['personnel_id']; ?>">
                          <input name="txt_file_delete" type="hidden" id="txt_file_delete" value="<?php echo $row_personnel['personnel_form']; ?>">
                        </label></td>
                    </tr>
                  </table>
                  <p align="center">&nbsp;</p>
                  <p align="center">
                    <input type="submit" name="save" id="save" value="บันทึก">
                    <input type="reset" name="delete" id="delete" value="ลบข้อมูล">
                  </p>
                </div>
              </form>
            </li>
            <div class="row">
              <div class="col-md-12"></div>
            </div>
            <div class="col-md" align="right"></div>
          </ul>
        </div>
      </div>
<script language="JavaScript" type="text/javascript">
  function checkma()
  {
  d=document.form1
  if(d.personnel_library.value=="")
  {
  alert("กรุณาเลือก ห้องสมุด");
  d.personnel_library.focus();
  return false;
  }
  else if (d.personnel_name.value=="") {
  alert("กรุณากรอก ชื่อ-สกุล");
  d.personnel_name.focus();
  return false;
  }else if (d.personnel_position.value=="") {
  alert("กรุณากรอก ตำแหน่ง");
  d.personnel_position.focus();
  return false;
  }else if (d.personnel_telephone.value=="") {
  alert("กรุณากรอก เบอร์โทร");
  d.personnel_telephone.focus();
  return false;
  }else if (d.personnel_date.value=="") {
  alert("กรุณากรอก วันที่");
  d.personnel_date.focus();
  return false;
  }
  else
  return true;
  }
</script>
    <br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>

</html>
<?php
mysql_free_result($library);

mysql_free_result($personnel);
?>
