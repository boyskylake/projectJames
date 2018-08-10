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
                $id_photo=$_GET['id_photo'];
                $id_act=$_GET['id_act'];
                $sql="select * from nw_photo where id_photo='$id_photo' ";
                $result = mysqli_query($conn,$sql);
                //$result=mysql_db_query($dbname,$sql) or die(mysql_error() . '<br/>' . $sql);
                // $objResult = mysql_fetch_array($objQuery);
                // echo $objResult;
                while ($r = mysqli_fetch_array($result) )  {
                      $name_photo = $r['name_photo'];
                if (file_exists("myphoto/$name_photo")) {
                    unlink("myphoto/$name_photo");
                  }
                }
                $sql="delete from nw_photo where id_photo='$id_photo' ";
                mysqli_query($conn,$sql);
                    echo "<br><img src='../../images/publish_x.png' width='16' height='16' /> DELELTE";
                    echo"<meta http-equiv='refresh' content='0;URL=photo_news.php?id_act=$id_act'>";   
                mysqli_close($conn);

                ?>

</div>
</div>
</div>

<br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>
</html>
