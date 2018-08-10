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
	$personnel_id = $_REQUEST['personnel_id'];
	$personnel_library = $_POST['personnel_library'];
	$personnel_name = $_POST['personnel_name'];
	$personnel_position = $_POST['personnel_position'];
	$personnel_telephone = $_POST['personnel_telephone'];
	$personnel_date = $_POST['personnel_date'];
	$personnel_form = (isset($_POST['personnel_form']) ? $_POST['personnel_form'] : '');
	
	$upload=$_FILES['personnel_form'];
	if($upload <> '') { 
	$path="../img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$file_name = isset($_FILES['personnel_form']["name"])?$_FILES['personnel_form']['name'] : '';
	if($file_name != '') {
	$txt_file_name = strrchr($_FILES['personnel_form']['name'],".");
	}
	else
	{
	$txt_file_name = '0';
	}
	$txt_file_delete = isset($_REQUEST['txt_file_delete'])?$_REQUEST['txt_file_delete'] : ''; 
	$txt_file_tmp = isset($_FILES['personnel_form']["tmp_name"])?$_FILES['personnel_form']["tmp_name"] : '';
	// $type = strrchr($_FILES['member_Image']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	 $newname =$numrand.$date1.$txt_file_name;
	
	}
	if($txt_file_name != '0' || $txt_file_name == '') {

			 $sql = "UPDATE personnel SET
					personnel_library='$personnel_library',
					personnel_name='$personnel_name',
					personnel_position='$personnel_position',
					personnel_telephone='$personnel_telephone',
					personnel_date='$personnel_date',
					personnel_form='$newname'
					WHERE personnel_id='$personnel_id'";

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
		$sql = "UPDATE personnel SET
					personnel_library='$personnel_library',
					personnel_name='$personnel_name',
					personnel_position='$personnel_position',
					personnel_telephone='$personnel_telephone',
					personnel_date='$personnel_date'
					WHERE personnel_id='$personnel_id'";
	}
		
		$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
		mysql_close();
		
	if($result){
   
			// echo "<script type='text/javascript'>";
			// echo  "alert('แก้ไขสำเร็จ!');";
			// echo "window.location='APersonnel.php';";
			// echo "</script>";
	  }
	  else{
		 //    echo "<script type='text/javascript'>";
			// 	echo "window.location='APersonnel.php';";
			// echo "</script>";
	  }

 ?>