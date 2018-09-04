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
$name_act = $_POST['name_act'];
$strSQL = "SELECT * FROM nw_news WHERE `name_act` = '".$name_act."'";
$objQuery = mysqli_query($conn,$strSQL);
$res =  $objQuery->fetch_assoc();
  $name_news = $res['name_act'];

  if ($name_news == $name_act) {
      echo "มีชื่อนี้แล้ว กรุณาใส่ชื่ออื่น";
      echo "<meta http-equiv=refresh content=3;URL=data_news_add.php>";  
      exit();
  }
  else
  { 
      $date_in = date("d-m-Y");
      $strSQL = "INSERT INTO nw_news ";
      $strSQL .="(name_act,date_act,detail_act,id_photo,date_in,status_act) "; 
      $strSQL .="VALUES "; 
      $strSQL .="('".$_POST["name_act"]."','".$_POST["date_act"]."','".$_POST["detail_act"]."','0','".$date_in."','0') "; 
      $objQuery1 = mysqli_query($conn,$strSQL); 
      if($objQuery1) 
      {  
      echo "<script type='text/javascript'>alert('successfully');</script>";
      echo "<meta http-equiv=refresh content=0;URL=data_news.php>";
      } 
      else
      {    
      echo "Error Save [".$strSQL."]"; 
      } 
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
