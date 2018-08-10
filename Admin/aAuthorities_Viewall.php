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

$colname_Authorities = "-1";
if (isset($_GET['authorities_id'])) {
  $colname_Authorities = $_GET['authorities_id'];
}
mysql_select_db($database_condb, $condb);
$query_Authorities = sprintf("SELECT * FROM authorities WHERE authorities_id = %s", GetSQLValueString($colname_Authorities, "int"));
$Authorities = mysql_query($query_Authorities, $condb) or die(mysql_error());
$row_Authorities = mysql_fetch_assoc($Authorities);
$totalRows_Authorities = mysql_num_rows($Authorities);
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
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="addmin.php" class="active nav-link">
                <i class="fa fa-home fa-home"></i>&nbsp;หน้าหลัก</a>
            </li>
            <li class="nav-item">
              <a href="aMember.php" class="nav-link">จัดการสมาชิก</a>
            </li>
            <li class="nav-item">
              <a href="aAuthorities.php" class="nav-link">จัดการเจ้าหน้าที่</a>
            </li>
            <li class="nav-item">
              <a href="aBookNow.php" class="nav-link">จัดการรายการจอง</a>
            </li>
          </ul>
        </div>
      </div>
     
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">แก้ไขข้อมูลเจ้าหน้าที่</a>
            </li>
            <li class="nav-item">
            <form method="post" action="/Libraty_1/Admin/aUpdateAuthorities_Update.php?authorities_id=<?php echo $row_Authorities['authorities_id']; ?>" name="forminput" enctype="multipart/form-data">
<table width="98%" border="1" cellspacing="0" cellpadding="2" class="fix_text" bordercolor="#CCCCCC" align="center">
<tbody><tr bordercolor="#EBF7FC" bgcolor="#EBF7FC" class="topic_text">
<td height="25" colspan="2"></td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ห้องสมุด : </td>
  <td bordercolor="#FFFFFF"><select name="Activities_library" class="combo_input" id="Activities_library" title="<?php echo $row_Authorities['Activities_library']; ?>">
    <option value="[ ] เลือกห้องสมุด">[ ] เลือกห้องสมุด</option>
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
  </select>    &nbsp;</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสเจ้าหน้าที/บัตรประชาชน : </td>
  <td bordercolor="#FFFFFF">
    
<input name="authorities_user" type="text" class="textfield_input" id="authorities_user" value="<?php echo $row_Authorities['authorities_user']; ?>" size="15" maxlength="13" readonly>
&nbsp;(รหัสไม่เกิน 13 หลัก)
    </td>
</tr>
<tr>
  <td height="22" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสผ่าน : </td>
  <td bordercolor="#FFFFFF">
<input name="authorities_password" type="password" class="textfield_input" id="authorities_password" value="<?php echo $row_Authorities['authorities_password']; ?>" size="25" maxlength="250" readonly="readonly">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">คำนำหน้า : </td>
  <td bordercolor="#FFFFFF"> 
<input name="authorities_prefix" type="text" class="textfield_input" id="authorities_prefix" value="<?php echo $row_Authorities['authorities_prefix']; ?>" size="25" maxlength="250" readonly="readonly">
  </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ชื่อเจ้าหน้าที : </td>
  <td bordercolor="#FFFFFF">
<input name="authorities_name" type="text" class="textfield_input" id="authorities_name" value="<?php echo $row_Authorities['authorities_name']; ?>" size="100" maxlength="250" readonly="readonly">
 </td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">เพศ : </td>
  <td bordercolor="#FFFFFF">
	<select name="authorities_sex" class="combo_input" id="authorities_sex" title="<?php echo $row_Authorities['authorities_sex']; ?>"><option value="" selected="">กรุณาระบุ เพศ</option><option value="1">ชาย</option><option value="2">หญิง</option><option value="3">XXXX</option></select>  &nbsp;</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">วัน/เดือน/ปี เกิด : </td>
  <td bordercolor="#FFFFFF">
<input name="authorities_date" type="text" class="textfield_input" id="authorities_date" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2, 'Div_Age' ); " value="<?php echo $row_Authorities['authorities_date']; ?>" size="2" maxlength="2" readonly="readonly">
 /

