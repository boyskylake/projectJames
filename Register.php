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
                <ul class="nav nav-pills flex-column">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                      <a href="#" class="active nav-link">สมัครสมาชิก</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">* บุคคลทั่วไป</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">* บรรณารักษ์</a>
                    </li>
                  </ul>
                </ul>
              </ul>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="text-center bg-primary text-white ">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="display-4">We ♥ new friends</h1>
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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
        <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
      </pingendo>
    </div>
  </div>
</body>

</html>