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
     
    <script language="javascript">
  function fncCreateElement(){
    
     var mySpan = document.getElementById('mySpan');
    
    var myElement1 = document.createElement('input');
    myElement1.setAttribute('type',"file");
    myElement1.setAttribute('name',"filUpload[]");
    myElement1.setAttribute('size',"40");
    mySpan.appendChild(myElement1);    

    //*** Remove Element ***//
    /*
    var deleteEle = document.getElementById('txt1');
    mySpan.removeChild(deleteEle);
    */

     var myElement2 = document.createElement('<br>');
     mySpan.appendChild(myElement2);
  }
</script>

         <form id="form1" name="form1" method="post" action="photo_save.php" enctype="multipart/form-data" onsubmit="return checkma()">
           
           <img src="images/photo.PNG" width="19" height="16" /> <span class="style21"> ADD</span>
           <br><br>
           <table width="70%"   border="0" cellpadding="1" cellspacing="0">
             <tr>
               <td>
              <table>
                   <tr>
                     <td>&nbsp;</td>
                     <td>
     <?php
       include("../includes/config.php");
       $id_act = $_GET['id_act'];
       $strSQL = "SELECT * FROM nt_act where id_act = ".$id_act." ";
       $objQuery = mysqli_query($conn,$strSQL);
       $objResult = mysqli_fetch_array($objQuery);
       echo $objResult['name_act'];
      //  echo $id_act;
     ?>
     <br>
  <input type="hidden" value="<?php echo $objResult['id_act'];?>" name="id_act" id="id_act" />
  <br>
                      </td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><input name="filUpload[]" type="file"  size="40" />
                                <input name="btnButton" id="btnButton" type="button" value="+" onclick="JavaScript:fncCreateElement();"/>	
                              <br><span id="mySpan"></span></td>
                            </tr>
                            <tr>
                              <td width="2%">&nbsp;</td>
                              <td width="98%">
                                <input name="submit" type="submit" id="submit" value="OK"/>
                              </td>
                            </tr>
                          </table>
                       </td>
                      </tr>
                    </table>
                    </form>

</div>
</div>
</div>

<br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>
</html>