<input name="authorities_Month" type="text" class="textfield_input" id="authorities_Month" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2 , 'Div_Age' ); " value="<?php echo $row_Authorities['authorities_Month']; ?>" size="2" maxlength="2" readonly="readonly">
 /

<input name="authorities_Year" type="text" class="textfield_input" id="authorities_Year" onkeyup=" xajax_Cal_Age( document.forminput.BB_Date.value , document.forminput.BB_Month.value , document.forminput.BB_Year.value , 'Age' , 2 , 'Div_Age' ); " value="<?php echo $row_Authorities['authorities_Year']; ?>" size="4" maxlength="4" readonly="readonly">
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
	<select name="authorities_career" class="combo_input" id="authorities_career" title="<?php echo $row_Authorities['authorities_career']; ?>">
	  <option value="กรุณาระบุ อาชีพ">กรุณาระบุ อาชีพ</option>
	  <option value="นักเรียน,นักศึกษา">นักเรียน,นักศึกษา</option>
	  <option value="ครูอาจารย์">ครูอาจารย์</option>
	  <option value="ไม่ระบุอาชีพ" selected="SELECTED">ไม่ระบุอาชีพ</option>
	</select>  
	&nbsp;</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">บ้านเลขที่ / ถนน : </td>
  <td bordercolor="#FFFFFF"> 
<input name="authorities_address" type="text" class="textfield_input" id="authorities_address" value="<?php echo $row_Authorities['authorities_address']; ?>" size="100" maxlength="250" readonly="readonly">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">ตำบล / อำเภอ / จังหวัด : </td>
  <td bordercolor="#FFFFFF"> 
<input name="authorities_province" type="text" class="textfield_input" id="authorities_province" value="<?php echo $row_Authorities['authorities_province']; ?>" size="100" maxlength="250" readonly="readonly">
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">รหัสไปรษณีย์ : </td>
  <td bordercolor="#FFFFFF"> 
<input name="authorities_zipCode" type="text" class="textfield_input" id="authorities_zipCode" value="<?php echo $row_Authorities['authorities_zipCode']; ?>" size="10" maxlength="5" readonly="readonly">
&nbsp;&nbsp;&nbsp;&nbsp;  โทรศัพท์ 1 : 
<input name="authorities_phone1" type="text" class="textfield_input" id="authorities_phone1" value="<?php echo $row_Authorities['authorities_phone1']; ?>" size="25" maxlength="50" readonly="readonly">
&nbsp;&nbsp;&nbsp;&nbsp;โทรศัพท์ 2 : 
<input name="authorities_phone2" type="text" class="textfield_input" id="authorities_phone2" value="<?php echo $row_Authorities['authorities_phone2']; ?>" size="25" maxlength="50" readonly="readonly">
  </td>
</tr>
<tr>
  <td width="15%" valign="top" nowrap="" bordercolor="#FFFFFF">สถานที่ติดต่อได้ง่าย : </td>
  <td bordercolor="#FFFFFF">
  	
<textarea name="authorities_contact" cols="100" rows="3" readonly="readonly" class="textarea_input" id="authorities_contact"><?php echo $row_Authorities['authorities_contact']; ?></textarea>
</td>
</tr>
<tr>
  <td width="15%" valign="middle" nowrap="" bordercolor="#FFFFFF">อีเมล์ : </td>
  <td bordercolor="#FFFFFF">
<input name="authorities_mail" type="text" class="textfield_input" id="authorities_mail" value="<?php echo $row_Authorities['authorities_mail']; ?>" size="65" maxlength="250" readonly="readonly">
 </td>
</tr>
<tr>
  <td valign="middle" nowrap="" bordercolor="#FFFFFF">รูปภาพ : </td>
  <td bordercolor="#FFFFFF"><input name="authorities_form" type="file" class="textfield_input" id="authorities_form" size="65">
    <img src="../img/<?php echo $row_Authorities['authorities_form']; ?>" width="100">
<input name="authorities_id" type="hidden" id="authorities_id" value="<?php echo $row_Authorities['authorities_id']; ?>"></td>
</tr>
<tr>
  <td colspan="2" valign="middle" nowrap="" bordercolor="#CCCCCC" bgcolor="#CCCCCC" height="3"></td>
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
      </div>
    </div>
  </div>
</body>

</html>
<?php
mysql_free_result($library);

mysql_free_result($Authorities);
?>
