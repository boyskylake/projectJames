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
                  <a class="active nav-link" href="#">บุคลากรประจำงานบริการสารสนเทศ</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">AAAAAAAAAAAAAAAAAAAAAAAA</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Item</a>
                </li>
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