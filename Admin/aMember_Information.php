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
              <a href="#" class="active nav-link">ข้อมูลสมาชิก</a>
            </li>
            <br>
            <form class="form-inline">
              <div class="input-group">
                <input type="email" class="form-control" placeholder="">
                <div class="btn-group">
                  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ไม่ระบุ </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">คำนำหน้า</a>
                    <a class="dropdown-item" href="#">เลขบัตรประชาชน</a>
                    <a class="dropdown-item" href="#">ชื่อ</a>
                    <a class="dropdown-item" href="#">อายุ</a>
                    <a class="dropdown-item" href="#">วันที่ออกบัตร</a>
                    <a class="dropdown-item" href="#">วันที่บัตรหมดอายุ</a>
                  </div>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">ตกลง</button>
                </div>
              </div>
            </form>
          </ul>
        </div>
      
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">แก้ไขข้อมูลสมาชิก</a>
            </li>
            <li class="nav-item">
            <form method="post" action="/Libraty_1/Admin/aUpdate_Update.php" name="forminput" enctype="multipart/form-data">
<table width="98%" border="1" cellspacing="0" cellpadding="2" class="fix_text" bordercolor="#CCCCCC" align="center">
<tbody><tr bordercolor="#EBF7FC" bgcolor="#EBF7FC" class="topic_text">
<td height="25" colspan="2">

</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ห้องสมุด : </td>
  <td bordercolor="#FFFFFF"><select name="member_Library" class="combo_input" id="member_Library" title="<?php echo $row_Member['member_Library']; ?>">
    <option value="">[ ] เลือกห้องสมุด</option>
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
    &nbsp;</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสสมาชิก/บัตรประชาชน : </td>
  <td bordercolor="#FFFFFF">
    
<input name="member_user" type="text" class="textfield_input" id="member_user" value="<?php echo $row_Member['member_user']; ?>" size="15" maxlength="13">
&nbsp;(รหัสไม่เกิน 13 หลัก)
    </td>
</tr>
<tr>
  <td height="22" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสผ่าน : </td>
  <td bordercolor="#FFFFFF">
<input name="member_Password" type="password" class="textfield_input" id="member_Password" value="<?php echo $row_Member['member_Password']; ?>" size="25" maxlength="250">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">คำนำหน้า : </td>
  <td bordercolor="#FFFFFF"> 
<input name="member_Prefix" type="text" class="textfield_input" id="member_Prefix" value="<?php echo $row_Member['member_Prefix']; ?>" size="25" maxlength="250">
  </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อสมาชิก : </td>
  <td bordercolor="#FFFFFF">
<input name="member_Name" type="text" class="textfield_input" id="member_Name" value="<?php echo $row_Member['member_Name']; ?>" size="70" maxlength="250">
 </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">เพศ : </td>
  <td bordercolor="#FFFFFF">
	<select name="member_sex" class="combo_input" id="member_sex" title="<?php echo $row_Member['member_sex']; ?>">
	  <option value="" selected="SELECTED">กรุณาระบุ เพศ</option>
	  <option value="ชาย">ชาย</option>
	  <option value="หญิง">หญิง</option>
	  <option value="อื่นๆ">อื่นๆ</option>
	</select>  &nbsp;</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">วัน/เดือน/ปี เกิด : </td>
  <td bordercolor="#FFFFFF">
<input name="member_day" type="text" class="textfield_input" id="member_day" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2, 'Div_Age' ); " value="<?php echo $row_Member['member_day']; ?>" size="2" maxlength="2">
 /

<input name="member_Month" type="text" class="textfield_input" id="member_Month" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2 , 'Div_Age' ); " value="<?php echo $row_Member['member_Month']; ?>" size="2" maxlength="2">
 /

<input name="member_year" type="text" class="textfield_input" id="member_year" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2 , 'Div_Age' ); " value="<?php echo $row_Member['member_year']; ?>" size="4" maxlength="4">
  </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">อายุ : </td>
  <td bordercolor="#FFFFFF">
	<div id="Div_Age"><input type="hidden" name="Age" value=""> ปี</div>
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ระดับการศึกษา : </td>
  <td bordercolor="#FFFFFF">
	<select name="member_Education" class="combo_input" id="member_Education" title="<?php echo $row_Member['member_Education']; ?>">
	  <option value="" selected="SELECTED">กรุณาระบุ ระดับการศึกษา</option>
	  <option value="อนุบาล">อนุบาล</option>
	  <option value="ประถมศึกษา">ประถมศึกษา</option>
	  <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
	  <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
	  <option value="อนุปริญญา">อนุปริญญา</option>
	  <option value="ปริญญาตรี">ปริญญาตรี</option>
	  <option value="ปริญญาโท">ปริญญาโท</option>
	  <option value="ปริญญาเอกหรือสูงกว่า">ปริญญาเอกหรือสูงกว่า</option>
	  <option value="ไม่ระบุระดับ กศ.">ไม่ระบุระดับ กศ.</option>
	</select>  &nbsp;</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">อาชีพ : </td>
  <td bordercolor="#FFFFFF">
	<select name="member_career" class="combo_input" id="member_career" title="<?php echo $row_Member['member_career']; ?>">
	  <option value="" selected="SELECTED">กรุณาระบุ อาชีพ</option>
	  <option value="เกษตรกรรม">เกษตรกรรม</option>
	  <option value="รับราชการ">รับราชการ</option>
	  <option value="รับจ้าง">รับจ้าง</option>
	  <option value="ค้าขาย">ค้าขาย</option>
	  <option value="นักเรียน,นักศึกษา">นักเรียน,นักศึกษา</option>
	  <option value="ครูอาจารย์">ครูอาจารย์</option>
	  <option value="ไม่ระบุอาชีพ">ไม่ระบุอาชีพ</option>
	</select>  &nbsp;</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">บ้านเลขที่ / ถนน : </td>
  <td bordercolor="#FFFFFF"> 
