<!DOCTYPE html>
<html>

<head>
  <?php include 'includes/head.inc.php'; ?>
</head>

<body>
  <div class="container">
    <?php include 'includes/slideshow.inc.php'; ?>
  </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php include 'includes/menu.inc.php'; ?>
        </div>
      </div>
      
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <p class="active nav-link">กระดานสนทนา</p>
              </li>
             </ul>
          </div>
              <div class="row">
                <div class="col-md-12">
            <?php
            include 'includes/config.php';
            if (isset($_GET["Action"])) {
              if($_GET["Action"] == "Save")
              {
                //*** Insert Reply ***//
                $strSQL = "INSERT INTO reply ";
                $strSQL .="(QuestionID,CreateDate,Details,Name) ";
                $strSQL .="VALUES ";
                $strSQL .="('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
                $objQuery = mysqli_query($conn,$strSQL);
                
                //*** Update Reply ***//
                $strSQL = "UPDATE webboard ";
                $strSQL .="SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
                $objQuery = mysqli_query($conn,$strSQL);
              }
            }
          //*** Select Question ***//
          $strSQL = "SELECT * FROM webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
          $objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
          $objResult = mysqli_fetch_array($objQuery);

          //*** Update View ***//
          $strSQL = "UPDATE webboard ";
          $strSQL .="SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
          $objQuery = mysqli_query($conn,$strSQL); 
          ?>
          <table class="table" border="1" cellpadding="1" cellspacing="1">
            <tr class="table-danger">
              <td scope="col" colspan="2"><center><h1><?php echo $objResult["Question"];?></h1></center></td>
            </tr>
            <tr class="table-success">
              <td height="53" colspan="2"><?php echo nl2br($objResult["Details"]);?></td>
            </tr>
            <tr class="table-info">
              <td width="397">Name : <?php echo $objResult["Name"];?> Create Date : <?php echo $objResult["CreateDate"];?>
                
              </td>
              <td width="100">View : <?php echo $objResult["View"];?> Reply : <?php echo $objResult["Reply"];?></td>
            </tr>
          </table>
          <br>
          <br>
          <?php
          $intRows = 0;
          $strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
          $objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL."]");
          while($objResult2 = mysqli_fetch_array($objQuery2))
          {
            $intRows++;
          ?> ที่ : <?php echo $intRows;?>
          <table class="table" border="1" cellpadding="1" cellspacing="1">
            <tr class="table-success">
              <td height="53" colspan="2"><?php echo nl2br($objResult2["Details"]);?></td>
            </tr>
            <tr class="table-info">
              <td width="397">Name :
                  <?php echo $objResult2["Name"];?> 
              </td>
              <td width="253">Create Date :
              <?php echo $objResult2["CreateDate"];?></td>
            </tr>
          </table><br>
          <?php
          }
          ?>
          <br>
          <a href="AAnswer.php">Back to Webboard</a> <br>
          <br>
          <?php 
          if(isset($_SESSION['status']))
                                {
           ?>
          <form action="ViewWebboard.php?QuestionID=<?php echo $_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
            <table class="table" border="1" cellpadding="1" cellspacing="1">
              <tr>
                <td width="100">รายละเอียด</td>
                <td><textarea class="form-control" name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
              </tr>
              <tr>
                <td width="100">ชื่อ</td>
                <td>
                  <label>
                    <?php 
                      // if ($_SESSION['status'] == 'member') {
                      //   $status = 'สมาชิก';
                      // }
                      // if ($_SESSION['status'] == 'staff') {
                      //   $status = 'เจ้าหน้าที่';
                      // }
                      // if ($_SESSION['status'] == 'admin') {
                      //   $status = 'ผู้ดูแลระบบ';
                      // }
                     ?>
                     <!-- <input hidden="" type="text" id="status" name="status" value="<?php //echo $status; ?>"> -->
                    <input readonly="" class="form-control" name="txtName" type="text" id="txtName" value="<?php echo $_SESSION['name']; ?>">
                 </label>
                  <!-- <input class="form-control" name="txtName" type="text" id="txtName"> -->
                </td>
              </tr>
            </table>
            <input name="btnSave" type="submit" id="btnSave" class="btn btn-outline-primary" value="บันทึก">
            <tr>
          </form>
          <?php  
                                }
                                else
                                {
                                  echo '<li class="nav-item" >
                                      <a class="nav-link" href="Library.php"><h5 align="center"><b>กรุณา ล็อกอิน ก่อนตอบคำถาม หรือ สมัครสมาชิก</b></h5></a>
                                    </li>';
                                }

          ?>
            <br>
          </div>
        </div>
      <!-- </div> -->
    <!-- </div> -->
          <?php
              include("includes/footer.inc.php");
            ?>
</body>
</html>