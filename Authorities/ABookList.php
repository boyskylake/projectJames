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
              <a href="#" class="active nav-link">รายการจองหนังสือ</a>
            </li>
          </ul>
          <br>
            <div class="row">
              <div class="col-md-12">

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ที่</th>
                      <th scope="col">รายการ</th>
                      <th scope="col">ผู้จอง</th>
                      <th scope="col">สถานะ</th>
                      <th scope="col">วันที่จอง</th>
                    </tr>
                  </thead>
                  <tbody>

                    <form action="update_orderlist.php" method="POST" enctype="multipart/form-data">  
              <?php 
                  require_once 'includes/config.php';

                  $sql = "SELECT * FROM `order_stock` ORDER BY `id_stock` DESC";
                    $query = mysqli_query($conn,$sql) or die("wrong query");

                  while($result=mysqli_fetch_array($query))
                {
              ?>
                    <tr>
                      <th scope="row"><?php echo $result["id_stock"]; ?></th>

                    <?php 
                    $sql1 = "SELECT *,COUNT(`id_stock`) AS stock FROM `order_detail` WHERE `id_stock` = '".$result["id_stock"]."'";
                    $query1 = mysqli_query($conn,$sql1) or die("wrong query");
                    $result1 = mysqli_fetch_array($query1)
                   ?>

                      <td><a href="view_order.php?id=<?php echo $result1['id_stock']; ?>" class="btn btn-success"> ดูรายละเอียด </a> &nbsp;<span class="label label-info"><?php echo $result1['stock']; ?>&nbsp;รายการ</span></td>
                      <td><a href="#" class="btn btn-success"><?php echo $result1["name"]; ?></a></td>

                      <td><select name="status[]">
                          <option value="รอตวรจสอบ" <?php if($result["status"] == "รอตวรจสอบ") echo 'selected'; ?> >รอตวรจสอบ</option>
                          <option value="รอรับ" <?php if($result["status"] == "รอรับ") echo "selected"; ?> >รอรับ</option>
                          <option value="รับแล้ว" <?php if($result["status"] == "รับแล้ว") echo "selected"; ?> >รับแล้ว</option>
                        </select>
                        <input hidden type="text" name="id[]" value="<?php echo $result["id_stock"]; ?>">
                      </td>

                      <td><?php echo $result["Date"]; ?></td>
                    </tr>
            <?php
            }
            ?>
                  </tbody>
                </table>
                  <div align="right">
                <button type="submit" class="btn btn-info" >บันทึก</button>
              </div>
          </form>

              </div>
            </div>
        </div>
      </div>
      <!-- Javascript -->
  <!-- <script type="text/javascript">
    function getpopup(id) {
      window.open('view_order.php?id='+id,'','width=1024, height=700, scrollbars=yes, resizable=no');
    }
  </script>
 -->
  <br><br>
  <?php include 'includes/footer.inc.php'; ?>
</body>

</html>