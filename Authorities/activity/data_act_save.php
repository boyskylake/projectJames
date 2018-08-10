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
$strSQL = "SELECT * FROM nt_act where name_act = ".$name_act." ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if ($objQuery) {
    if($objResult['name_act'] = $name_act)
      {
      echo "<meta http-equiv=refresh content=3;URL=data_act_add.php>";
      }
}
else
{
$date_in = date("d-m-Y");
$strSQL = "INSERT INTO nt_act ";
$strSQL .="(id_act,name_act,date_act,detail_act,id_photo,date_in,status_act) "; 
$strSQL .="VALUES "; 
$strSQL .="('','".$_POST["name_act"]."','".$_POST["date_act"]."','".$_POST["detail_act"]."','','$date_in','') "; 
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
