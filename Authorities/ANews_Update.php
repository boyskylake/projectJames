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
	$News_id = $_REQUEST['News_id'];
	$News_library = $_REQUEST['News_library'];
	$News_subject = $_REQUEST['News_subject'];
	$News_information = $_REQUEST['News_information'];
	$News_date = $_REQUEST['News_date'];
	$News_write = $_REQUEST['News_write'];
	$News_form = (isset($_REQUEST['News_form']) ? $_REQUEST['News_form'] : '');
	
	$upload=$_FILES['News_form'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="../img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['News_form']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;

	$path_copy=$path.$newname;
	$path_link="../img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['News_form']['tmp_name'],$path_copy);  
		
	
	}

			 $sql = "UPDATE news SET
					News_library='$News_library',
					News_subject='$News_subject',
					News_information='$News_information',
					News_date='$News_date',
					News_write='$News_write',
					News_form='$newname'
					WHERE News_id='$News_id'";
		
		$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());

	mysql_close();


	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขสำเร็จ!');";
			echo "window.location='ANews.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='ANews.php';";
			echo "</script>";
	  }

 ?>