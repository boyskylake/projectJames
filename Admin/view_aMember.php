<?php 
include 'includes/config.php';
if (isset($_GET['member_id'])) {
  $colname_Member = $_GET['member_id'];
}
$query_Member = "SELECT * FROM member WHERE member_id = ".$colname_Member." ";
$Member = mysqli_query($conn, $query_Member) or die(mysqli_error($conn));
$rs = mysqli_fetch_assoc($Member);
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
              <a href="#" class="active nav-link">ข้อมูลสมาชิก</a>
            </li>
          </ul>
          <br>
            <table width="100%">
              <tr>
                <td width="200" style="text-align: right; vertical-align: top;">
                  <?php
                    if($rs["member_Image"] == '0') {
                      $img = 'nopicture.png';
                    }else {
                      $img = $rs["member_Image"];
                    }
                  ?>
                  <img src="../img/<?php echo $img;?>" width="200" height="300">
                </td>
                <td style="vertical-align: top;">
                  <table style="background-color: #fff; width: 100%; border: solid 1px #ccc;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ชื่อ : </strong><?php echo $rs["member_Prefix"]; echo $rs["member_Name"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>รหัสสมาชิก/บัตรประชาชน : </strong><?php echo $rs["member_user"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>วันเกิด : </strong><?php echo $rs["member_Birth"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>อายุ : </strong><?php echo $rs["member_Age"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>เพศ : </strong><?php echo $rs["member_sex"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ที่อยู่ : </strong><?php  echo $rs["member_HouseNumber"]; echo $rs["member_province"]; echo $rs["member_Zip"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>กสน. : </strong><?php echo $rs["member_Library"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>โทร. : </strong><?php echo $rs["member_Phone1"]; ?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>โทร. : </strong><?php echo $rs["member_Phone2"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>สถานที่ติดต่อได้ง่าย : </strong><?php echo $rs["member_EasyContact"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ประเภทสมาชิก : </strong> <?php echo $rs["member_MembershipType"]; ?></td>
                    </tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>วันสมัคร : </strong><?php echo ($rs["member_Registration"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>วันหมดเขตุ : </strong><?php echo ($rs["member_ExpiredDate"]);?></td>
                    </tr>
                    <tr>

                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>Email : </strong><?php echo ($rs["member_Email"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ผู้ปกครอง : </strong><?php echo ($rs["member_Parent"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ที่อยู่ที่ติดต่อได้ : </strong><?php echo ($rs["member_Contact"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>ความสัมพันธ์กับผู้สมัคร : </strong><?php echo ($rs["member_Relationship"]);?></td>
                    </tr>
                    <tr>
                      <td class="txt_left col1" style="padding: 3px;"><strong>เบอร์ : </strong><?php echo ($rs["member_Telephone"]);?></td>
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

