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
<!--           <div class="col-md-12"> -->
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a href="#" class="active nav-link">ผู้ดูแลระบบ</a>
              </li>
              <img class="img-fluid d-block" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
              <table class="table">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                  </tr>
                  <tr>
                    <td>Jacob</td>
                    <td>Thornton</td>
                  </tr>
                  <tr>
                    <td>Larry</td>
                    <td>the Bird</td>
                  </tr>
                </tbody>
              </table>
            </ul>
    <!--       </div> -->
        </div>
        <div class="col-md-9">
          <ul class="nav nav-pills flex-column">
            <div class="row">
                <img class="img-fluid d-block" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> </div>
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