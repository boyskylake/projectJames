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
      
  <script language="JavaScript" type="text/javascript">
  function checkma()
  {
  d=document.form1
  if(d.date_act.value=="")
  {
  alert("กรุณากรอก เวลากิจกรรม");
  d.date_act.focus();
  return false;
  } 
  
else
  return true;
  }
</script>
                 <div class="container">
                 <form id="form1" name="form1" method="post" action="data_act_save.php" enctype="multipart/form-data" class="needs-validation" onsubmit="return checkma()" novalidate>
                    <div class="form-row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-7 sm-5">
                        <label for="validationCustom01">ชื่อกิจกรรม</label>
                        <input type="text" class="form-control" name="name_act" required>
                        <div class="invalid-feedback">
                          กรุณากรอก ชื่อกิจกรรม
                        </div>
                        <br>
                        <div class="col-sm-4 sm-3">
                        <label for="validationCustom02">เวลากิจกรรม</label>
                        <!-- <input type="text" class="form-control" required> -->
                        <input type="date" class="form-control" name="date_act" id="date_act">
                        <div class="invalid-feedback">
                          กรุณากรอก เวลากิจกรรม
                        </div>
                        </div>
                        <br>
                        <label for="validationCustomUsername">รายละเอียด</label>
                          <textarea rows="5" type="text" class="form-control" name="detail_act" required></textarea>
                          <div class="invalid-feedback">
                            กรุณากรอก รายละเอียด
                          </div>
                          <br>
                          <button class="btn btn-primary" type="submit">เพิ่ม</button>
                          <button class="btn btn-primary" type="reset">ยกเลิก</button>
                        </div>
                      </div>
                    </div>

                  </form>   
                  
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>
</html>
