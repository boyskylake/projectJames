<meta charset="UTF-8" />
<?php require_once('Connections/condb.php'); ?>
<?php 
	
	
    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
	//รับชื่อไฟล์จากฟอร์ม 
	$member_user = $_POST['member_user'];
	$member_Library = $_POST['member_Library'];
	$member_Password = $_POST['member_Password'];
	$member_Prefix = $_POST['member_Prefix'];
	$member_Name = $_POST['member_Name'];
	$member_sex = $_POST['member_sex'];
	$member_Birth = $_POST['member_Birth'];
	$member_Age = $_POST['member_Age'];
	$member_Education = $_POST['member_Education'];
	$member_career = $_POST['member_career'];
	$member_HouseNumber = $_POST['member_HouseNumber'];
	$member_province = $_POST['member_province'];
	$member_Zip = $_POST['member_Zip'];
	$member_Phone1 = $_POST['member_Phone1'];
	$member_Phone2 = $_POST['member_Phone2'];
	$member_EasyContact = $_POST['member_EasyContact'];
	$member_Registration = $_POST['member_Registration'];
	$member_Email = $_POST['member_Email'];
	$member_Parent = $_POST['member_Parent'];
	$member_Relationship = $_POST['member_Relationship'];
	$member_Contact = $_POST['member_Contact'];
	$member_Telephone = $_POST['member_Telephone'];
	$member_Image = (isset($_POST['member_Image']) ? $_POST['member_Image'] : '');
	
	$upload=$_FILES['member_Image'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['member_Image']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;

	$path_copy=$path.$newname;
	$path_link="img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['member_Image']['tmp_name'],$path_copy); 
	
	}
	
	
			 $sql = "INSERT INTO member 
					(member_user, 
					member_Library, 
					member_Password,
					member_Prefix,
					member_Name,
					member_sex,
					member_Birth,
					member_Age,
					member_Education,
					member_career,
					member_HouseNumber,
					member_province,
					member_Zip,
					member_Phone1,
					member_Phone2,
					member_EasyContact,
					member_Registration,
					member_Email,
					member_Parent,
					member_Relationship,
					member_Contact,
					member_Telephone,
					member_Image) 
					VALUES
					('$member_user',
					'$member_Library',
					'$member_Password',
					'$member_Prefix',
					'$member_Name',
					'$member_sex',
					'$member_Birth',
					'$member_Age',
					'$member_Education',
					'$member_career',
					'$member_HouseNumber',
					'$member_province',
					'$member_Zip',
					'$member_Phone1',
					'$member_Phone2',
					'$member_EasyContact',
					'$member_Registration',
					'$member_Email',
					'$member_Parent',
					'$member_Relationship',
					'$member_Contact',
					'$member_Telephone',
					'$newname')";
		
	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
	mysql_close();
	
	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('สมัครสมาชิกเรียบร้อยแล้ว');";
			echo "window.location='RPerson.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
			echo  "alert('สมัครสมาชิกล้มเหลว !!!');";
			echo "window.location='RPerson.php';";
			echo "</script>";
	  }

?>