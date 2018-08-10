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
$query_maincategory = "SELECT * FROM maincategory";
$maincategory = mysql_query($query_maincategory, $condb) or die(mysql_error());
$row_maincategory = mysql_fetch_assoc($maincategory);
$totalRows_maincategory = mysql_num_rows($maincategory);

mysql_select_db($database_condb, $condb);
$query_categorise = "SELECT * FROM categories";
$categorise = mysql_query($query_categorise, $condb) or die(mysql_error());
$row_categorise = mysql_fetch_assoc($categorise);
$totalRows_categorise = mysql_num_rows($categorise);

mysql_select_db($database_condb, $condb);
$query_Library = "SELECT * FROM library";
$Library = mysql_query($query_Library, $condb) or die(mysql_error());
$row_Library = mysql_fetch_assoc($Library);
$totalRows_Library = mysql_num_rows($Library);
?>
<!DOCTYPE html>
<html>

<head>
   <?php
    include("includes/head.inc.php");
   ?>
</head>

<body>
  <div class="container">
    <?php
    include("includes/slideshow.inc.php");
   ?>
  </div>
<!--   <div class=""> -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           <?php
              include("includes/menu.inc.php");
           ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <p class="active nav-link">เพิ่มหนังสือ</p>
            </li>
            <li class="nav-item">
              <form action="AAddBook_save.php" method="post" enctype="multipart/form-data" name="form1">
                <table width="700" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" class="fix_text">
                  <tbody>
                    <tr bordercolor="#EBF7FC" bgcolor="#EBF7FC" class="topic_text">
                      <td colspan="2">                
                    </tr>
                    <tr>
                      <td width="194" valign="middle" nowrap="" bordercolor="#FFFFFF">ห้องสมุด : </td>
                      <td width="600" bordercolor="#FFFFFF"><label for="book_ReceivedDate"></label>
                        <select name="book_Library" id="book_Library">
                          <option value="">[] ระบุ</option>
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
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_BooksCode" type="text" class="textfield_input" id="book_BooksCode" value="" size="20" maxlength="13">
                        &nbsp;(รหัสไม่เกิน 12 หลัก) </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">วันที่รับหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><label for="book_ReceivedDate"></label>
                        <input type="date" name="book_ReceivedDate" id="book_ReceivedDate">
                        <a name="calRdate"></a><a href="#calRdate" onclick="javascript:NewCal('Rdate','ddmmyyyy')"><img src="http://lrls.nfe.go.th/LRLS/style/icon-backend/operation/calendar-icon.png" border="0" align="absmiddle" alt="เลือกวันที่"></a> &nbsp;&nbsp;&nbsp;&nbsp; </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">คำนำหน้านาม :</td>
                      <td bordercolor="#FFFFFF"><input name="book_NounPrefix" type="text" class="textfield_input" id="book_NounPrefix" value="" size="25" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">นามผู้แต่ง :</td>
                      <td bordercolor="#FFFFFF"><input name="book_Author" type="text" class="textfield_input" id="book_Author" value="" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">นามแฝง : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Alias" type="text" class="textfield_input" id="book_Alias" value="" size="25" maxlength="250">
                        &nbsp;&nbsp;&nbsp;&nbsp;นามผู้แปล :
                        <input name="book_Translator" type="text" class="textfield_input" id="book_Translator" value="" size="57" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">นามปากกา : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Penname" type="text" class="textfield_input" id="book_Penname" value="" size="57" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_BookName" type="text" class="textfield_input" id="book_BookName" value="" size="100" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อหนังสือ (ต่อ) : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Bookname1" type="text" class="textfield_input" id="book_Bookname1" value="" size="100" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">เลขที่หมู่หนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_BookNumber" type="text" class="textfield_input" id="book_BookNumber" value="" size="25" maxlength="250">
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หมวดหลัก : </td>
                      <td bordercolor="#FFFFFF"><label for="book_MainCategory"></label>
                        <select name="book_MainCategory" id="book_MainCategory">
                          <option value="">[ ] ไม่ใส่หมวดหมู่</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_maincategory['MainCategory_book']?>"><?php echo $row_maincategory['MainCategory_book']?></option>
                          <?php
} while ($row_maincategory = mysql_fetch_assoc($maincategory));
  $rows = mysql_num_rows($maincategory);
  if($rows > 0) {
      mysql_data_seek($maincategory, 0);
	  $row_maincategory = mysql_fetch_assoc($maincategory);
  }
