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
        </div>
      </div>
    </div>

<?php
include("../includes/config.php");    
    $strSQL = "SELECT * FROM nw_photo where id_act='$id_act' and id_photo='$id_photo' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    if($objResult)
	{
	echo "<img src='myphoto/$objResult['name_photo']' >";
	}
	else
	{	
	echo"ผิดพลาด";
	}
    ?>
</body>
</html>
