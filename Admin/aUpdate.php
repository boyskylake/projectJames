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

$colname_Member = "-1";
if (isset($_GET['member_id'])) {
  $colname_Member = $_GET['member_id'];
}
mysql_select_db($database_condb, $condb);
$query_Member = sprintf("SELECT * FROM member WHERE member_id = %s", GetSQLValueString($colname_Member, "int"));
$Member = mysql_query($query_Member, $condb) or die(mysql_error());
$row_Member = mysql_fetch_assoc($Member);
$totalRows_Member = mysql_num_rows($Member);
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
              <p class="active nav-link">ข้อมูลสมาชิก</p>
            </li>

<form method="post" action="/Libraty_1/Admin/aUpdate_Update.php" name="forminput" enctype="multipart/form-data">
<table width="98%" border="1" cellspacing="0" cellpadding="2" class="fix_text" bordercolor="#CCCCCC" align="center">
<tbody><tr bordercolor="#EBF7FC" bgcolor="#EBF7FC" class="topic_text">
<td height="25" colspan="2">

</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ห้องสมุด : </td>
  <td bordercolor="#FFFFFF"><select name="member_Library" class="combo_input" id="member_Library">
    <option value="<?php echo $row_Member['member_Library']; ?>"><?php echo $row_Member['member_Library']; ?></option>
    <?php
do {  
?>
    <option value="<?php echo $row_library['Library_Library']?>"><?php echo $row_library['Library_Library']?></option>
    <?php
} while ($row_library = mysql_fetch_assoc($library));
  $rows = mysql_num_rows($library);
  if($rows > 0) {
      mysql_data_seek($library, 0);
	  $row_library = mysql_fetch_assoc($library);
  }
?>
  </select>
   </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>รหัสสมาชิก/บัตรประชาชน : </td>
  <td bordercolor="#FFFFFF">
<input name="member_user" type="text" class="textfield_input" id="member_user" value="<?php echo $row_Member['member_user']; ?>" size="15" maxlength="13">
&nbsp;(รหัสไม่เกิน 13 หลัก)
    </td>
</tr>
<tr>
  <td height="22" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>รหัสผ่าน : </td>
  <td bordercolor="#FFFFFF">
<input name="member_Password" type="password" class="textfield_input" id="member_Password" value="<?php echo $row_Member['member_Password']; ?>" size="25" maxlength="250">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>คำนำหน้า : </td>
  <td bordercolor="#FFFFFF"> 
<input name="member_Prefix" type="text" class="textfield_input" id="member_Prefix" value="<?php echo $row_Member['member_Prefix']; ?>" size="25" maxlength="250">
  </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>ชื่อสมาชิก : </td>
  <td bordercolor="#FFFFFF">
<input name="member_Name" type="text" class="textfield_input" id="member_Name" value="<?php echo $row_Member['member_Name']; ?>" size="70" maxlength="250">
 </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>เพศ : </td>
  <td bordercolor="#FFFFFF">
	<select name="member_sex" class="combo_input" id="member_sex">
    <?php if (isset($row_Member['member_sex'])) { ?>
	  <option value="" <?php if($row_Member["member_sex"] == '') {echo "selected";}?>>กรุณาระบุ เพศ</option>
	  <option value="ชาย" <?php if($row_Member["member_sex"] == 'ชาย') {echo "selected";}?>>ชาย</option>
	  <option value="หญิง" <?php if($row_Member["member_sex"] == 'หญิง') {echo "selected";}?>>หญิง</option>
	  <option value="อื่นๆ" <?php if($row_Member["member_sex"] == 'อื่นๆ') {echo "selected";}?>>อื่นๆ</option>
  <?php }else{ ?>
      <option value="" selected="SELECTED">กรุณาระบุ เพศ</option>
  <?php } ?>
	</select>
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>วัน/เดือน/ปี เกิด : </td>
  <td bordercolor="#FFFFFF">
