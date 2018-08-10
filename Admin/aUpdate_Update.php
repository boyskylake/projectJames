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
	$member_id = $_REQUEST['member_id'];
	$member_Library = $_POST['member_Library'];
	$member_user = $_POST['member_user'];
	$member_Password = $_POST['member_Password'];
	$member_Prefix = $_POST['member_Prefix'];
	$member_Name = $_POST['member_Name'];
	$member_sex = $_POST['member_sex'];
	$member_Birth = $_POST['member_Birth'];
	$member_Age = $_POST['Age'];
	$member_Education = $_POST['member_Education'];
	$member_career = $_POST['member_career'];
	$member_HouseNumber = $_POST['member_HouseNumber'];
	$member_province = $_POST['member_province'];
	$member_Zip = $_POST['member_Zip'];
	$member_Phone1 = $_POST['member_Phone1'];
	$member_Phone2 = $_POST['Telemember_Phone2'];
	$member_EasyContact = $_POST['member_EasyContact'];
	$member_MembershipType = $_POST['member_MembershipType'];
	$member_Registration = $_POST['member_Registration'];
	$member_ExpiredDate = $_POST['member_ExpiredDate'];
	$member_Email = $_POST['member_E-mail'];
	$member_Parent = $_POST['member_Parent'];
	$member_Relationship = $_POST['member_Relationship'];
	$member_Contact = $_POST['member_Contact'];
	$member_Telephone = $_POST['member_Telephone'];
	$member_Status = $_POST['member_Status'];
	// $member_Image = (isset($_POST['member_Image']) ? $_POST['member_Image'] : '');
	
	$upload=$_FILES['member_Image'];
	if($upload <> '') { 
	//โฟลเดอร์ที่เก็บไฟล์
	$path="../img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$file_name = isset($_FILES['member_Image']["name"])?$_FILES['member_Image']['name'] : '';
	if($file_name != '') {
	$txt_file_name = strrchr($_FILES['member_Image']['name'],".");
	}
	else
	{
	$txt_file_name = '0';
	}
	$txt_file_delete = isset($_REQUEST['txt_file_delete'])?$_REQUEST['txt_file_delete'] : ''; 
	$txt_file_tmp = isset($_FILES['member_Image']["tmp_name"])?$_FILES['member_Image']["tmp_name"] : '';
	// $type = strrchr($_FILES['member_Image']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	 $newname =$numrand.$date1.$txt_file_name;


	// $path_copy=$path.$txt_file_name;
	// // $path_link="../img/".$txt_file_name;
	// //คัดลอกไฟล์ไปยังโฟลเดอร์
	// move_uploaded_file($_FILES['member_Image']['tmp_name'],$path_copy);  
		
	
	}
	if($txt_file_name != '0' || $txt_file_name == '') {

			 $sql = "UPDATE member SET
					member_Library='$member_Library',
					member_user='$member_user',
					member_Password='$member_Password',
					member_Prefix='$member_Prefix',
					member_Name='$member_Name',
					member_sex='$member_sex',
					member_Birth='$member_Birth',
					member_Age='$member_Age',
					member_Education='$member_Education',
					member_career='$member_career',
					member_HouseNumber='$member_HouseNumber',
					member_province='$member_province',
					member_Zip='$member_Zip',
					member_Phone1='$member_Phone1',
					member_Phone2='$member_Phone2',
					member_EasyContact='$member_EasyContact',
					member_MembershipType='$member_MembershipType',
					member_Registration='$member_Registration',
					member_ExpiredDate='$member_ExpiredDate',
					member_Email='$member_Email',
					member_Parent='$member_Parent',
					member_Relationship='$member_Relationship',
					member_Contact='$member_Contact',
					member_Telephone='$member_Telephone',
					member_Status='$member_Status',
					member_Image='$newname'
					WHERE member_id='$member_id'";

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
					$sql = "UPDATE member SET
					member_Library='$member_Library',
					member_user='$member_user',
					member_Password='$member_Password',
					member_Prefix='$member_Prefix',
					member_Name='$member_Name',
					member_sex='$member_sex',
					member_Birth='$member_Birth',
					member_Age='$member_Age',
					member_Education='$member_Education',
					member_career='$member_career',
					member_HouseNumber='$member_HouseNumber',
					member_province='$member_province',
					member_Zip='$member_Zip',
					member_Phone1='$member_Phone1',
					member_Phone2='$member_Phone2',
					member_EasyContact='$member_EasyContact',
					member_MembershipType='$member_MembershipType',
					member_Registration='$member_Registration',
					member_ExpiredDate='$member_ExpiredDate',
					member_Email='$member_Email',
					member_Parent='$member_Parent',
					member_Relationship='$member_Relationship',
					member_Contact='$member_Contact',
					member_Telephone='$member_Telephone',
					member_Status='$member_Status'
					WHERE member_id='$member_id'";

	}
		
		$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());

	mysql_close();


	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขสำเร็จ!');";
			echo "window.location='aMember.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
			echo "window.location='aMember.php';";
			echo "</script>";
	  }

 ?>