<?php 
include 'includes/config.php';
if (isset($_GET['book_id'])) {
  $book_id = $_GET['book_id'];
}
$query = "SELECT * FROM book WHERE book_id = ".$book_id." ";
$book = mysqli_query($conn, $query) or die(mysqli_error($conn));
$rs = mysqli_fetch_assoc($book);
// $totalRows_Member = mysqli_num_rows($row_Member);
// $member_Library = $row_Member
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
      <div class="row">
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">ข้อมูลหนังสือ</a>
            </li>
          </ul>
          <br>
            <table width="100%">
              <tr>
                <td width="200" style="text-align: right; vertical-align: top;">
                  <?php
                    if($rs["book_Picture"] == '') {
                      $img = 'nopicture.png';
                    }else {
                      $img = $rs["book_Picture"];
                    }
                  ?>
                  <img src="../img/<?php echo $img;?>" width="200" height="300">
                </td>
                <td style="vertical-align: top;">
                  <table style="background-color: #fff; width: 100%; border: solid 1px #ccc;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>รหัสหนังสือ : </strong><?php echo $rs["book_BooksCode"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>กศน. : </strong><?php echo $rs["book_Library"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>วันรับ : </strong><?php echo $rs["book_ReceivedDate"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>คำนำหน้านาม : </strong><?php echo $rs["book_NounPrefix"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>นามผู้แต่ง : </strong><?php echo $rs["book_Author"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>นามแฝง : </strong><?php  echo $rs["book_Alias"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>นามผู้แปล : </strong><?php echo $rs["book_Translator"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>นามปากกา : </strong><?php echo $rs["book_Penname"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ชื่อหนังสือ : </strong><?php echo $rs["book_BookName"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ชื่อหนังสือ (ต่อ) : </strong><?php echo $rs["book_Bookname1"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>เลขที่หมู่หนังสือ : </strong> <?php echo $rs["book_BookNumber"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>หมวดหมู่หลัก : </strong><?php echo ($rs["book_MainCategory"]);?></td>
                    </tr>
                    <tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>หมวดหมู่ย่อย : </strong><?php echo ($rs["book_Subjects"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ชื่อย่อผู้แต่ง/เลขที่/ชื่อย่อหนังสือ : </strong><?php echo ($rs["book_Initials"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ชื่อชุดหนังสือ : </strong><?php echo ($rs["book_BookSet"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ชื่อสำนักพิมพ์ : </strong><?php echo ($rs["book_Publisher"]);?> <strong>ครั้งที่พิมพ์ : </strong> <?php echo ($rs["book_Print"]);?> <strong>ราคา : </strong> <?php echo ($rs["book_Price"]);?> <strong>จำนวนหน้า : </strong> <?php echo ($rs["book_NumberOfPages"]);?> <strong>ปีที่พิมพ์ : </strong><?php echo ($rs["book_PublishedYear"]);?> <strong>เล่มที่ : </strong><?php echo ($rs["book_BookNumber1"]);?>
                    </td>
                    </tr>
                     <tr>
                      <td class="txt_left col1" style="padding: 3px;"> <strong>หัวเรื่อง (1) : </strong><?php echo ($rs["book_Heading1"]);?></td>
                    </tr>
                     <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>หัวเรื่อง (2) : </strong><?php echo ($rs["book_Heading2"]);?></td>
                    </tr>
                     <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>หัวเรื่อง (3) : </strong><?php echo ($rs["book_Heading3"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ISBN : </strong><?php echo ($rs["book_ISBN"]);?> <strong> ขนาดหนังสือ : </strong><?php echo ($rs["book_BookSize"]);?> <strong> ฉบับที่ : </strong><?php echo ($rs["book_No"]);?> </td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>สถานที่เก็บ : </strong><?php echo ($rs["book_StorageLocation"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>แหล่งที่มา : </strong><?php echo ($rs["book_Source"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>วันจำหน่าย : </strong><?php echo ($rs["book_DateOfIssue"]);?></td>
                    </tr>
                  </table>
                </td>
              </tr>
              </table>
        </div>
      </div> 
    </div>
   <br>
   <br>
</body>
</html>