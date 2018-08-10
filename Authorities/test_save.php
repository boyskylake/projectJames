<meta charset="UTF-8" />
<?php require_once('../Connections/condb.php'); ?>
<?php 
	
	
    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
	//รับชื่อไฟล์จากฟอร์ม 
	$News_library = $_POST['News_library'];
	$News_subject = $_POST['News_subject'];
	$News_information = $_POST['News_information'];
	$News_date = $_POST['News_date'];
	$News_write = $_POST['News_write'];
	$News_form = (isset($_POST['News_form']) ? $_POST['News_form'] : '');
	
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
	
	
			 $sql = "INSERT INTO news 
					(News_library, 
					News_subject, 
					News_information,
					News_date,
					News_write,
					News_form) 
					VALUES
					('$News_library',
					'$News_subject',
					'$News_information',
					'$News_date',
					'$News_write',
					'$newname')";
		
	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
	mysql_close();
	
	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มหนังสือเรียบร้อยแล้ว');";
			echo "window.location='../test1.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มหนังสือล้มเหลว !!!');";
			echo "window.location='../test1.php';";
			echo "</script>";
	  }

?>