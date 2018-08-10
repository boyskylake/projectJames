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

mysql_select_db($database_condb, $condb);
$query_Library = "SELECT * FROM library";
$Library = mysql_query($query_Library, $condb) or die(mysql_error());
$row_Library = mysql_fetch_assoc($Library);
$totalRows_Library = mysql_num_rows($Library);

date_default_timezone_set("Asia/Bangkok");
$date = date('Y-m-d');

?>
<!DOCTYPE html>
<html>

<head>
  <?php
    include("includes/head.inc.php");
   ?>
   <script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/fn_js.js"></script>
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
        <div class="col-md-3">
     <!--      <div class="col-md-12"> -->
            <?php
              include("includes/sidemenu.inc.php");
            ?>
        </div>

        <div class="col-md-9">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
            <a href="#" class="active nav-link">ข้อมูลสมาชิก</a></li>
            <li class="nav-item">
              <form method="post" action="/Libraty_1/RPerson_save.php" name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checkma()">
                <table width="98%" border="1" cellspacing="0" cellpadding="2" class="fix_text" bordercolor="#CCCCCC" align="center">
                  <tbody>
                    <tr bordercolor="#EBF7FC" bgcolor="#EBF7FC" class="topic_text">
                      <td height="25" colspan="2">              
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>ห้องสมุด : </td>
                      <td bordercolor="#FFFFFF"><select name="member_Library" class="combo_input" id="member_Library">
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
                      </td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>รหัสสมาชิก/บัตรประชาชน : </td>
                      <td bordercolor="#FFFFFF"><input name="member_user" type="text" class="textfield_input" id="member_user" value="" size="15" maxlength="13">
                        &nbsp;(รหัสไม่เกิน 13 หลัก)
                      </td>
                    </tr>
                    <tr>
                      <td height="22" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>รหัสผ่าน : </td>
                      <td bordercolor="#FFFFFF"><input name="member_Password" type="password" class="textfield_input" id="member_Password" value="" size="25" maxlength="250">
                      </td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>คำนำหน้า : </td>
                      <td bordercolor="#FFFFFF"><input name="member_Prefix" type="text" class="textfield_input" id="member_Prefix" value="" size="25" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>ชื่อสมาชิก : </td>
                      <td bordercolor="#FFFFFF"><input name="member_Name" type="text" class="textfield_input" id="member_Name" value="" size="65" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>เพศ : </td>
                      <td bordercolor="#FFFFFF"><select name="member_sex" class="combo_input" id="member_sex">
                        <option value="" selected>กรุณาระบุ เพศ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                      </select>
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>วัน/เดือน/ปี เกิด : </td>
                      <td bordercolor="#FFFFFF">
                      <input name="member_Birth" type="date" id="member_Birth" class="" onchange="calAge(this);">
                      </td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">อายุ : </td>
                      <td bordercolor="#FFFFFF"><div id="Div_Age">
                        <input readonly name="member_Age" id="member_Age" onchange="calAge(this);">
                        ปี</div></td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>ระดับการศึกษา : </td>
                      <td bordercolor="#FFFFFF"><select name="member_Education" class="combo_input" id="member_Education">
                        <option value="" selected>กรุณาระบุ ระดับการศึกษา</option>
                        <option value="อนุบาล">อนุบาล</option>
                        <option value="ประถมศึกษา">ประถมศึกษา</option>
                        <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                        <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
                        <option value="อนุปริญญา">อนุปริญญา</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอกหรือสูงกว่า">ปริญญาเอกหรือสูงกว่า</option>
                        <option value="ไม่ระบุระดับ กศ.">ไม่ระบุระดับ กศ.</option>
                      </select>
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>อาชีพ : </td>
                      <td bordercolor="#FFFFFF"><select name="member_career" class="combo_input" id="member_career">
                        <option value="" selected>กรุณาระบุ อาชีพ</option>
                        <option value="เกษตรกรรม">เกษตรกรรม</option>
                        <option value="รับราชการ">รับราชการ</option>
                        <option value="รับจ้าง">รับจ้าง</option>
                        <option value="ค้าขาย">ค้าขาย</option>
                        <option value="นักเรียน,นักศึกษา">นักเรียน,นักศึกษา</option>
                        <option value="ครูอาจารย์">ครูอาจารย์</option>
                        <option value="ไม่ระบุอาชีพ">ไม่ระบุอาชีพ</option>
                      </select>
                        &nbsp;</td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>บ้านเลขที่ / ถนน : </td>
                      <td bordercolor="#FFFFFF"><input name="member_HouseNumber" type="text" class="textfield_input" id="member_HouseNumber" value="" size="65" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>ตำบล / อำเภอ / จังหวัด : </td>
                      <td bordercolor="#FFFFFF"><input name="member_province" type="text" class="textfield_input" id="member_province" value="" size="65" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>รหัสไปรษณีย์ : </td>
                      <td bordercolor="#FFFFFF"><p>
                        <input name="member_Zip" type="text" class="textfield_input" id="member_Zip" value="" size="10" maxlength="5"></td>
                      </tr>
                        <tr>
                       <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>โทรศัพท์ 1 : </td>
                       <td bordercolor="#FFFFFF">
                        <input name="member_Phone1" type="text" class="textfield_input" id="member_Phone1" value="" size="25" maxlength="50">
                        <tr>
                        <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">โทรศัพท์ 2 :</td>
                        <td bordercolor="#FFFFFF">
                          <p><input name="member_Phone2" type="text" class="textfield_input" id="member_Phone2" value="" size="25" maxlength="50" >
                      </p>
                      </td></tr>
                    </tr>

                    <tr>
                      <td width="15%" valign="top" nowrap="" bordercolor="#FFFFFF">สถานที่ติดต่อได้ง่าย : </td>
                      <td bordercolor="#FFFFFF"><textarea name="member_EasyContact" cols="65" rows="3" class="textarea_input" id="member_EasyContact"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">วันที่สมัคร : </td>
                      <td bordercolor="#FFFFFF">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="fix_text">
                        <tbody>
                          <tr>
                            
                              <input readonly type="text" name="member_Registration" id="member_Registration" value="<?php echo $date; ?>">
                          </tr>
                        </tbody>
                      </table>
                    </td>
                    </tr>
                    <tr>
                      <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>อีเมล์ : </td>
                      <td bordercolor="#FFFFFF"><input name="member_Email" type="text" class="textfield_input" id="member_Email" value="" size="65" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">รูปภาพ : </td>
                      <td bordercolor="#FFFFFF"><label for="member_Image"></label>
                        <input name="member_Image" type="file" id="member_Image" size="50">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" valign="middle" nowrap="" bordercolor="#CCCCCC" bgcolor="#CCCCCC" height="3"></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ผู้ปกครอง : </td>
                      <td bordercolor="#FFFFFF"><input name="member_Parent" type="text" class="textfield_input" id="member_Parent" value="" size="65" maxlength="250">
                      </td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF">ความสัมพันธ์กับผู้สมัคร : </td>
                      <td bordercolor="#FFFFFF"><input name="member_Relationship" type="text" class="textfield_input" id="member_Relationship" value="" size="65" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td valign="top" nowrap="" bordercolor="#FFFFFF">ที่อยู่ที่ติดต่อได้ : </td>
                      <td bordercolor="#FFFFFF"><textarea name="member_Contact" cols="65" rows="3" class="textarea_input" id="member_Contact"></textarea></td>
                    </tr>
                    <tr>
                      <td valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>หมายเลขโทรศัพท์ : </td>
                      <td bordercolor="#FFFFFF"><input name="member_Telephone" type="text" class="textfield_input" id="member_Telephone" value="" size="65" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td bgcolor="#CCCCCC" colspan="2" height="3" bordercolor="#CCCCCC"></td>
                    </tr>
                    <tr align="right" bordercolor="#F4F4F4" bgcolor="#F4F4F4">
                      <td colspan="2"><input type="submit" name="Submit" value="บันทึก" class="button_standard" onclick="return  Valid_Manage_Member();">
                        <input type="reset" name="Submit" value="ยกเลิก" class="button_standard_cancle">
                        <input type="hidden" name="Page" value="">
                        <input type="hidden" name="ID_Lr_Member" value=""></td>
                    </tr>
                  </tbody>
                </table>
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

