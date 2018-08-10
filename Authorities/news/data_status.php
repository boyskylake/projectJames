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
if($_GET['status_act'] == '1')
{
      $strSQL = "UPDATE nw_news SET "; 
      $strSQL .="status_act = '0' "; 
      $strSQL .="WHERE id_act = '".$_GET["id_act"]."' "; 
      $objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());
      //$objQuery = mysqli_query($strSQL); 
      if($objQuery) 
      {
      echo "<meta http-equiv=refresh content=0;URL=data_news.php>";
      } 
      else
      {     
      echo "Error Save [".$strSQL."]"; 
      } 
      mysqli_close($conn); 
}
else
{
      $strSQL = "UPDATE nw_news SET "; 
      $strSQL .="status_act = '1' "; 
      $strSQL .="WHERE id_act = '".$_GET["id_act"]."' "; 
      $objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());
      //$objQuery = mysqli_query($strSQL); 
      if($objQuery) 
      {
      echo "<meta http-equiv=refresh content=0;URL=data_news.php>";
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
  <?php include '../includes/footer.inc.php'; ?>
</body>
</html>
