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
       

    <?php
include("../includes/config.php");   

$strSQL = "UPDATE nw_news SET "; 
$strSQL .="name_act = '".$_POST["name_act"]."',date_act = '".$_POST["date_act"]."',detail_act = '".$_POST["detail_act"]."' "; 
$strSQL .="WHERE id_act = '".$_GET["id_act"]."' "; 
$objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());
//$objQuery = mysqli_query($strSQL); 
if($objQuery) 
{
echo "<table width='346' height='35' border='0' cellpadding='0' cellspacing='0'>
        <tr>
        <td background='../../images/end.png'>&nbsp;&nbsp;&nbsp;&nbsp; <span class='style17'>แก้ไขข้อมูลเรียบร้อย</span>
		</td>
        </tr>
        </table>";
echo "<meta http-equiv=refresh content=0;URL=data_news.php>";
} 
else
{     
echo "Error Save [".$strSQL."]"; 
} 
mysqli_close($conn); 
?> 


</div>
</div>
</div>
<br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>
</html>