<script language="JavaScript" type="text/javascript">
  function checkma()
  {
  d=document.form1
  if(d.member_Library.value=="")
  {
  alert("กรุณาเลือก ห้องสมุด");
  d.member_Library.focus();
  return false;
  }
  else if (d.member_user.value=="") {
  alert("กรุณากรอก รหัสสมาชิก/บัตรประชาชน");
  d.member_user.focus();
  return false;
  }else if (d.member_Password.value=="") {
  alert("กรุณากรอก รหัสผ่าน");
  d.member_Password.focus();
  return false;
  }else if (d.member_Prefix.value=="") {
  alert("กรุณากรอก คำนำหน้า");
  d.member_Prefix.focus();
  return false;
  }else if (d.member_Name.value=="") {
  alert("กรุณากรอก ชื่อสมาชิก");
  d.member_Name.focus();
  return false;
  }else if (d.member_sex.value=="") {
  alert("กรุณาเลือก เพศ");
  d.member_sex.focus();
  return false;
  }else if (d.member_Birth.value=="") {
  alert("กรุณาเลือก วัน/เดือน/ปี เกิด");
  d.member_Birth.focus();
  return false;
  }else if (d.member_Education.value=="") {
  alert("กรุณาเลือก ระดับการศึกษา");
  d.member_Education.focus();
  return false;
  }else if (d.member_career.value=="") {
  alert("กรุณาเลือก อาชีพ");
  d.member_career.focus();
  return false;
  }else if (d.member_HouseNumber.value=="") {
  alert("กรุณากรอก บ้านเลขที่/ถนน");
  d.member_HouseNumber.focus();
  return false;
  }else if (d.member_province.value=="") {
  alert("กรุณากรอก ตำบล/อำเภอ/จังหวัด");
  d.member_province.focus();
  return false;
  }else if (d.member_Zip.value=="") {
  alert("กรุณากรอก รหัสไปรษณีย์");
  d.member_Zip.focus();
  return false;
  }else if (d.member_Phone1.value=="") {
  alert("กรุณากรอก โทรศัพท์");
  d.member_Phone1.focus();
  return false;
  }else if (d.member_Email.value=="") {
  alert("กรุณากรอก อีเมล์ ");
  d.member_Email.focus();
  return false;
  }else if (d.member_Telephone.value=="") {
  alert("กรุณากรอก หมายเลขโทรศัพท์");
  d.member_Telephone.focus();
  return false;
  }
  
else
  return true;
  }
</script>
<script language="javascript">
function calAge(o){
     var tmp = o.value.split("-");
     var current = new Date();
     var current_year = current.getFullYear();
     document.getElementById("member_Age").value = current_year - tmp[0];
}
</script>
  
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
