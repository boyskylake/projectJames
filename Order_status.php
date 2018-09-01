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
         ?>
        <div class="col-md-9">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <p class="active nav-link">สถานะการจอง</p>
              </li>
              <br>
              <?php 
              $uid = $_SESSION['uid'];
                // echo $uid;
                $sqlid = "SELECT * FROM `order_stock` WHERE `id_user` = '".$uid."'";
                    $quid = mysqli_query($conn,$sqlid) or die("wrong query");
                    $resuid = mysqli_fetch_array($quid);

      if (!empty($resuid['id_user'])) 
      {

                if(isset($_SESSION['status']))
                  {
                   
              ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ที่</th>
                      <th scope="col">รายการ</th>
                      <th scope="col">สถานะ</th>
                      <th scope="col">วันที่จอง</th>
                    </tr>
                  </thead>
                  <tbody>
              <?php 
                $sqlid2 = "SELECT * FROM `order_stock` WHERE `id_user` = '".$uid."'";
                $quid2 = mysqli_query($conn,$sqlid) or die("wrong query");
                

                while($resuid2 = mysqli_fetch_array($quid2))
                {
                $id_stock = $resuid2['id_stock'];
                // echo $id_stock;

                  $sql1 = "SELECT *,COUNT(`id_stock`) AS stock FROM order_detail WHERE id_stock = '".$id_stock."' GROUP BY id_stock";
                    $query = mysqli_query($conn,$sql1) or die("wrong query");
                    $result = mysqli_fetch_array($query);
                    // while(
                    // {
                 
              ?>
                    <tr>
                      <th scope="row"><?php echo $result["id_stock"]; ?></th>
                      <td>
            <a href="javascript:getpopup('<?php echo $result['id_stock']; ?>');" class="btn btn-success">
                ดูรายละเอียด
              </a>
              &nbsp;
              <span class="label label-info">
                <?php echo $result['stock']; ?>&nbsp;รายการ
              </span>
            </td>
                  <?php 
                    $sql2 = "SELECT * FROM `order_stock` WHERE `id_stock` = '".$result["id_stock"]."'";
                    $query1 = mysqli_query($conn,$sql2) or die("wrong query");
                    $result1 = mysqli_fetch_array($query1)
                   ?>
                      <td><?php echo $result1["status"]; ?></td>
                      <td><?php echo $result1["Date"]; ?></td>
                    </tr>
            <?php
                    // }
            }
            ?>
                  </tbody>
                </table>
        <?php 
                }
              else
              {
               echo '<li class="nav-item" >
                <a class="nav-link" href="Library.php"><h5 align="center"><b>กรุณา ล็อกอิน ก่อนจองหนังสือ</b></h5></a> </li>';
              }

      }
      else
      {
         echo '<li class="nav-item" >
                <a class="nav-link" href="Library.php"><h5 align="center"><b>ยังไม่มีรายการสั่งจอง ของคุณ</b></h5></a> </li>';
      }

        ?>       
            </ul>
          </div>
        </div>
      </div>
    <!-- </div> -->
 <!-- footer -->
  <script type="text/javascript">
    function getpopup(id) {
      window.open('view_order.php?id='+id,'','width=1024, height=700, scrollbars=yes, resizable=no');
    }
  </script>
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>