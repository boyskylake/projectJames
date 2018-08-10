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
        </div>
      </div>
    </div>

    <?php
    include("../includes/config.php");  
    $id_act = $_POST['id_act'];
	for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
	{
		if($_FILES["filUpload"]["name"][$i] != "")
		{
			if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i],"myphoto/".$_FILES["filUpload"]["name"][$i]))
			{
				//*** Insert Record ***//
				$strSQL = "INSERT INTO nt_photo ";
				$strSQL .="(name_photo,id_act) VALUES ('".$_FILES["filUpload"]["name"][$i]."','".$_POST["id_act"]."')";
				$objQuery = mysqli_query($conn,$strSQL);
			}
		}
	}
	echo "<img src='images/icon_approve.png' width='16' height='16' />  sssssssssssss<br>";
	echo "<meta http-equiv=refresh content=0;URL=photo_act.php?id_act=$id_act>";
?>


 <br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>
</body>
<!-- InstanceEnd -->
</html>
