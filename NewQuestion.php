<!DOCTYPE html>
<html>

<head>
  <?php
    include("includes/head.inc.php");
   ?>
  </head>

<body>
  <div class="container">
    <?php
    include("includes/slideshow.inc.php");
   ?>
  </div>
<!--   <div class=""> -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
              <?php
              include("includes/menu.inc.php");
              ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
     <!--      <div class="col-md-12"> -->
            <?php
              include("includes/sidemenu.inc.php");
            ?>
        </div>
        <?php 
             include 'includes/config.php';
           if (isset($_GET["Action"])) {
               # code...
            if($_GET["Action"] == "Save")
            {
              //*** Insert Question ***//
              $strSQL = "INSERT INTO webboard ";
              $strSQL .="(CreateDate,Question,Details,Name) ";
              $strSQL .="VALUES ";
              $strSQL .="('".date("Y-m-d H:i:s")."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
              $objQuery = mysqli_query($conn,$strSQL);
            ?>

              <script type='text/javascript'>alert('เพิ่มกระทู้ เรียบร้อย');
                location = "Board.php";
                </script>
          <?php      
            }
          }  
         ?>
        <div class="col-md-9">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a class="active nav-link" href="#">กระดานสนทนา</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">* รายการกระทูู้</a>
              </li>
              <br>
                <?php 
                if(isset($_SESSION['status']))
                                      {
                 ?>
               <form action="NewQuestion.php?Action=Save" method="post" name="frmMain" id="frmMain">
                <table class="table" >
                          <tbody>
                                <tbody>
                                <tr>
                                    <td bgcolor="#F7F7F7"><div align="right">หัวข้อกระทู้ :</div></td>
                                    <td><label>
                                       <input name="txtQuestion" type="text" id="txtQuestion" class="form-control" size="100%">

                                    </label></td>
                                  </tr>
                                <tr>
                                  <td width="21%" bgcolor="#F7F7F7"><div align="right">รายละเอียด :</div></td>
                                  <td width="79%"><div align="left">
                                    <textarea name="txtDetails" id="txtDetails" class="form-control" rows="5"></textarea>                
                                  </div></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#F7F7F7"><div align="right">ชื่อ :</div></td>
                                    <td>
                                    <label>
                                      <input readonly="" class="form-control" name="txtName" type="text" id="txtName" value="<?php echo $_SESSION['name'] ?>">
                                    </label>
                                  </td>
                                  </tr>
                         </tbody>
                        </tbody>
                      </table>

              <ul class="nav nav-pills flex-column">
              <div class="row">              </div>
                <div class="col-md" align="right">
                 <input name="btnSave" type="submit" id="btnSave" class="btn btn-outline-primary" value="บันทึก">
                </div>
              </ul>

               </form>
                    <?php  
                                }
                                else
                                {
                                  echo '<li class="nav-item" >
                                      <a class="nav-link" href="Library.php"><h5 align="center"><b>กรุณา ล็อกอิน ก่อนตั้งกระทู้ใหม่ หรือ สมัครสมาชิก</b></h5></a>
                                    </li>';
                                }

                 ?>       
            </ul>
          </div>
        </div>
      </div>
    <!-- </div> -->
 <!-- footer -->
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>