<input name="member_Birth" type="date" id="member_Birth" value="<?php echo $row_Member['member_Birth']; ?>">&nbsp;<a name="calFdate"></a><a href="#calBdate" onclick="javascript:NewCal('Bdate','ddmmyyyy')"></a>
  </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>อายุ : </td>
  <td bordercolor="#FFFFFF">
	<div id="Div_Age"><input type="hidden" name="Age" value=""> ปี</div>
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>ระดับการศึกษา : </td>
  <td bordercolor="#FFFFFF">
	<select name="member_Education" class="combo_input" id="member_Education">
    <?php if (isset($row_Member['member_Education'])) {
    ?>
    <option value=""<?php if($row_Member["member_Education"] == '') {echo "selected";}?>>กรุณาระบุ ระดับการศึกษา</option>
	   <option value="อนุบาล" <?php if($row_Member["member_Education"] == 'อนุบาล') {echo "selected";}?>>อนุบาล</option>
    <option value="ประถมศึกษา" <?php if($row_Member["member_Education"] == 'ประถมศึกษา') {echo "selected";}?>>ประถมศึกษา</option>
    <option value="มัธยมศึกษาตอนต้น" <?php if($row_Member["member_Education"] == 'มัธยมศึกษาตอนต้น') {echo "selected";}?>>มัธยมศึกษาตอนต้น</option>
    <option value="มัธยมศึกษาตอนปลาย" <?php if($row_Member["member_Education"] == 'มัธยมศึกษาตอนปลาย') {echo "selected";}?>>มัธยมศึกษาตอนปลาย</option>
    <option value="อนุปริญญา" <?php if($row_Member["member_Education"] == 'อนุปริญญา') {echo "selected";}?>>อนุปริญญา</option>
    <option value="ปริญญาตรี" <?php if($row_Member["member_Education"] == 'ปริญญาตรี') {echo "selected";}?>>ปริญญาตรี</option>
    <option value="ปริญญาโท" <?php if($row_Member["member_Education"] == 'ปริญญาโท') {echo "selected";}?>>ปริญญาโท</option>
    <option value="ปริญญาเอกหรือสูงกว่า" <?php if($row_Member["member_Education"] == 'ปริญญาเอกหรือสูงกว่า') {echo "selected";}?>>ปริญญาเอกหรือสูงกว่า</option>
    <option value="ไม่ระบุระดับ กศ." <?php if($row_Member["member_Education"] == 'ไม่ระบุระดับ กศ.') {echo "selected";}?>>ไม่ระบุระดับ กศ.</option>
	 
    <?php }else{ ?>
   <option value="" selected>กรุณาระบุ ระดับการศึกษา</option>
    <?php } ?>
	</select>
  </td>
  </tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>อาชีพ : </td>
  <td bordercolor="#FFFFFF">
	<select name="member_career" class="combo_input" id="member_career">
    <?php if (isset($row_Member['member_Education'])) { ?>
	  <option value="" <?php if($row_Member["member_career"] == '') {echo "selected";}?>>กรุณาระบุ อาชีพ</option>
	  <option value="เกษตรกรรม" <?php if($row_Member["member_career"] == 'เกษตรกรรม') {echo "selected";}?>>เกษตรกรรม</option>
	  <option value="รับราชการ" <?php if($row_Member["member_career"] == 'รับราชการ') {echo "selected";}?>>รับราชการ</option>
	  <option value="รับจ้าง" <?php if($row_Member["member_career"] == 'รับจ้าง') {echo "selected";}?>>รับจ้าง</option>
	  <option value="ค้าขาย" <?php if($row_Member["member_career"] == 'ค้าขาย') {echo "selected";}?>>ค้าขาย</option>
	  <option value="นักเรียน,นักศึกษา" <?php if($row_Member["member_career"] == 'นักเรียน,นักศึกษา') {echo "selected";}?>>นักเรียน,นักศึกษา</option>
	  <option value="ครูอาจารย์" <?php if($row_Member["member_career"] == 'ครูอาจารย์') {echo "selected";}?>>ครูอาจารย์</option>
	  <option value="ไม่ระบุอาชีพ" <?php if($row_Member["member_career"] == 'ไม่ระบุอาชีพ') {echo "selected";}?>>ไม่ระบุอาชีพ</option>
    <?php }else{ ?>
        <option value="" selected="SELECTED">กรุณาระบุ อาชีพ</option>
      <?php } ?>
	</select>
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>บ้านเลขที่ / ถนน : </td>
  <td bordercolor="#FFFFFF"> 
