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

$maxRows_book = 10;
$pageNum_book = 0;
if (isset($_GET['pageNum_book'])) {
  $pageNum_book = $_GET['pageNum_book'];
}
$startRow_book = $pageNum_book * $maxRows_book;

mysql_select_db($database_condb, $condb);
$query_book = "SELECT * FROM book";
$query_limit_book = sprintf("%s LIMIT %d, %d", $query_book, $startRow_book, $maxRows_book);
$book = mysql_query($query_book, $condb) or die(mysql_error());
$row_book = mysql_fetch_assoc($book);

if (isset($_GET['totalRows_book'])) {
  $totalRows_book = $_GET['totalRows_book'];
} else {
  $all_book = mysql_query($query_book);
  $totalRows_book = mysql_num_rows($all_book);
}
$totalPages_book = ceil($totalRows_book/$maxRows_book)-1;
?>
<!DOCTYPE html>
<html>

<head>
  <?php include 'includes/head.inc.php'; ?>
  <style>
            body{
                margin-top: 20px;
            }
            .loading{
                background-image: url("ajax-loader.gif");
                background-repeat: no-repeat;
                display: none;
                height: 100px;
                width: 100px;
            }
        </style>
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
              <p class="active nav-link">หนังสือ</p>
            </li>
          </ul>
        </div>
        <script type="text/javascript" src="jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
         $(function () {
         $("#btnSearch").click(function () {
         $.ajax({
         url: "book_search.php",
         type: "post",
         data: {itemname: $("#itemname").val(),
                booksearch: $("#booksearch").val()},
         beforeSend: function () {
         $(".loading").show();
         },
         complete: function () {
         $(".loading").hide();
         },
         success: function (data) {
         $("#list-data").html(data);
         }
         });
         });
         $("#searchform").on("keyup keypress",function(e){
         var code = e.keycode || e.which;
         if(code==13){
         $("#btnSearch").click();
         return false;
         }
         });
         });
        </script>
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <form class="form-inline" name="searchform" id="searchform">
                  <table class="table">
                      <tbody>
                        <tr>
                          <td width="233" valign="top" style="text-align: right;">&nbsp;
                            <span style="text-align: -webkit-right;">พิมพ์คำสืบค้น</span>
                          </td>
                          <td width="366" valign="top" align="left" style="" colspan="2">&nbsp;เลือกประเภทการสืบค้น</td>
                        </tr>
                        <tr>
                          <td width="233" align="right" >
                            <input type="text" name="itemname" id="itemname" class="form-control" placeholder="ข้อความ คำค้นหา!" class="form-control" autocomplete="off"> 
                          </td>
                          <td width="50" align="left">
                            <select class="form-control" name="booksearch" id="booksearch">
                              <option value="1">ชื่อเรื่อง </option>
                              <option value="2">ผู้แต่ง </option>
                              <option value="3">หัวเรื่อง </option>
                              <option value="4">สำนักพิมพ์ </option>
                              <option value="5">เลขเรียกหนังสือ </option>
                              <option value="6">ชื่อเรื่องวารสาร </option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="233" align="right" style="">
                            <input class="btn btn-outline-primary" type="button" value="เริ่มสืบค้น" name="btnSearch" id="btnSearch"> </td>
                          <td width="366" align="left" style="" colspan="2">
                            <input class="btn btn-outline-primary" type="reset" value=" ยกเลิก " name="reset"> </td>
                        </tr>
                      </tbody>
                    </table>
                     </form>
              </div>
            </div>
            <div >
              <a class="nav-link" href="AAddbook.php">* เพิ่มหนังสือใหม่</a>
              <br>
            </div>
            <div class="col-md-12">
              <div class="loading"></div>
              <div class="row" id="list-data"></div>
              <table class="table">
                <thead>
                <tr>
                  <th>ที่</th>
                  <th>รหัสหนังสือ</th>
                  <th>ชื่อหนังสือ</th>
                  <th>ISBN</th>
                  <th>นามผู้แต่ง</th>
                  <th>กศน</th>
                  <th>รูป</th>
                  <th>สถาน่ะ</th>
                  <th>ดูข้อมูล</th>
                  <th>แก้ไข</th>
                  <th>ลบข้อมูล</th>
                </tr>
                </thead>
                <?php do { ?>
                  <tbody>
                  <tr>
                    <td><?php echo $row_book['book_id']; ?></td>
                    <td><?php echo $row_book['book_BooksCode']; ?></td>
                    <td><?php echo $row_book['book_BookName']; ?></td>
                    <td><?php echo $row_book['book_ISBN']; ?></td>
                    <td><?php echo $row_book['book_Author']; ?></td>
                    <td><?php echo $row_book['book_Library']; ?></td>
                    <td><script type="text/javascript" src="wz_tooltip.js"></script>  
                                  <FONT class=f-m-ora onmouseover="Tip('<img src=\'../img/<?php echo $row_book['book_Picture']; ?>\' width=\'150\'>')"><img src="activity/images/photo.PNG" width="19" height="16" border="0" />
                    </td>
                    <td><?php echo $row_book['book_Status']; ?></td>
                    <td><a href="javascript:getpopup('<?php echo $row_book['book_id']; ?>');">ดูข้อมูล</a></td>
                    <td><a href="AUpdateBook.php?book_id=<?php echo $row_book['book_id']; ?>">แก้ไข</a></td>
                    <td><a href="ABook_delete.php?book_id=<?php echo $row_book['book_id']; ?>" onClick="return confirm('ต้องการลบข้อมูล?')">ลบข้อมูล</a></td>
                  </tr>
                  <?php } while ($row_book = mysql_fetch_assoc($book)); ?>
                </tbody>
              </table>
            </div>
       
    </div>

 <script type="text/javascript">
    function getpopup(id) {
  window.open('view_book.php?book_id='+id,'','width=700, height=700, scrollbars=yes, resizable=no');
}
  </script>
  <br><br>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <div class="container">
    <div class="text-center bg-primary text-white py">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="display-4">Library</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="https://www.facebook.com/" class="text-white" target="_blank">
              <i class="fa fa-fw fa-facebook fa-3x mx-3"></i>
            </a>
            <a href="https://twitter.com/" class="text-white" target="_blank">
              <i class="fa fa-fw fa-twitter fa-3x mx-3"></i>
            </a>
            <a href="https://plus.google.com/" class="text-white" target="_blank">
              <i class="fa fa-fw fa-3x fa-google-plus mx-3"></i>
            </a>
            <a href="https://www.instagram.com/" class="text-white" target="_blank">
              <i class="fa fa-fw fa-instagram fa-3x mx-3"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</body>

</html>
<?php
mysql_free_result($book);
?>
