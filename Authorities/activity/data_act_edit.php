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

<?php
include("../includes/config.php");  
$strSQL = "SELECT * FROM nt_act WHERE id_act = '".$_GET["id_act"]."' "; 
$objQuery = mysqli_query($conn,$strSQL); 
$objResult = mysqli_fetch_array($objQuery); 
if(!$objResult) 
{    
echo "Not found"; 
} 
else
{ 
?>
                <div class="container">
                 <form id="form1" name="form1" method="post" enctype="multipart/form-data" class="needs-validation" action="data_act_edit_save.php?id_act=<?php echo $objResult["id_act"];?>" onsubmit="return checkma()" novalidate>
                    <div class="form-row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-7 sm-5">
                        <label for="validationCustom01">ชื่อกิจกรรม</label>
                        <input type="text" class="form-control" name="name_act" value="<?php echo $objResult["name_act"];?>" required>
                        <div class="invalid-feedback">
                          กรุณากรอก ชื่อกิจกรรม
                        </div>
                        <br>
                        <div class="col-sm-4 sm-3">
                        <label for="validationCustom02">เวลากิจกรรม</label>
                        <script language="JavaScript" src="popcalendar.js" type="text/javascript"></script>
                        <input id="timer" readonly="true" type="text" class="form-control" name="date_act" value="<?php echo $objResult["date_act"];?> ">
                          <script language='JavaScript' type="text/javascript"> if (!document.layers) {document.write("<img src='img/cal.gif'  width='16' height='16' alt='ปฏิทิน' onclick='popUpCalendar(this, form1.date_act, \"d mmm yyyy\")'style='font-size:11px border:1px solid #36f;cursor:pointer'>  ")  }  
                          </script>
                        <div class="invalid-feedback">
                          กรุณากรอก เวลากิจกรรม
                        </div>
                        </div>
                        <br>
                        <label for="validationCustomUsername">รายละเอียด</label>
                          <textarea rows="5" type="text" class="form-control" name="detail_act" required value=""><?php echo $objResult["detail_act"];?></textarea>
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

<?php  
}  
mysqli_close($conn);  
?>

<br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>
</html>
