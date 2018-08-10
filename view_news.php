<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<header>
    <?php
    include("includes/head.inc.php");
    ?>
      
  <script src="js/prototype.js" type="text/javascript"></script>
  <script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
  <script src="js/lightbox.js" type="text/javascript"></script>
  <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
  </header>
<body>
  <div class="container">
    <?php
    include("includes/slideshow.inc.php");
    ?>
  </div>
<!--   <div class=""> -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
              <?php
              include("includes/menu.inc.php");
              ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
     <!--      <div class="col-md-12"> -->
            <?php
              include("includes/sidemenu.inc.php");
            ?>
        </div>


        <div class="col-md-9">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <p class="active nav-link">รายละเอียดกิจกรรม</p>
            </li>

            <li>
      <?php 
      include("includes/config.php");                                         
      $sql = "SELECT * FROM  nt_act where id_act = ".$_GET['id_act']." ";
      $dbq=mysqli_query($conn,$sql) or die ("Erorr : ");
      $numrow=mysqli_num_rows($dbq); 
      if($numrow > 0)
      {
      ?>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="99%">
                <table width="100%"   border="0" cellpadding="1" cellspacing="0">
      <?php
      $i=1;
      while($i <= $numrow)
      {
      $result = mysqli_fetch_array($dbq);
      $id_act = $result['id_act'];
      $name_act = $result['name_act'];
      $date_act = $result['date_act'];
      $detail_act = $result['detail_act'];
      $id_photo = $result['id_photo'];
      $status_act = $result['status_act'];
      ?>
                  <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td></td>
                          </tr>
                          <tr>
                            <td>
                             
                             <p><b>ชื่อกิจกรรม : </b> <?php echo $name_act?> </p>
                             <p><b>เวลากิจกรรม : </b><?php echo $date_act?></p> 
                             <p><b>รายละเอียด : </b> <?php echo $detail_act?></p>
     
                            </td>
                          </tr>
                      </table>
                    </td >
                  </tr>
                  <?php
                    $i++;
                    }
                    ?>
              </table>
            </td>
            </tr>
          </table>

            </li>
        <?php
        }
        else
        ?>
            <li>
          <table width="100%" border="0" cellpadding="1" cellspacing="0">
            <tr>
              <td width="99%" height="60">
               <!-- <div align="left">
                  <span class="style37"> -->
              <?php
              $strSQL = "SELECT * FROM nt_act where id_act = ".$id_act." ";
              $objQuery = mysqli_query($conn,$strSQL);
               $objResult = mysqli_fetch_array($objQuery);

                 echo"<p><b>ภาพกิจกรรม : </b>".$objResult['name_act']."</p>";
                 
                  $strSQL = "SELECT * FROM nt_photo where id_act=".$id_act." ORDER BY id_photo ASC ";
                  $objQuery = mysqli_query($conn,$strSQL);
                  $objResult = mysqli_fetch_array($objQuery);
                  if(!$objResult)
                {
                echo"<img src='Authorities/activity/images/9MNUSsbvD0i.png'  width='32' height='32' /><font color='#000000' face='Tahoma' size='1'> ยังไม่ได้เพิ่มรูปภาพใดๆ </font>";
                }
                else
                { 
                  $strSQL = "SELECT * FROM nt_photo where id_act='$id_act' ORDER BY id_photo ASC ";
                  $objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
                  echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";   
                  $intRows = 0;
                  while($objResult = mysqli_fetch_array($objQuery))
                  {
                 $intRows++;
                 echo "<td>";                                 
                 ?>
                <!-- </span> </div> -->
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top">
                        <table id="Table_01" width="128" height="64" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td valign="top"><a href="Authorities/activity/myphoto/<?php echo $objResult["name_photo"];?>" rel="lightbox[roadtrip]"><img src="Authorities/activity/myphoto/<?php echo $objResult["name_photo"];?>" width="120" border="0" /></a></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                      </table>
                    </td>
                    </tr>
                  </table>
      <?php
        echo"</td>";
        if(($intRows)%5==0)
       {
        echo"</tr>";
        }
       else
       {
       echo "<td>";
        } 
      }
    echo "</tr></table>";
    }
    ?>
    </table>

      </li>
    </ul>
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