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
              <p class="active nav-link">กิจกรรม</p>
            </li>
          </ul>

<?php
include("../includes/config.php"); 
$id_act = $_GET["id_act"];
$strSQL = "SELECT * FROM nt_photo WHERE  id_act = '".$_GET["id_act"]."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if($objResult)
{
echo"<br>&nbsp;** ไม่สามารถลบ กิจกรรมได้้ เนื่องจากยังมีรูปภาพกิจกรรมค้างอยู่ กรุณาเข้าไปลบรูปภาพก่อนครับ  <a href='photo_act.php?id_act=$id_act' title='รูปภาพกิจกรรม'>[รูปภาพกิจกรรม]</a>";
}
else
{
$strSQL = "DELETE FROM nt_act ";             
$strSQL .="WHERE id_act = '".$_GET["id_act"]."' ";           
$objQuery = mysqli_query($conn,$strSQL);   
echo "<meta http-equiv=refresh content=0;URL=data_act.php>";
mysqli_close($conn); 
}
?>

</div>
      </div>
    </div>

<br><br>
  <?php include '../includes/footer.inc.php'; ?>
</table>
</body>
</html>
