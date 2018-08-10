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
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <p class="active nav-link"></p>
            </li>
          </ul>
      
          <?php
include("includes/config.php");   
if($_GET['status'] == 'ไม่ใช้งาน')
{
      $strSQL = "UPDATE member SET "; 
      $strSQL .="member_Status = 'ใช้งาน' "; 
      $strSQL .="WHERE member_id = '".$_GET["id"]."' "; 
      $objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());
      //$objQuery = mysqli_query($strSQL); 
      if($objQuery) 
      {
      echo "<meta http-equiv=refresh content=0;URL=aMember.php>";
      } 
      else
      {     
      echo "Error Save [".$strSQL."]"; 
      } 
      mysqli_close($conn);
}
else
{
      $strSQL = "UPDATE member SET "; 
      $strSQL .="member_Status = 'ไม่ใช้งาน' "; 
      $strSQL .="WHERE member_id = '".$_GET["id"]."' "; 
      $objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());
      //$objQuery = mysqli_query($strSQL); 
      if($objQuery) 
      {
      echo "<meta http-equiv=refresh content=0;URL=aMember.php>";
      } 
      else
      {     
      echo "Error Save [".$strSQL."]"; 
      } 
      mysqli_close($conn);
}

?>

           </div>
      </div>
    </div>

<br><br>
  <?php include 'includes/footer.inc.php'; ?>
</body>
</html>
