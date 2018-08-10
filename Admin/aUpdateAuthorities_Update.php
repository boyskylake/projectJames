<meta charset="UTF-8" />
<?php 
require_once('../Connections/condb.php');

    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_his");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
	//รับชื่อไฟล์จากฟอร์ม 
	$authorities_id = $_REQUEST['authorities_id'];
	$Activities_library = $_POST['Activities_library'];
	$authorities_user = $_POST['authorities_user'];
	$authorities_password = $_POST['authorities_password'];
	$authorities_prefix = $_POST['authorities_prefix'];
	$authorities_name = $_POST['authorities_name'];
	$authorities_sex = $_POST['authorities_sex'];
	$authorities_date = $_POST['authorities_date'];
	$authorities_Month = $_POST['authorities_Month'];
	$authorities_Year = $_POST['authorities_Year'];
	$authorities_age = $_POST['authorities_age'];
	$authorities_career = $_POST['authorities_career'];
	$authorities_address = $_POST['authorities_address'];
	$authorities_province = $_POST['authorities_province'];
	$authorities_zipCode = $_POST['authorities_zipCode'];
	$authorities_phone1 = $_POST['authorities_phone1'];
	$authorities_phone2 = $_POST['authorities_phone2'];
	$authorities_contact = $_POST['authorities_contact'];
	$authorities_mail = $_POST['authorities_mail'];
	$txt_file_delete = (isset($_POST['authorities_form']) ? $_POST['authorities_form'] : '');
	
	$upload=$_FILES['authorities_form'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="../img/";
	$file_name = isset($_FILES['authorities_form']["name"])?$_FILES['authorities_form']['name'] : '';
	if($file_name != '') {
	$txt_file_name = strrchr($_FILES['authorities_form']['name'],".");
	}
	else
	{
	$txt_file_name = '0';
	} 
	$txt_file_tmp = isset($_FILES['authorities_form']["tmp_name"])?$_FILES['authorities_form']["tmp_name"] : '';
	$newname =$numrand.$date1.$txt_file_name;	
	
	}
	if($txt_file_name != '0' || $txt_file_name == '') {
			 $sql = "UPDATE authorities SET
					Activities_library='$Activities_library',
					authorities_user='$authorities_user',
					authorities_password='$authorities_password',
					authorities_prefix='$authorities_prefix',
					authorities_name='$authorities_name',
					authorities_sex='$authorities_sex',
					authorities_date='$authorities_date',
					authorities_Month='$authorities_Month',
					authorities_Year='$authorities_Year',
					authorities_age='$authorities_age',
					authorities_career='$authorities_career',
					authorities_address='$authorities_address',
					authorities_province='$authorities_province',
					authorities_zipCode='$authorities_zipCode',
					authorities_phone1='$authorities_phone1',
					authorities_phone2='$authorities_phone2',
					authorities_contact='$authorities_contact',
					authorities_mail='$authorities_mail',
					authorities_form='$newname'
					WHERE authorities_id='$authorities_id'";

			if($newname != '') 
			{
				copy($txt_file_tmp, $path.$newname);
				if($txt_file_delete != '') {
					unlink($path.$txt_file_delete);
				}
			
			}
		
	}
	else
	{
				$sql = "UPDATE authorities SET
					Activities_library='$Activities_library',
					authorities_user='$authorities_user',
					authorities_password='$authorities_password',
					authorities_prefix='$authorities_prefix',
					authorities_name='$authorities_name',
					authorities_sex='$authorities_sex',
					authorities_date='$authorities_date',
					authorities_Month='$authorities_Month',
					authorities_Year='$authorities_Year',
					authorities_age='$authorities_age',
					authorities_career='$authorities_career',
					authorities_address='$authorities_address',
					authorities_province='$authorities_province',
					authorities_zipCode='$authorities_zipCode',
					authorities_phone1='$authorities_phone1',
					authorities_phone2='$authorities_phone2',
					authorities_contact='$authorities_contact',
					authorities_mail='$authorities_mail'
					WHERE authorities_id='$authorities_id'";
	}
		
		$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());

	mysql_close();


	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขสำเร็จ!');";
			echo "window.location='aAuthorities.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='aAuthorities.php';";
			echo "</script>";
	  }

 ?>