<input name="member_HouseNumber" type="text" class="textfield_input" id="member_HouseNumber" value="<?php echo $row_Member['member_HouseNumber']; ?>" size="100" maxlength="250">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>ตำบล / อำเภอ / จังหวัด : </td>
  <td bordercolor="#FFFFFF"> 
<input name="member_province" type="text" class="textfield_input" id="member_province" value="<?php echo $row_Member['member_province']; ?>" size="100" maxlength="250">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>รหัสไปรษณีย์ : </td>
  <td bordercolor="#FFFFFF"> 
    <p>
  <input name="member_Zip" type="text" class="textfield_input" id="member_Zip" value="<?php echo $row_Member['member_Zip']; ?>" size="10" maxlength="5">
  &nbsp;&nbsp;&nbsp;&nbsp;โทรศัพท์ 1 :
  <input name="member_Phone1" type="text" class="textfield_input" id="member_Phone1" value="<?php echo $row_Member['member_Phone1']; ?>" size="25" maxlength="50">
      &nbsp;&nbsp;&nbsp;&nbsp;โทรศัพท์ 2 : 
      <input name="Telemember_Phone2" type="text" class="textfield_input" id="Telemember_Phone2" value="<?php echo $row_Member['member_Phone2']; ?>" size="25" maxlength="50">
    </p>
  </td>
</tr>
<tr>
  <td width="15%" valign="top" nowrap="" bordercolor="#FFFFFF">สถานที่ติดต่อได้ง่าย : </td>
  <td bordercolor="#FFFFFF">
  	
<textarea name="member_EasyContact" cols="70" rows="3" class="textarea_input" id="member_EasyContact"><?php echo $row_Member['member_EasyContact']; ?></textarea>
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ประเภทสมาชิก : </td>
  <td bordercolor="#FFFFFF">
		<select name="member_MembershipType" class="combo_input" id="member_MembershipType" onchange="xajax_Hide_Expire_Date(document.forminput.Type[document.forminput.Type.selectedIndex].value);">
      <?php if (isset($row_Member['member_MembershipType'])) {
     ?>
		  <option value="" <?php if($row_Member["member_MembershipType"] == '') {echo "selected";}?>>กรุณาระบุ ประเภทสมาชิก</option>
		  <option value="12 เดือน" <?php if($row_Member["member_MembershipType"] == '12 เดือน') {echo "selected";}?>>12 เดือน </option>
		  <option value="ตลอดชีพ" <?php if($row_Member["member_MembershipType"] == 'ตลอดชีพ') {echo "selected";}?>>ตลอดชีพ </option>
		  <option value="กิตติมศักดิ์" <?php if($row_Member["member_MembershipType"] == 'กิตติมศักดิ์') {echo "selected";}?>>กิตติมศักดิ์ </option>

    <?php }else{ ?>
            <option value="" selected="SELECTED">กรุณาระบุ ประเภทสมาชิก</option>
      <?php } ?>
        </select>
  </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>วันที่สมัคร : </td>
  <td bordercolor="#FFFFFF">
  			<table width="100%" cellpadding="0" cellspacing="0" border="0" class="fix_text">
  			<tbody><tr><td width="100"><label for="member_Registration"></label>
  			      <input name="member_Registration" type="date" id="member_Registration" value="<?php echo $row_Member['member_Registration']; ?>">  			      
  			      &nbsp;<a name="calSdate"></a><a href="#calSdate" onclick="javascript:NewCal('Sdate','YYYY-MM-DD')"></a>  					</td>
  					<td width="75" align="right">
  					<div id="Div_Expire_Banner">วันหมดอายุ&nbsp;:&nbsp;</div>
					</td>
					<td width="100">
					<div id="Div_Expire_Date">
					  <label for="member_ExpiredDate"></label>
					  <input name="member_ExpiredDate" type="date" id="member_ExpiredDate" value="<?php echo $row_Member['member_ExpiredDate']; ?>">
					  &nbsp;<a name="calFdate"></a><a href="#calFdate" onclick="javascript:NewCal('Fdate','ddmmyyyy')"></a>
          </div>
					</td><td>&nbsp;</td>
				</tr>
				</tbody></table>
  </td>
