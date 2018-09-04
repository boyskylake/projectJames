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
                  <a class="active nav-link" href="#">ประวัติห้องสมุด</a>
                </li>
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
                  <dt class="col-sm-3">ประวัติความเป็นมา</dt>
                  <dd class="col-sm-9"><?php echo $resut['information_history'];  ?></dd>
                </dl>
                <br>
                <?php 
                }
                 ?>

              </ul>
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