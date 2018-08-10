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
              <a href="#" class="active nav-link">เพิ่มข้อมูลเจ้าหน้าที่</a>
            </li>
            <li class="nav-item">
            <form method="post" action="/Libraty_1/Admin/aAddAuthorities_save.php" name="forminput" enctype="multipart/form-data">
      <table width="98%" border="1" cellspacing="0" cellpadding="2" class="fix_text" bordercolor="#CCCCCC" align="center">
      <tbody><tr bordercolor="#EBF7FC" bgcolor="#EBF7FC" class="topic_text">
      <td height="25" colspan="2"></td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ห้องสมุด : </td>
        <td bordercolor="#FFFFFF"><select name="Activities_library" class="combo_input" id="Activities_library">
          <option value="">[ ] เลือกห้องสมุด</option>
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
        </select>
          &nbsp;</td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสเจ้าหน้าที/บัตรประชาชน : </td>
        <td bordercolor="#FFFFFF">
          
      <input name="authorities_user" type="text" class="textfield_input" id="authorities_user" value="" size="15" maxlength="13">
      &nbsp;(รหัสไม่เกิน 13 หลัก)
          </td>
      </tr>
      <tr>
        <td height="22" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสผ่าน : </td>
        <td bordercolor="#FFFFFF"><input name="authorities_password" type="text" class="textfield_input" id="authorities_password" value="" size="25">
        </td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">คำนำหน้า : </td>
        <td bordercolor="#FFFFFF"> 
      <input name="authorities_prefix" type="text" class="textfield_input" id="authorities_prefix" value="" size="25" maxlength="250">
        </td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อเจ้าหน้าที : </td>
        <td bordercolor="#FFFFFF">
      <input name="authorities_name" type="text" class="textfield_input" id="authorities_name" value="" size="100" maxlength="250">
       </td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">เพศ : </td>
        <td bordercolor="#FFFFFF">
      	<select name="authorities_sex" class="combo_input" id="authorities_sex">
      	  <option value="" selected="SELECTED">กรุณาระบุ เพศ</option>
      	  <option value="ชาย">ชาย</option>
      	  <option value="หญิง">หญิง</option>
      	  <option value="อื่นๆ">อื่นๆ</option>
          </select>  &nbsp;</td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">วัน/เดือน/ปี เกิด : </td>
        <td bordercolor="#FFFFFF">
      <input name="authorities_date" type="text" class="textfield_input" id="authorities_date" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2, 'Div_Age' ); " value="" size="2" maxlength="2">
       /

      <input name="authorities_Month" type="text" class="textfield_input" id="authorities_Month" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2 , 'Div_Age' ); " value="" size="2" maxlength="2">
       /

      <input name="authorities_Year" type="text" class="textfield_input" id="authorities_Year" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2 , 'Div_Age' ); " value="25" size="4" maxlength="4">
        </td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">อายุ : </td>
        <td bordercolor="#FFFFFF">
      	<div id="Div_Age"><input type="hidden" name="Age" value=""> ปี</div>
      </td>
      </tr>

      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">อาชีพ : </td>
        <td bordercolor="#FFFFFF">
      	<select name="authorities_career" class="combo_input" id="authorities_career">
      	  <option value="กรุณาระบุ อาชีพ">กรุณาระบุ อาชีพ</option>
      	  <option value="1">นักเรียน,นักศึกษา</option>
      	  <option value="2">ครูอาจารย์</option>
      	</select>  
      	&nbsp;</td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">บ้านเลขที่ / ถนน : </td>
        <td bordercolor="#FFFFFF"> 
      <input name="authorities_address" type="text" class="textfield_input" id="authorities_address" value="" size="100" maxlength="250">
      </td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ตำบล / อำเภอ / จังหวัด : </td>
        <td bordercolor="#FFFFFF"> 
      <input name="authorities_province" type="text" class="textfield_input" id="authorities_province" value="" size="100" maxlength="250">
      </td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสไปรษณีย์ : </td>
        <td bordercolor="#FFFFFF"> 
      <input name="authorities_zipCode" type="text" class="textfield_input" id="authorities_zipCode" value="" size="10" maxlength="5">
      &nbsp;&nbsp;&nbsp;&nbsp;  โทรศัพท์ 1 : 
      <input name="authorities_phone1" type="text" class="textfield_input" id="authorities_phone1" value="" size="25" maxlength="50">
      &nbsp;&nbsp;&nbsp;&nbsp;โทรศัพท์ 2 : 
      <input name="authorities_phone2" type="text" class="textfield_input" id="authorities_phone2" value="" size="25" maxlength="50">
        </td>
      </tr>
      <tr>
        <td width="15%" valign="top" nowrap="" bordercolor="#FFFFFF">สถานที่ติดต่อได้ง่าย : </td>
        <td bordercolor="#FFFFFF">
        	
      <textarea name="authorities_contact" cols="100" rows="3" class="textarea_input" id="authorities_contact"></textarea>
      </td>
      </tr>
      <tr>
        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">อีเมล์ : </td>
        <td bordercolor="#FFFFFF">
      <input name="authorities_mail" type="text" class="textfield_input" id="authorities_mail" value="" size="65" maxlength="250">
       </td>
      </tr>
      <tr>
        <td valign="middle" nowrap="" bordercolor="#FFFFFF">รูปภาพ : </td>
        <td bordercolor="#FFFFFF"><label for="authorities_form"></label>
          <input type="file" name="authorities_form" id="authorities_form"></td>
      </tr>
      <tr>
        <td colspan="2" valign="middle" nowrap="" bordercolor="#CCCCCC" bgcolor="#CCCCCC" height="3"></td>
        </tr>
      <tr>
        <td bgcolor="#CCCCCC" colspan="2" height="3" bordercolor="#CCCCCC"></td>
      </tr>
      <tr align="right" bordercolor="#F4F4F4" bgcolor="#F4F4F4">
      <td colspan="2">
      <input type="submit" name="Submit" value="บันทึก" class="button_standard" onclick="return  Valid_Manage_Member();">
      <input type="reset" name="Submit" value="ยกเลิก" class="button_standard_cancle">
      <input type="hidden" name="Page" value="">
      <input type="hidden" name="ID_Lr_Member" value="">
      </td>
      </tr>
      </tbody></table>

      </form>

            </li>
            <div class="row">
              <div class="col-md-12"></div>
            </div>
            <div class="col-md" align="right"></div>
          </ul>
        </div>
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
mysql_free_result($Library);
?>