</tr>

        <tr>
          <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>อีเมล์ : </td>
          <td bordercolor="#FFFFFF">
        <input name="member_E-mail" type="text" class="textfield_input" id="member_E-mail" value="<?php echo $row_Member['member_Email']; ?>" size="65" maxlength="250">
         </td>
        </tr>
        <tr>
          <td valign="middle" nowrap="" bordercolor="#FFFFFF">รูปภาพ : </td>
          <td bordercolor="#FFFFFF"><label for="member_Image"></label>
            <input name="member_Image" type="file" id="member_Image" size="50">
            <img src="../img/<?php echo $row_Member['member_Image']; ?>" width="100"></td>
        </tr>
        <tr>
          <td colspan="2" valign="middle" nowrap="" bordercolor="#CCCCCC" bgcolor="#CCCCCC" height="3"></td>
          </tr>
        <tr>
          <td valign="middle" nowrap="" bordercolor="#FFFFFF">ผู้ปกครอง : </td>
          <td bordercolor="#FFFFFF">
        <input name="member_Parent" type="text" class="textfield_input" id="member_Parent" value="<?php echo $row_Member['member_Parent']; ?>" size="65" maxlength="250">
        </td>
        </tr>
        <tr>
          <td valign="middle" nowrap="" bordercolor="#FFFFFF">ความสัมพันธ์กับผู้สมัคร : </td>
          <td bordercolor="#FFFFFF">
        <input name="member_Relationship" type="text" class="textfield_input" id="member_Relationship" value="<?php echo $row_Member['member_Relationship']; ?>" size="65" maxlength="250">
        </td>
        </tr>
        <tr>
          <td valign="top" nowrap="" bordercolor="#FFFFFF">ที่อยู่ที่ติดต่อได้ : </td>
          <td bordercolor="#FFFFFF">
        <textarea name="member_Contact" cols="100" rows="3" class="textarea_input" id="member_Contact"><?php echo $row_Member['member_Contact']; ?></textarea>
        </td>
        </tr>
        <tr>
          <td valign="middle" nowrap="" bordercolor="#FFFFFF"><span style="color: #FF0000FF">*</span>หมายเลขโทรศัพท์ : </td>
          <td bordercolor="#FFFFFF">
        <input name="member_Telephone" type="text" class="textfield_input" id="member_Telephone" value="<?php echo $row_Member['member_Telephone']; ?>" size="65" maxlength="250">
        </td>
        </tr>
        <tr>
          <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">สถานะ : </td>
          <td bordercolor="#FFFFFF">
          <select name="member_Status" class="combo_input" id="member_Status">
            <?php if (isset($row_Member['member_Status'])) {
          ?>
            <option value="ใช้งาน" <?php if($row_Member["member_Status"] == 'ใช้งาน') {echo "selected";}?>>ใช้งาน</option>
            <option value="ไม่ใช้งาน" <?php if($row_Member["member_Status"] == 'ไม่ใช้งาน') {echo "selected";}?>>ไม่ใช้งาน</option>
            <option value="สมาชิกใหม่" <?php if($row_Member["member_Status"] == 'สมาชิกใหม่') {echo "selected";}?>>สมาชิกใหม่</option>
           <?php }else{ ?>
            <option value="" selected>ระบุ</option>
          <?php } ?>
          </select>
          <input name="member_id" type="hidden" id="member_id" value="<?php echo $row_Member['member_id']; ?>">
          </td>
        </tr>
        <tr>
        <td bgcolor="#CCCCCC" colspan="2" height="3" bordercolor="#CCCCCC"></td>
        </tr>
        <tr align="right" bordercolor="#F4F4F4" bgcolor="#F4F4F4">
        <td colspan="2">
        <input type="submit" name="Submit" value="บันทึก" class="button_standard" onclick="return  Valid_Manage_Member();">
        <input type="reset" name="Submit" value="ยกเลิก" class="button_standard_cancle">
        <input type="hidden" name="txt_file_delete" value="<?php echo $row_Member["member_Image"];?>">
        </td>
        </tr>
        </tbody>
        </table>

        </form>

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
mysql_free_result($library);

mysql_free_result($Member);
?>