?>
                        </select></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หมวดย่อย : </td>
                      <td bordercolor="#FFFFFF"><label for="book_Subjects"></label>
                        <select name="book_Subjects" id="book_Subjects">
                          <option value="">[ ] ไม่ใส่หมวดหมู่</option>
                          <?php
                            do {  
                          ?>
                          <option value="<?php echo $row_categorise['categories_book']?>"><?php echo $row_categorise['categories_book']?></option>
                          <?php
                            } while ($row_categorise = mysql_fetch_assoc($categorise));
                              $rows = mysql_num_rows($categorise);
                              if($rows > 0) {
                                  mysql_data_seek($categorise, 0);
                            	  $row_categorise = mysql_fetch_assoc($categorise);
                              }
                          ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อย่อผู้แต่ง/เลขที่/ชื่อย่อหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Initials" type="text" class="textfield_input" id="book_Initials" value="" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อชุดหนังสือ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_BookSet" type="text" class="textfield_input" id="book_BookSet" value="" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อสำนักพิมพ์ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Publisher" type="text" class="textfield_input" id="book_Publisher" value="" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ครั้งที่พิมพ์ : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Print" type="text" class="textfield_input" id="book_Print" value="" size="5" maxlength="5">
                        &nbsp;&nbsp;&nbsp;ราคา :
                        <input name="book_Price" type="text" class="textfield_input" id="book_Price" value="" size="10" maxlength="250">
                        &nbsp;บาท&nbsp;&nbsp;&nbsp;จำนวนหน้า :
                        <input name="book_NumberOfPages" type="text" class="textfield_input" id="book_NumberOfPages" value="" size="5" maxlength="5">
                        &nbsp;หน้า&nbsp;&nbsp;&nbsp;  ปีที่พิมพ์ :
                        <input name="book_PublishedYear" type="text" class="textfield_input" id="book_PublishedYear" value="" size="5" maxlength="4">
                        &nbsp;&nbsp;&nbsp;เล่มที่ :
                        <input name="book_BookNumber1" type="text" class="textfield_input" id="book_BookNumber1" value="" size="5" maxlength="5"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หัวเรื่อง (1) : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Heading1" type="text" class="textfield_input" id="book_Heading1" value="" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หัวเรื่อง (2) : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Heading2" type="text" class="textfield_input" id="book_Heading2" value="" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">หัวเรื่อง (3) : </td>
                      <td bordercolor="#FFFFFF"><input name="book_Heading3" type="text" class="textfield_input" id="book_Heading3" value="" size="100" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ISBN : </td>
                      <td bordercolor="#FFFFFF"><input name="book_ISBN" type="text" class="textfield_input" id="book_ISBN" value="" size="50" maxlength="250">
                        &nbsp;&nbsp;&nbsp;&nbsp;ขนาดหนังสือ :
                        <input name="book_BookSize" type="text" class="textfield_input" id="book_BookSize" value="" size="5" maxlength="5">
                        &nbsp;&nbsp;&nbsp;&nbsp;ฉบับที่ :
                        <input name="book_No" type="text" class="textfield_input" id="book_No" value="" size="10" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">แหล่งที่มา : </td>
                      <td bordercolor="#FFFFFF"><select name="book_Source" class="combo_input" id="book_Source">
                        <option value="กรุณาระบุ แหล่งที่มา" selected="SELECTED">กรุณาระบุ แหล่งที่มา</option>
                        <option value="งบประมาณ">งบประมาณ</option>
                        <option value="การบริจาค">การบริจาค</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">สถานที่เก็บ : </td>
                      <td bordercolor="#FFFFFF"><select name="book_StorageLocation" class="combo_input" id="book_StorageLocation">
                        <option value="กรุณาระบุ สถานที่เก็บ" selected="SELECTED">กรุณาระบุ สถานที่เก็บ</option>
                        <option value="ไม่ใส่รหัสสถานที่" selected="SELECTED">ไม่ใส่รหัสสถานที่</option>
                        <option value="ตู้ หมวด 000">ตู้ หมวด 000</option>
                        <option value="ตู้ หมวด 100">ตู้ หมวด 100</option>
                        <option value="ตู้ หมวด 200">ตู้ หมวด 200</option>
                        <option value="ตู้ หมวด 300">ตู้ หมวด 300</option>
                        <option value="ตู้ หมวด 400">ตู้ หมวด 400</option>
                        <option value="ตู้ หมวด 500">ตู้ หมวด 500</option>
                        <option value="ตู้ หมวด 600">ตู้ หมวด 600</option>
                        <option value="ตู้ หมวด 700">ตู้ หมวด 700</option>
                        <option value="ตู้ หมวด 800">ตู้ หมวด 800</option>
                        <option value="ตู้ หมวด 900">ตู้ หมวด 900</option>
                        <option value="ตู้ แบบเรียน กศน. ระดับประถม">ตู้ แบบเรียน กศน. ระดับประถม</option>
                        <option value="ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนต้น">ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนต้น</option>
                        <option value="ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนปลาย">ตู้ แบบเรียน กศน. ระดับมัธยมศึกษาตอนปลาย</option>
                        <option value="ตู้ แบบเรียน กศน. ระดับ อื่น ๆ">ตู้ แบบเรียน กศน. ระดับ อื่น ๆ</option>
                        <option value="ตู้ อ้างอิง">ตู้ อ้างอิง</option>
                        <option value="ตู้ นวนิยาย">ตู้ นวนิยาย</option>
                        <option value="ตู้ เรื่องสั้น">ตู้ เรื่องสั้น</option>
                        <option value="ตู้ หนังสือแปล">ตู้ หนังสือแปล</option>
                        <option value="ตู้ หนังสือเด็กและเยาวชน">ตู้ หนังสือเด็กและเยาวชน</option>
                        <option value="ตู้ เอกสาร มสธ.">ตู้ เอกสาร มสธ.</option>
                        <option value="ตู้ เอกสาร รามคำแหง">ตู้ เอกสาร รามคำแหง</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">รูปภาพประกอบ : </td>
                      <td bordercolor="#FFFFFF"><label for="book_Picture"></label>
                      <input type="file" name="book_Picture" id="book_Picture"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">วันจำหน่าย : </td>
                      <td bordercolor="#FFFFFF"><label for="book_DateOfIssue"></label>
                        <input type="date" name="book_DateOfIssue" id="book_DateOfIssue">
                        &nbsp;<a name="calSdate"></a><a href="#calSdate" onclick="javascript:NewCal('Sdate','ddmmyyyy')"><img src="http://lrls.nfe.go.th/LRLS/style/icon-backend/operation/calendar-icon.png" border="0" align="absmiddle" alt="เลือกวันที่"></a> &nbsp;&nbsp;&nbsp;&nbsp; </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">สถานะ : </td>
                      <td bordercolor="#FFFFFF"><select name="book_Status" class="combo_input" id="book_Status">
                        <option value="ปกติ" selected="SELECTED">ปกติ</option>
                        <option value="ไม่ใช้งาน">ไม่ใช้งาน</option>
                        <option value="รอลงรายการ">รอลงรายการ</option>
                        <option value="ส่งซ่อม">ส่งซ่อม</option>
                        <option value="จำหน่าย">จำหน่าย</option>
                      </select>
                        &nbsp; </td>
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
              </form>
            </li>
          </ul>
        </div>
      </div>
      
    
    <br>
    <br>
  
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>
<?php
mysql_free_result($maincategory);

mysql_free_result($categorise);

mysql_free_result($Library);
?>