<input name="member_HouseNumber" type="text" class="textfield_input" id="member_HouseNumber" value="<?php echo $row_Member['member_HouseNumber']; ?>" size="100" maxlength="250">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ตำบล / อำเภอ / จังหวัด : </td>
  <td bordercolor="#FFFFFF"> 
<input name="member_province" type="text" class="textfield_input" id="member_province" value="<?php echo $row_Member['member_province']; ?>" size="100" maxlength="250">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสไปรษณีย์ : </td>
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
		<select name="member_MembershipType" class="combo_input" id="member_MembershipType" title="<?php echo $row_Member['member_MembershipType']; ?>" onchange="xajax_Hide_Expire_Date(document.forminput.Type[document.forminput.Type.selectedIndex].value);">
		  <option value="" selected="SELECTED">กรุณาระบุ ประเภทสมาชิก</option>
		  <option value="12 เดือน ">12 เดือน </option>
		  <option value="ตลอดชีพ ">ตลอดชีพ </option>
		  <option value="กิตติมศักดิ์ ">กิตติมศักดิ์ </option>
        </select>
  </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">วันที่สมัคร : </td>
  <td bordercolor="#FFFFFF">
  			<table width="100%" cellpadding="0" cellspacing="0" border="0" class="fix_text">
  			<tbody><tr><td width="100"><label for="member_Registration"></label>
  			      <input name="member_Registration" type="date" id="member_Registration" value="<?php echo $row_Member['member_Registration']; ?>">  			      
  			      &nbsp;<a name="calSdate"></a><a href="#calSdate" onclick="javascript:NewCal('Sdate','ddmmyyyy')"><img src="http://lrls.nfe.go.th/LRLS/style/icon-backend/operation/calendar-icon.png" border="0" align="absmiddle" alt="เลือกวันที่"></a>  					</td>
  					<td width="75" align="right">
  					<div id="Div_Expire_Banner">วันหมดอายุ&nbsp;:&nbsp;</div>
					</td>
					<td width="100">
					<div id="Div_Expire_Date">
					  <label for="member_ExpiredDate"></label>
					  <input name="member_ExpiredDate" type="date" id="member_ExpiredDate" value="<?php echo $row_Member['member_ExpiredDate']; ?>">
					  &nbsp;<a name="calFdate"></a><a href="#calFdate" onclick="javascript:NewCal('Fdate','ddMMyyyy')"><img src="http://lrls.nfe.go.th/LRLS/style/icon-backend/operation/calendar-icon.png" border="0" align="absmiddle" alt="เลือกวันที่"></a>					</div>
					</td><td>&nbsp;</td>
				</tr>
				</tbody></table>
  </td>
</tr>

<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">อีเมล์ : </td>
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
  <td valign="middle" nowrap="" bordercolor="#FFFFFF">หมายเลขโทรศัพท์ : </td>
  <td bordercolor="#FFFFFF">
<input name="member_Telephone" type="text" class="textfield_input" id="member_Telephone" value="<?php echo $row_Member['member_Telephone']; ?>" size="65" maxlength="250">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">สถานะ : </td>
  <td bordercolor="#FFFFFF">
  <select name="member_Status" class="combo_input" id="member_Status" title="<?php echo $row_Member['member_Status']; ?>">
    <option value="ใช้งาน">ใช้งาน</option>
    <option value="ห้ามใช้งาน">ห้ามใช้งาน</option>
    <option value="สมาชิกใหม่">สมาชิกใหม่</option>
  </select>
  <input name="member_id" type="hidden" id="member_id" value="<?php echo $row_Member['member_id']; ?>">
  </td>
</tr>
<tr>
<td bgcolor="#CCCCCC" colspan="2" height="3" bordercolor="#CCCCCC"></td>
</tr>
<tr align="right" bordercolor="#F4F4F4" bgcolor="#F4F4F4">
<td colspan="2"><input name="Back" type="reset" class="button_standard_cancle" id="Back" value="ยอนกลับ">
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
      
      <br>
      <br>
  <!--       </div>
    </div> -->
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>
<?php
mysql_free_result($library);

mysql_free_result($Member);
?>
