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

$colname_book = "-1";
if (isset($_GET['book_id'])) {
  $colname_book = $_GET['book_id'];
}
mysql_select_db($database_condb, $condb);
$query_book = sprintf("SELECT * FROM book WHERE book_id = %s", GetSQLValueString($colname_book, "int"));
$book = mysql_query($query_book, $condb) or die(mysql_error());
$row_book = mysql_fetch_assoc($book);
$totalRows_book = mysql_num_rows($book);

mysql_select_db($database_condb, $condb);
$query_library = "SELECT * FROM library";
$library = mysql_query($query_library, $condb) or die(mysql_error());
$row_library = mysql_fetch_assoc($library);
$totalRows_library = mysql_num_rows($library);

mysql_select_db($database_condb, $condb);
$query_MainCategory = "SELECT * FROM maincategory";
$MainCategory = mysql_query($query_MainCategory, $condb) or die(mysql_error());
$row_MainCategory = mysql_fetch_assoc($MainCategory);
$totalRows_MainCategory = mysql_num_rows($MainCategory);

mysql_select_db($database_condb, $condb);
$query_Categories = "SELECT * FROM categories";
$Categories = mysql_query($query_Categories, $condb) or die(mysql_error());
$row_Categories = mysql_fetch_assoc($Categories);
$totalRows_Categories = mysql_num_rows($Categories);
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
              <a href="#" class="active nav-link">แก้ไขหนังสือ</a>
            </li>
            <li class="nav-item">
              <form action="AAddBook_Update.php" method="post" enctype="multipart/form-data" name="form1">
                <table width="700" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" class="fix_text">
                  <tbody>
                    <tr bordercolor="#EBF7FC" bgcolor="#EBF7FC" class="topic_text">
                      <td colspan="2">                      
                    </tr>
                    <tr>
                      <td width="194" valign="middle" nowrap="" bordercolor="#FFFFFF">ห้องสมุด : </td>
                      <td width="600" bordercolor="#FFFFFF"><label for="book_ReceivedDate"></label>
                        <select name="book_Library" id="book_Library" title="<?php echo $row_book['book_Library']; ?>">
                          <!--  <option value="<?php echo $row_book['book_Library']?>"><?php echo $row_book['book_Library']?></option> -->
                          <?php
                        do { 
                            echo '<option value="';
                          if($row_book['book_Library'] == $row_library['Library_Library']){
                            echo $row_library['Library_Library'].'" selected';
                          }else{
                            echo $row_library['Library_Library'].'"';
                          }
                            echo '>'.$row_library['Library_Library'].'</option>';
                          ?>
                          <?php
                          // if ($row_book['book_Library'] == $row_library['Library_Library']) {
                          //   echo "<option value='".$row_library['Library_Library']."' selected> ".$row_library['Library_Library']."</option>";
                          //  }
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
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_BooksCode" type="text" class="textfield_input" id="book_BooksCode" value="<?php echo $row_book['book_BooksCode']; ?>" size="20" maxlength="13">
                        &nbsp;(รหัสไม่เกิน 12 หลัก) </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">วันที่รับหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><label for="book_ReceivedDate"></label>
                        <input name="book_ReceivedDate" type="date" id="book_ReceivedDate" value="<?php echo $row_book['book_ReceivedDate']; ?>">
                        <a name="calRdate"></a><a href="#calRdate" onclick="javascript:NewCal('Rdate','ddmmyyyy')"><img src="http://lrls.nfe.go.th/LRLS/style/icon-backend/operation/calendar-icon.png" border="0" align="absmiddle" alt="เลือกวันที่"></a> &nbsp;&nbsp;&nbsp;&nbsp; </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">คำนำหน้านาม :</td>
                      <td bordercolor="#FFFFFF"><input name="book_NounPrefix" type="text" class="textfield_input" id="book_NounPrefix" value="<?php echo $row_book['book_NounPrefix']; ?>" size="25" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">นามผู้แต่ง :</td>
                      <td bordercolor="#FFFFFF"><input name="book_Author" type="text" class="textfield_input" id="book_Author" value="<?php echo $row_book['book_Author']; ?>" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">นามแฝง : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Alias" type="text" class="textfield_input" id="book_Alias" value="<?php echo $row_book['book_Alias']; ?>" size="25" maxlength="250">
                        &nbsp;&nbsp;&nbsp;&nbsp;นามผู้แปล :
                      <input name="book_Translator" type="text" class="textfield_input" id="book_Translator" value="<?php echo $row_book['book_Translator']; ?>" size="57" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">นามปากกา : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Penname" type="text" class="textfield_input" id="book_Penname" value="<?php echo $row_book['book_Penname']; ?>" size="57" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_BookName" type="text" class="textfield_input" id="book_BookName" value="<?php echo $row_book['book_BookName']; ?>" size="100" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อหนังสือ (ต่อ) : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Bookname1" type="text" class="textfield_input" id="book_Bookname1" value="<?php echo $row_book['book_Bookname1']; ?>" size="100" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">เลขที่หมู่หนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_BookNumber" type="text" class="textfield_input" id="book_BookNumber" value="<?php echo $row_book['book_BookNumber']; ?>" size="25" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หมวดหลัก : </td>
                      <td bordercolor="#FFFFFF"><label for="book_MainCategory"></label>
                        <select name="book_MainCategory" id="book_MainCategory" title="<?php echo $row_book['book_MainCategory']; ?>">
                          <?php
                            do {
                              echo '<option value="';
                                if($row_book['book_MainCategory'] == $row_MainCategory['MainCategory_book']){
                                  echo $row_MainCategory['MainCategory_book'].'" selected';
                                }else{
                                  echo $row_MainCategory['MainCategory_book'].'"';
                                }
                                  echo '>'.$row_MainCategory['MainCategory_book'].'</option>';
                          ?>
                          <?php
                          } while ($row_MainCategory = mysql_fetch_assoc($MainCategory));
                            $rows = mysql_num_rows($MainCategory);
                            if($rows > 0) {
                                mysql_data_seek($MainCategory, 0);
                          	  $row_MainCategory = mysql_fetch_assoc($MainCategory);
                            }
                          ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หมวดย่อย : </td>
                      <td bordercolor="#FFFFFF"><label for="book_Subjects"></label>
                        <select name="book_Subjects" id="book_Subjects" title="<?php echo $row_book['book_Subjects']; ?>">
                          <?php
                            do {
                              echo '<option value="';
                                if($row_book['book_Subjects'] == $row_Categories['categories_book']){
                                  echo $row_Categories['categories_book'].'" selected';
                                }else{
                                  echo $row_Categories['categories_book'].'"';
                                }
                                  echo '>'.$row_Categories['categories_book'].'</option>';
                            } 
                            while ($row_Categories = mysql_fetch_assoc($Categories));
                              $rows = mysql_num_rows($Categories);
                              if($rows > 0) {
                                  mysql_data_seek($Categories, 0);
                            	  $row_Categories = mysql_fetch_assoc($Categories);
                              }
                            ?>
                        </select></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อย่อผู้แต่ง/เลขที่/ชื่อย่อหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Initials" type="text" class="textfield_input" id="book_Initials" value="<?php echo $row_book['book_Initials']; ?>" size="100" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อชุดหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_BookSet" type="text" class="textfield_input" id="book_BookSet" value="<?php echo $row_book['book_BookSet']; ?>" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อสำนักพิมพ์ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Publisher" type="text" class="textfield_input" id="book_Publisher" value="<?php echo $row_book['book_Publisher']; ?>" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ครั้งที่พิมพ์ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Print" type="text" class="textfield_input" id="book_Print" value="<?php echo $row_book['book_Print']; ?>" size="5" maxlength="5">
                        &nbsp;&nbsp;&nbsp;ราคา :
                        <input name="book_Price" type="text" class="textfield_input" id="book_Price" value="<?php echo $row_book['book_Price']; ?>" size="10" maxlength="250">
                        &nbsp;บาท&nbsp;&nbsp;&nbsp;จำนวนหน้า :
                        <input name="book_NumberOfPages" type="text" class="textfield_input" id="book_NumberOfPages" value="<?php echo $row_book['book_NumberOfPages']; ?>" size="5" maxlength="5">
                        &nbsp;หน้า&nbsp;&nbsp;&nbsp;  ปีที่พิมพ์ :
                        <input name="book_PublishedYear" type="text" class="textfield_input" id="book_PublishedYear" value="<?php echo $row_book['book_PublishedYear']; ?>" size="5" maxlength="4">
                        &nbsp;&nbsp;&nbsp;เล่มที่ :
                      <input name="book_BookNumber1" type="text" class="textfield_input" id="book_BookNumber1" value="<?php echo $row_book['book_BookNumber1']; ?>" size="5" maxlength="5"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หัวเรื่อง (1) : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Heading1" type="text" class="textfield_input" id="book_Heading1" value="<?php echo $row_book['book_Heading1']; ?>" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หัวเรื่อง (2) : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Heading2" type="text" class="textfield_input" id="book_Heading2" value="<?php echo $row_book['book_Heading2']; ?>" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หัวเรื่อง (3) : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Heading3" type="text" class="textfield_input" id="book_Heading3" value="<?php echo $row_book['book_Heading3']; ?>" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ISBN : </td>
                      <td bordercolor="#FFFFFF"><input name="book_ISBN" type="text" class="textfield_input" id="book_ISBN" value="<?php echo $row_book['book_ISBN']; ?>" size="50" maxlength="250">
                        &nbsp;&nbsp;&nbsp;&nbsp;ขนาดหนังสือ :
                        <input name="book_BookSize" type="text" class="textfield_input" id="book_BookSize" value="<?php echo $row_book['book_BookSize']; ?>" size="5" maxlength="5">
                        &nbsp;&nbsp;&nbsp;&nbsp;ฉบับที่ :
                      <input name="book_No" type="text" class="textfield_input" id="book_No" value="<?php echo $row_book['book_No']; ?>" size="10" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">แหล่งที่มา : </td>
                      <td bordercolor="#FFFFFF"><select name="book_Source" class="combo_input" id="book_Source" title="<?php echo $row_book['book_Source']; ?>">
                        <option value="" <?php if ($row_book['book_Source'] == ''){echo "selected";}?>>กรุณาระบุ แหล่งที่มา</option>
                        <option value="งบประมาณ" <?php if ($row_book['book_Source'] == 'งบประมาณ'){echo "selected";}?>>งบประมาณ</option>
                        <option value="การบริจาค" <?php if ($row_book['book_Source'] == 'การบริจาค'){echo "selected";}?>>การบริจาค</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">สถานที่เก็บ : </td>
                      <td bordercolor="#FFFFFF"><select name="book_StorageLocation" class="combo_input" id="book_StorageLocation" title="<?php echo $row_book['book_StorageLocation']; ?>">
                        <option value="" <?php if ($row_book['book_StorageLocation'] == ''){echo "selected";} ?>>กรุณาระบุ สถานที่เก็บ</option>
                        <option value="ไม่ใส่รหัสสถานที่" <?php if ($row_book['book_StorageLocation'] == 'ไม่ใส่รหัสสถานที่'){echo "selected";} ?>>ไม่ใส่รหัสสถานที่</option>
                        <option value="ตู้ หมวด 000" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 000'){echo "selected";} ?>>ตู้ หมวด 000</option>
                        <option value="ตู้ หมวด 100" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 100'){echo "selected";} ?>>ตู้ หมวด 100</option>
                        <option value="ตู้ หมวด 200" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 200'){echo "selected";} ?>>ตู้ หมวด 200</option>
                        <option value="ตู้ หมวด 300" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 300'){echo "selected";} ?>>ตู้ หมวด 300</option>
                        <option value="ตู้ หมวด 400" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 400'){echo "selected";} ?>>ตู้ หมวด 400</option>
                        <option value="ตู้ หมวด 500" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 500'){echo "selected";} ?>>ตู้ หมวด 500</option>
                        <option value="ตู้ หมวด 600" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 600'){echo "selected";} ?>>ตู้ หมวด 600</option>
                        <option value="ตู้ หมวด 700" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 700'){echo "selected";} ?>>ตู้ หมวด 700</option>
                        <option value="ตู้ หมวด 800" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 800'){echo "selected";} ?>>ตู้ หมวด 800</option>
                        <option value="ตู้ หมวด 900" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หมวด 900'){echo "selected";} ?>>ตู้ หมวด 900</option>
                        <option value="ตู้ แบบเรียน กศน. ระดับประถม" <?php if ($row_book['book_StorageLocation'] == 'ตู้ แบบเรียน กศน. ระดับประถม'){echo "selected";} ?>>ตู้ แบบเรียน กศน. ระดับประถม</option>
                        <option value="ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนต้น" <?php if ($row_book['book_StorageLocation'] == 'ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนต้น'){echo "selected";} ?>>ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนต้น</option>
                        <option value="ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนปลาย" <?php if ($row_book['book_StorageLocation'] == 'ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนปลาย'){echo "selected";} ?>>ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนปลาย</option>
                        <option value="ตู้ แบบเรียน กศน. ระดับ อื่น ๆ" <?php if ($row_book['book_StorageLocation'] == 'ตู้ แบบเรียน กศน. ระดับ อื่น ๆ'){echo "selected";} ?>>ตู้ แบบเรียน กศน. ระดับ อื่น ๆ</option>
                        <option value="ตู้ อ้างอิง" <?php if ($row_book['book_StorageLocation'] == 'ตู้ อ้างอิง'){echo "selected";} ?>>ตู้ อ้างอิง</option>
                        <option value="ตู้ นวนิยาย" <?php if ($row_book['book_StorageLocation'] == 'ตู้ นวนิยาย'){echo "selected";} ?>>ตู้ นวนิยาย</option>
                        <option value="ตู้ เรื่องสั้น" <?php if ($row_book['book_StorageLocation'] == 'ตู้ เรื่องสั้น'){echo "selected";} ?>>ตู้ เรื่องสั้น</option>
                        <option value="ตู้ หนังสือแปล" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หนังสือแปล'){echo "selected";} ?>>ตู้ หนังสือแปล</option>
                        <option value="ตู้ หนังสือเด็กและเยาวชน" <?php if ($row_book['book_StorageLocation'] == 'ตู้ หนังสือเด็กและเยาวชน'){echo "selected";} ?>>ตู้ หนังสือเด็กและเยาวชน</option>
                        <option value="ตู้ เอกสาร มสธ." <?php if ($row_book['book_StorageLocation'] == 'ตู้ เอกสาร มสธ.'){echo "selected";} ?>>ตู้ เอกสาร มสธ.</option>
                        <option value="ตู้ เอกสาร รามคำแหง" <?php if ($row_book['book_StorageLocation'] == 'ตู้ เอกสาร รามคำแหง'){echo "selected";} ?>>ตู้ เอกสาร รามคำแหง</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">รูปภาพประกอบ : </td>
                      <td bordercolor="#FFFFFF"><label for="book_Picture"></label>
                        <input type="file" name="book_Picture" id="book_Picture">
                        <img src="../img/<?php echo $row_book['book_Picture']; ?>" width="100">
                        <input hidden type="text" name="txt_file_delete" id="txt_file_delete" value="<?php echo $row_book['book_Picture']; ?>">
                      </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">วันจำหน่าย : </td>
                      <td bordercolor="#FFFFFF"><label for="book_DateOfIssue"></label>
                        <input name="book_DateOfIssue" type="date" id="book_DateOfIssue" value="<?php echo $row_book['book_DateOfIssue']; ?>">
                        &nbsp;<a name="calSdate"></a><a href="#calSdate" onclick="javascript:NewCal('Sdate','ddmmyyyy')"><img src="http://lrls.nfe.go.th/LRLS/style/icon-backend/operation/calendar-icon.png" border="0" align="absmiddle" alt="เลือกวันที่"></a> &nbsp;&nbsp;&nbsp;&nbsp; </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">สถานะ : </td>
                      <td bordercolor="#FFFFFF"><select name="book_Status" class="combo_input" id="book_Status" title="<?php echo $row_book['book_Status']; ?>">
                        <option value="ปกติ" <?php if ($row_book['book_Status'] == 'ปกติ'){echo "selected";}?>>ปกติ</option>
                        <option value="ไม่ใช้งาน" <?php if ($row_book['book_Status'] == 'ไม่ใช้งาน'){echo "selected";}?>>ไม่ใช้งาน</option>
                        <option value="รอลงรายการ" <?php if ($row_book['book_Status'] == 'รอลงรายการ'){echo "selected";}?>>รอลงรายการ</option>
                        <option value="ส่งซ่อม" <?php if ($row_book['book_Status'] == 'ส่งซ่อม'){echo "selected";}?>>ส่งซ่อม</option>
                        <option value="จำหน่าย" <?php if ($row_book['book_Status'] == 'จำหน่าย'){echo "selected";}?>>จำหน่าย</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td bgcolor="#CCCCCC" colspan="2" bordercolor="#CCCCCC"></td>
                    </tr>
                    <tr align="right" bordercolor="#F4F4F4" bgcolor="#F4F4F4">
                      <td colspan="2"><input type="submit" name="Submit" value="บันทึก" class="button_standard" onclick="return  Valid_Manage_Book();">
                        <input type="reset" name="Submit" value="ยกเลิก" class="button_standard_cancle">
                        <input type="hidden" name="Page" value="">
                        <input type="hidden" name="ID_Lr_Book" value="">
                        <input type="hidden" name="Flag_Save" value=""></td>
                    </tr>
                  </tbody>
                </table>
                <input name="book_id" type="hidden" id="book_id" value="<?php echo $row_book['book_id']; ?>">
              </form>
            </li>
          
        </div>
      </div>
  <br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>

</html>
<?php
mysql_free_result($book);

mysql_free_result($library);

mysql_free_result($MainCategory);

mysql_free_result($Categories);
?>
