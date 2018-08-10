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
     
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link">รายการจอง</a>
            </li>
            <form class="form-inline">
              <div class="input-group">
                <input type="email" class="form-control" placeholder="">
                <div class="btn-group">
                  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ไม่ระบุ </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">คำนำหน้า</a>
                    <a class="dropdown-item" href="#">ชื่อ</a>
                    <a class="dropdown-item" href="#">อายุ</a>
                    <a class="dropdown-item" href="#">วันที่</a>
                  </div>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">ตกลง</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12"></div>
            </div>
            <div class="row">
              <div class="col-md" align="right">
                <a href="#" class="btn btn-outline-primary">พิมพ์รายการจอง</a>
              </div>
            </div>
          </ul>
        </div>

        
      </div>
    <br>
    <br>
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>