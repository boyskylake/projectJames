<?php 
include 'includes/config.php';
if (isset($_GET['id'])) {
  $order_id = $_GET['id'];
}
$query = "SELECT * FROM order_detail WHERE id_stock = '".$order_id."' ";
$order = mysqli_query($conn, $query) or die(mysqli_error($conn));
$result = mysqli_fetch_assoc($order);
?>

<!DOCTYPE html>
<html>

<head>
   <?php
    include("includes/head.inc.php");
   ?>

   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $("#rev_date,#re_date").datepicker({
    changeMonth: true, 
    changeYear: true,
    dateFormat: 'dd-mm-yy', 
    dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
    dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
    monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
    monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'],
    firstDay: 1,
  });
    
  } );
  </script>
</head>

<body>

    <div class="container">
      <div class="row">
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">รายละเอียด การจอง ที่ <?php echo $order_id.' ชื่อผู้จอง '.$result['name'] ?></a>
            </li>
          </ul>
          <br>
          <form action="update_order.php" method="POST" enctype="multipart/form-data">  
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
                $order = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while ($rs = mysqli_fetch_array($order)) {
              ?>
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $rs["b_codes"]; ?></td>
                      <td><?php echo $rs["b_name"]; ?></td>
                      <td><?php echo $rs["b_isbn"]; ?></td>
                      <td><?php echo $rs["b_library"]; ?></td>
      
                      <td><input name="daterev[]" type="text" id="rev_date" value="<?php echo $rs["date_receive"]; ?>"> </td>
                      <td><input name="datereturn[]" type="text" id="re_date" value="<?php echo $rs["date_return"]; ?>"> </td>

                      <td>
                        <select name="status[]">
                          <option value="รอตวรจสอบ" <?php if($rs["status"] == "รอตวรจสอบ") echo 'selected'; ?> >รอตวรจสอบ</option>
                          <option value="รอรับหนังสือ" <?php if($rs["status"] == "รอรับหนังสือ") echo "selected"; ?> >รอรับหนังสือ</option>
                          <option value="คืนแล้ว" <?php if($rs["status"] == "คืนแล้ว") echo "selected"; ?> >คืนแล้ว</option>
                        </select>
                        <input hidden type="text" name="id[]" value="<?php echo $rs["id"]; ?>">
                        <input hidden type="text" name="id_stock" value="<?php echo $order_id ?>">
                      </td>
                    </tr>
            <?php
            $i++;
            }
            
            ?>
                  </tbody>
                </table>

              <div align="center">
                <a href="ABookList.php" class="btn btn-info">กลับ</a>
                <button type="submit" class="btn btn-info" >บันทึก</button>
              </div>
          </form>
      </div> 
    </div>
   <br>
   <br>
   
</body>
</html>