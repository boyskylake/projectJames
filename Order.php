<!DOCTYPE html>
<html>

<head>
  <?php
  ob_start();
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
        // $_SESSION["Book"] = null;
            include 'includes/config.php';

              //============ Check ว่ามีซ้ำแล้วหรือยัง
                if(isset($_GET["book_id"]))
                {
                  foreach($_SESSION['Book'] as $id=>$x)
                  {
                    if ($x['id'] == $_GET["book_id"]) {
                        header("location:$_SERVER[PHP_SELF]");
                        exit();
                    }
                  }
                }
            //============ ถ้ามีการเลือกรายการสินค้าให้เก็บลง Session
           if (isset($_GET["book_id"])) {
                  $book_id = $_GET["book_id"];
                  $_SESSION["Book"][] = array('id' => "$book_id");
                  session_write_close();
                  header("location:$_SERVER[PHP_SELF]");
            }
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                unset($_SESSION['Book'][$id]);
                session_write_close();
                header("location:$_SERVER[PHP_SELF]");
            }
             
         ?>
        <div class="col-md-9">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <p class="active nav-link">สถานะการจอง</p>
              </li>
           <!--    <li class="nav-item">
                <a class="nav-link" href="#">* รายการกระทูู้</a>
              </li> -->
              <br>
              <?php 
                if(isset($_SESSION['status']))
                  {
              ?>
               <form entype="multipart/data" action="includes/process_order.php" method="post" name="frmMain" id="frmMain">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ที่</th>
                      <th scope="col">รหัสหนังสือ</th>
                      <th scope="col">ชื่อหนังสือ</th>
                      <th scope="col">ISBN</th>
                      <th scope="col">กศน.</th>
                      <th scope="col">ลบ</th>
                    </tr>
                  </thead>
                  <tbody>
              <?php 
                  //============ ทำการแสงรายการที่ได้เลือกว่ามีกี่รายการ
                $strNum=0;
                // $strTotal=0;
                  if (isset($_SESSION["Book"])) {
                    $i = 1;

                    foreach($_SESSION['Book'] as $id=>$x)
                    // for($i=0;$i<=count($_SESSION["Book"]);$i++)
                    {
                    //============ เลือกว่ารายการสินค้าใดบ้าง
                    $q="select * from book where book_id = '".$x['id']."' ";
                    $res=mysqli_query($conn,$q) or die("wrong query");
                    $result=mysqli_fetch_assoc($res);

                    if($result)
                    {
                    $strNum++;
              ?>
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $result["book_BooksCode"]; ?></td>
                      <td><?php echo $result["book_BookName"]; ?></td>
                      <td><?php echo $result["book_ISBN"]; ?></td>
                      <td><?php echo $result["book_Library"]; ?></td>                    
                      <td><button class="btn btn-danger"><a href='Order.php?id=<?php echo $id; ?>'>Delete</a></button> </td>
                      <input hidden="" type="text"  name="bookid[]" value="<?php echo $result["book_id"]; ?>"/>
                    </tr>
            <?php
            $i++;
            }
            }
            }
            ?>
                  </tbody>
                </table>
          <?php 
            if($strNum==0)
              {
                echo '<li class="nav-item" >
                  <h5 align="center"><b>ไม่มีรายการจอง</b></h5> </li>';
          ?>
                <ul class="nav nav-pills flex-column">
                <div class="col-md" align="center">
                 <input name="btn" type="button" id="btn" class="btn btn-outline-primary" onClick="window.location='Library.php';" value="เลือกหนังสือต่อ">
                </div>
              </ul>
          <?php
              }
              else
            {
           ?>
              <ul class="nav nav-pills flex-column">
                <div class="col-md" align="center">
                 <input name="btnSave" type="submit" id="btnSave" class="btn btn-outline-primary" value="สั่งจอง">
                 <input name="btn" type="button" id="btn" class="btn btn-outline-primary" onClick="window.location='Library.php';" value="เลือกหนังสือต่อ">
                </div>
              </ul>

               </form>
        <?php 
                }
              }
              else
              {
               echo '<li class="nav-item" >
                <a class="nav-link" href="Library.php"><h5 align="center"><b>กรุณา ล็อกอิน ก่อนจองหนังสือ</b></h5></a> </li>';
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