<!DOCTYPE html>
<html>
<head>
  <?php include '../includes/head.inc.php';?>

   <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
  <script src="js/prototype.js" type="text/javascript"></script>
  <script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
  <script src="js/lightbox.js" type="text/javascript"></script>

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
    $id_act = $_GET['id_act'];
    $strSQL = "SELECT * FROM nt_act where id_act=".$id_act." ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery); 
    ?>

     <h5 align="left"><a href="photo_add.php?id_act=<?php echo $objResult['id_act'];?>" title="photo_add">เพิ่มรูป</a></h5> 
     <h5 align="right"><a href="photo_add.php?id_act=<?php echo $objResult['id_act'];?>" title="photo_add">ลบภาพทั้งหมด</a></h5> 
      <br>

<?php

	 echo"<img src='images/ic_pho.PNG' width='23' height='23' />  <b>".$objResult['name_act']."</b>";
	 
    $strSQL = "SELECT * FROM nt_photo where id_act= '$id_act' ORDER BY id_photo ASC ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    if(!$objResult)
	{
	echo "<img src='images/9MNUSsbvD0i.png'  width='32' height='32' /> [<a href='photo_add.php?id_act=".$id_act."' title=''>photo_add</a>]";
	}
	else
	{	
    $strSQL = "SELECT * FROM nt_photo where id_act= '$id_act' ORDER BY id_photo ASC ";
    $objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
    echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";   
    $intRows = 0;
    while($objResult = mysqli_fetch_array($objQuery))
    {
   $intRows++;
   echo "<td>";                                 
   ?>
    <br>
                <table>
                  <tr>
                    <td>

                      <table>
                      <tr>
                  <a href="myphoto/<?php echo $objResult["name_photo"];?>" rel="lightbox[roadtrip]"><img src="myphoto/<?php echo $objResult["name_photo"];?>" width="163" border="0"/></a>
                      </tr>
                    </table>

                      <table>
                        <tr>
                          <td>
                            <br>
                            <a href="photo_title_page.php?id_photo=<?php echo $objResult["id_photo"];?>&id_act=<?php echo $objResult["id_act"];?>" title="">ตั้งภาพนี้เป็นปกอัลบั้ม</a>
                          </td>
                          </tr>
                          <tr>
                          <td>
                            <a href="photo_del.php?id_photo=<?php echo $objResult["id_photo"];?>&id_act=<?php echo $objResult["id_act"];?>" onclick="return confirm('ยืนยันการลบข้อมูล')" title="">ลบ</a>
                          </td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>

       <?php
        echo"</td>";
        if(($intRows)%6==0)
       {
        echo"</tr>";
        }
       else
       {
       echo "<td>";
        }  
    }
    echo"</tr></table>";
  }
    ?>

</div>
</div>
</div>

<br><br>
       <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <div class="container">
    <div class="text-center bg-primary text-white py">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="display-4">Library</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="https://www.facebook.com/" class="text-white" target="_blank">
              <i class="fa fa-fw fa-facebook fa-3x mx-3"></i>
            </a>
            <a href="https://twitter.com/" class="text-white" target="_blank">
              <i class="fa fa-fw fa-twitter fa-3x mx-3"></i>
            </a>
            <a href="https://plus.google.com/" class="text-white" target="_blank">
              <i class="fa fa-fw fa-3x fa-google-plus mx-3"></i>
            </a>
            <a href="https://www.instagram.com/" class="text-white" target="_blank">
              <i class="fa fa-fw fa-instagram fa-3x mx-3"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</body>
</html>
