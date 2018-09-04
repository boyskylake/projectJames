<!DOCTYPE html>
<html>

<head>
  <?php
    include("includes/head.inc.php");
   ?>
  </head>

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
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a class="active nav-link" href="#">ปรัชญา วิสัยทัศน์ พันธกิจ</a>
                </li>
              </ul>
              <br>
              <?php 
                   include("includes/config.php");  
                    $sql = "SELECT * FROM `information`";
                      $query = mysqli_query($conn,$sql);

                while($resut = mysqli_fetch_array($query))
                {
               ?>
              <h2 align="center"><?php echo $resut['information_library'];  ?></h2>
                <dl class="row">
                  <dt class="col-sm-3">ปรัชญา</dt>
                  <dd class="col-sm-9"><?php echo $resut['information_philosophy'];  ?></dd>

                  <dt class="col-sm-3">วิสัยทัศน์</dt>
                  <dd class="col-sm-9">
                    <p><?php echo $resut['information_vision'];  ?></p>
                  </dd>

                  <dt class="col-sm-3">พันธกิจ</dt>
                  <dd class="col-sm-9"><p><?php echo $resut['information_mission'];  ?></p></dd>
                </dl>
                <br>
                <?php 
                }
                 ?>
            </ul>
          </div>
        </div>
      </div>
    <!-- </div> -->
    <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>