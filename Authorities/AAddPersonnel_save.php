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
	$personnel_library = $_POST['personnel_library'];
	$personnel_name = $_POST['personnel_name'];
	$personnel_position = $_POST['personnel_position'];
	$personnel_telephone = $_POST['personnel_telephone'];
	$personnel_date = $_POST['personnel_date'];
	$personnel_form = (isset($_POST['personnel_form']) ? $_POST['personnel_form'] : '');
	
	$upload=$_FILES['personnel_form'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="../img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['personnel_form']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;

	$path_copy=$path.$newname;
	$path_link="../img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['personnel_form']['tmp_name'],$path_copy); 
	
	}
	
	
			 $sql = "INSERT INTO personnel 
					(personnel_library, 
					personnel_name, 
					personnel_position,
					personnel_telephone,
					personnel_date,
					personnel_form) 
					VALUES
					('$personnel_library',
					'$personnel_name',
					'$personnel_position',
					'$personnel_telephone',
					'$personnel_date',
					'$newname')";
		
	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
	mysql_close();
	
	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มบุคลากรเรียบร้อยแล้ว');";
			echo "window.location='APersonnel.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มบุคลากรล้มเหลว !!!');";
			echo "window.location='APersonnel.php';";
			echo "</script>";
	  }

?>