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
$name_act = $_POST['name_act'];
$strSQL1 = "SELECT * FROM nt_act where name_act = '".$name_act."' ";
$objQuery1 = mysqli_query($conn,$strSQL1);
$res =  $objQuery1->fetch_assoc();
  $name = $res['name_act'];

  if ($name == $name_act) {

        echo "มีชื่อนี้แล้ว กรุณาใส่ชื่ออื่น";      
        echo "<meta http-equiv=refresh content=3;URL=data_act_add.php>";
        exit();
  }
  else
  {
      $date_in = date("d-m-Y");
      $strSQL = "INSERT INTO nt_act ";
      $strSQL .="(name_act,date_act,detail_act,id_photo,date_in,status_act) "; 
      $strSQL .="VALUES "; 
      $strSQL .="('".$_POST["name_act"]."','".$_POST["date_act"]."','".$_POST["detail_act"]."','0','$date_in','0')"; 
      $objQuery = mysqli_query($conn,$strSQL); 
      if($objQuery) 
      {  
        echo "<script type='text/javascript'>alert('successfully');</script>";
        echo "<meta http-equiv=refresh content=0;URL=data_act.php>";
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
