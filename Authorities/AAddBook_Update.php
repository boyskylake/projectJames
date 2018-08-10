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
	$book_id = $_REQUEST['book_id'];
	$book_BooksCode = $_POST['book_BooksCode'];
	$book_Library = $_POST['book_Library'];
	$book_ReceivedDate = $_POST['book_ReceivedDate'];
	$book_NounPrefix = $_POST['book_NounPrefix'];
	$book_Author = $_POST['book_Author'];
	$book_Alias = $_POST['book_Alias'];
	$book_Translator = $_POST['book_Translator'];
	$book_Penname = $_POST['book_Penname'];
	$book_BookName = $_POST['book_BookName'];
	$book_Bookname1 = $_POST['book_Bookname1'];
	$book_BookNumber = $_POST['book_BookNumber'];
	$book_MainCategory = $_POST['book_MainCategory'];
	$book_Subjects = $_POST['book_Subjects'];
	$book_Initials = $_POST['book_Initials'];
	$book_BookSet = $_POST['book_BookSet'];
	$book_Publisher = $_POST['book_Publisher'];
	$book_Print = $_POST['book_Print'];
	$book_Price = $_POST['book_Price'];
	$book_NumberOfPages = $_POST['book_NumberOfPages'];
	$book_PublishedYear = $_POST['book_PublishedYear'];
	$book_BookNumber1 = $_POST['book_BookNumber1'];
	$book_Heading1 = $_POST['book_Heading1'];
	$book_Heading2 = $_POST['book_Heading2'];
	$book_Heading3 = $_POST['book_Heading3'];
	$book_ISBN = $_POST['book_ISBN'];
	$book_BookSize = $_POST['book_BookSize'];
	$book_No = $_POST['book_No'];
	$book_Source = $_POST['book_Source'];
	$book_StorageLocation = $_POST['book_StorageLocation'];
	$book_DateOfIssue = $_POST['book_DateOfIssue'];
	$book_Status = $_POST['book_Status'];
	$book_Picture = (isset($_POST['book_Picture']) ? $_POST['book_Picture'] : '');
	
	$upload=$_FILES['book_Picture'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="../img/";
	$file_name = isset($_FILES['book_Picture']["name"])?$_FILES['book_Picture']['name'] : '';
	if($file_name != '') {
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$txt_file_name = strrchr($_FILES['book_Picture']['name'],".");
	}
	else
	{
	$txt_file_name = '0';
	}
	$txt_file_delete = isset($_REQUEST['txt_file_delete'])?$_REQUEST['txt_file_delete'] : ''; 
	$txt_file_tmp = isset($_FILES['book_Picture']["tmp_name"])?$_FILES['book_Picture']["tmp_name"] : '';
	// $type = strrchr($_FILES['member_Image']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	 $newname =$numrand.$date1.$txt_file_name;

	}
	if ($txt_file_name != '0' || $txt_file_name == '') {
		# code...

			 $sql = "UPDATE book SET
					book_BooksCode='$book_BooksCode',
					book_Library='$book_Library',
					book_ReceivedDate='$book_ReceivedDate',
					book_NounPrefix='$book_NounPrefix',
					book_Author='$book_Author',
					book_Alias='$book_Alias',
					book_Translator='$book_Translator',
					book_Penname='$book_Penname',
					book_BookName='$book_BookName',
					book_Bookname1='$book_Bookname1',
					book_BookNumber='$book_BookNumber',
					book_MainCategory='$book_MainCategory',
					book_Subjects='$book_Subjects',
					book_Initials='$book_Initials',
					book_BookSet='$book_BookSet',
					book_Publisher='$book_Publisher',
					book_Print='$book_Print',
					book_Price='$book_Price',
					book_NumberOfPages='$book_NumberOfPages',
					book_PublishedYear='$book_PublishedYear',
					book_BookNumber1='$book_BookNumber1',
					book_Heading1='$book_Heading1',
					book_Heading2='$book_Heading2',
					book_Heading3='$book_Heading3',
					book_ISBN='$book_ISBN',
					book_BookSize='$book_BookSize',
					book_No='$book_No',
					book_Source='$book_Source',
					book_StorageLocation='$book_StorageLocation',
					book_DateOfIssue='$book_DateOfIssue',
					book_Status='$book_Status',
					book_Picture='$newname'
					WHERE book_id='$book_id'";

					if($newname != '') 
					{
						copy($txt_file_tmp, $path.$newname);
						if($txt_file_delete != '') {
							unlink($path.$txt_file_delete);
						}
					
					}
	}else{
			$sql = "UPDATE book SET
					book_BooksCode='$book_BooksCode',
					book_Library='$book_Library',
					book_ReceivedDate='$book_ReceivedDate',
					book_NounPrefix='$book_NounPrefix',
					book_Author='$book_Author',
					book_Alias='$book_Alias',
					book_Translator='$book_Translator',
					book_Penname='$book_Penname',
					book_BookName='$book_BookName',
					book_Bookname1='$book_Bookname1',
					book_BookNumber='$book_BookNumber',
					book_MainCategory='$book_MainCategory',
					book_Subjects='$book_Subjects',
					book_Initials='$book_Initials',
					book_BookSet='$book_BookSet',
					book_Publisher='$book_Publisher',
					book_Print='$book_Print',
					book_Price='$book_Price',
					book_NumberOfPages='$book_NumberOfPages',
					book_PublishedYear='$book_PublishedYear',
					book_BookNumber1='$book_BookNumber1',
					book_Heading1='$book_Heading1',
					book_Heading2='$book_Heading2',
					book_Heading3='$book_Heading3',
					book_ISBN='$book_ISBN',
					book_BookSize='$book_BookSize',
					book_No='$book_No',
					book_Source='$book_Source',
					book_StorageLocation='$book_StorageLocation',
					book_DateOfIssue='$book_DateOfIssue',
					book_Status='$book_Status'
					WHERE book_id='$book_id'";
	}
		
		$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());

	mysql_close();


	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขสำเร็จ!');";
			echo "window.location='Abook.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='Abook.php';";
			echo "</script>";
	  }

 ?>