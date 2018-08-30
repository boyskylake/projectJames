<?php 
include 'includes/config.php';
if (isset($_GET['id'])) {
  $order_id = $_GET['id'];
}
$query = "SELECT * FROM order_detail WHERE id_stock = ".$order_id." ";
$order = mysqli_query($conn, $query) or die(mysqli_error($conn));

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
              <a href="#" class="active nav-link">รายละเอียด การจอง</a>
            </li>
          </ul>
          <br>
            <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th scope="col">ที่</th>
                      <th scope="col">รหัสหนังสือ</th>
                      <th scope="col">ชื่อหนังสือ</th>
                      <th scope="col">ISBN</th>
                      <th scope="col">กศน.</th>
                      <th scope="col">วันรับ</th>
                      <th scope="col">วันคืน</th>
                      <th scope="col">สถานะ</th>
                    </tr>
                  </thead>
                  <tbody>
              <?php
                $i = 1;
                 while ($rs = mysqli_fetch_assoc($order)) {
              ?>
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $rs["b_codes"]; ?></td>
                      <td><?php echo $rs["b_name"]; ?></td>
                      <td><?php echo $rs["b_isbn"]; ?></td>
                      <td><?php echo $rs["b_library"]; ?></td>

                      <td><?php if ($rs["date_receive"] == '0000-00-00') {
                        echo "เจ้าหน้าที่ ยังไม่ระบุ";
                      }else{ echo $rs["date_receive"]; } ?>
                      </td>

                      <td><?php if ($rs["date_return"] == '0000-00-00'){
                        echo "เจ้าหน้าที่ ยังไม่ระบุ";
                      }else{ echo $rs["date_return"]; } ?>
                      </td>

                      <td><?php echo $rs["status"]; ?></td>
                    </tr>
            <?php
            $i++;
            }
            
            ?>
                  </tbody>
                </table>

              
            <div align="center"> <br><button type="button" class="btn btn-info" onclick="sendValue();">ปิด</button></div>  
        </div>
      </div> 
    </div>
   <br>
   <br>
   <script type="text/javascript">
    // $(document).ready(function(){
    //   $('.datatable').dataTable();
    // });
        function sendValue()
        {
        // window.opener.updateValue(value);
        window.close();
        }
    </script>
</body>
</html>