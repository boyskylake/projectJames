<!DOCTYPE html>
<html>
<head>
  <?php include '../includes/head.inc.php'; ?>
</head>

<body>
  <div class="container">
    <?php include '../includes/slideshow.inc.php'; ?>
  </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php include 'includes/menu.inc.php'; ?>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <p class="active nav-link">ข่าวประชาสัมพันธ์</p>
            </li>
          </ul>
          ข่าวประชาสัมพันธ์ทั้งหมดมี
     
<?php
include("../includes/config.php");                                       
$sql = "SELECT * FROM  nw_news  order by id_act desc ";
$dbq=mysqli_query($conn,$sql) or die ("Error");
$numrow=mysqli_num_rows($dbq); 
//echo"$sql";
?>                      <?php echo $numrow; ?>
                    </div>
                  </div>
                </div>
                <br>
                        <?php
                        if($numrow > 0)
                        {
                        ?>
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th >ที่</th>
                                  <th >ชื่อข่าวประชาสัมพันธ์</th>
                                  <th >วันที่</th>
                                  <th >ภาพปกอัลบั้ม</th>
                                  <th >รูปภาพข่าวประชาสัมพันธ์</th>
                                  <th >อนุญาติ</th>
                                  <th >แก้ไข</th>
                                  <th >ลบ</th>
                                </tr>
                                </thead>
                                <tbody>
              <?php
              $i = 1;
              while($result=mysqli_fetch_array($dbq))
              {
              $id_act=$result['id_act'];
              $name_act=$result['name_act'];
              $date_act=$result['date_act'];
              $detail_act=$result['detail_act'];
              $id_photo=$result['id_photo'];
              $status_act=$result['status_act'];
              ?>
                                <tr>
                                  <td><?php echo $i ?></td>
                                  <td><?php echo $name_act?></td>
                                  <td><?php echo $date_act?></td>
                                  <td><script type="text/javascript"   src="wz_tooltip.js"></script>  
  <FONT class=f-m-ora onmouseover="Tip('<img src=\'myphoto/<?php
$strSQL = "SELECT * FROM nw_photo where id_photo='$id_photo' ";
$objQuery = mysqli_query($conn,$strSQL);
 $objResult = mysqli_fetch_array($objQuery); 
 echo $objResult['name_photo'];
 ?>\'  width=\'150\'>')"><img src="images/photo.PNG" width="19" height="16" border="0" /></a></td>
                                  <td><a href="photo_news.php?id_act=<?php echo $id_act?>" title="เพิ่มรูปภาพข่าวประชาสัมพันธ์">เพิ่มรูปภาพ<img src="images/attach.gif" width="8" height="13" border="0" /></a></td>
                                  <td><?php
                                    if($status_act=='1')
                                    {
                                    echo"<form id='form1' name='form1' method='post' action='data_status.php?id_act=$id_act&status_act=$status_act'><input type='image' name='submit' value='submit' src='images/icon_approve.png' width='16' height='16' title='' /></form>";
                                    }
                                    else
                                    {
                                    echo"<form id='form1' name='form1' method='post' action='data_status.php?id_act=$id_act&status_act=$status_act'><input type='image' name='submit' value='submit' src='images/icon_delete.png' width='16' height='16' title='' /></form>";
                                    }
                                    ?></td>
                                  <td><a href="data_news_edit.php?id_act=<?php echo $id_act?>" title="" ><img src="images/forward_f2.png" width="16" border="0" /></a></td>
                                  <td><a href="data_news_del.php?id_act=<?php echo $id_act?>" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบข้อมูลข่าวประชาสัมพันธ์นี้  ++ ยืนยันการลบโดยเจ้าหน้าที่ ++ ')"><img src="images/publish_x.png" width="16" height="16" border="0" title="" /></a></td>
                                </tr>
                                <?php
                                $i++;
                                  }
                                  ?>
                              </tbody>
                            </table>
                              <?php
                                }
                                else
                                echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=red>ไม่มีข้อมูล </b>";

                              ?>
                          </div>
                        </div>
                      </div>
<br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>
</html>
