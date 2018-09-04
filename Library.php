<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
            <li class="nav-item">
              <p class="active nav-link">สืบค้นทรัพยากรสารสนเทศห้องสมุด</p>
            </li>
            <ul class="nav nav-pills flex-column">
              <div class="row">
                  <div align="center">
                    <form name="searchform" id="searchform">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td width="233" valign="top" style="text-align: right;">&nbsp;
                            <span style="text-align: -webkit-right;">พิมพ์คำสืบค้น</span>
                          </td>
                          <td width="366" valign="top" align="left" style="" colspan="2">&nbsp;เลือกประเภทการสืบค้น</td>
                        </tr>
                        <tr>
                          <td width="233" align="right" >
                            <input class="form-control" type="text" name="itemname" id="itemname" placeholder="ข้อความ คำค้นหา!"> 
                          </td>
                          <td width="50" align="left">
                            <select class="form-control" name="booksearch" id="booksearch">
                              <option value="1">ชื่อเรื่อง </option>
                              <option value="2">ผู้แต่ง </option>
                              <option value="3">หัวเรื่อง </option>
                              <option value="4">สำนักพิมพ์ </option>
                              <option value="5">เลขเรียกหนังสือ </option>
                              <option value="6">ชื่อเรื่องวารสาร </option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="233" align="right" style="">
                            <input class="btn btn-outline-primary" type="button" value="เริ่มสืบค้น" name="btnSearch" id="btnSearch"> </td>
                          <td width="366" align="left" style="" colspan="2">
                            <input class="btn btn-outline-primary" type="reset" value="ยกเลิก" name="reset"> </td>
                        </tr>
                      </tbody>
                    </table>
                    </form>
                  </div>
                </div>
              </ul>
              <div class="loading"></div>
              <div class="col-md-9" id="list-data"></div>
            
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
         $(function () {
         $("#btnSearch").click(function () {
         $.ajax({
         url: "book_search.php",
         type: "post",
         data: {itemname: $("#itemname").val(),
                booksearch: $("#booksearch").val()},
         beforeSend: function () {
         $(".loading").show();
         },
         complete: function () {
         $(".loading").hide();
         },
         success: function (data) {
         $("#list-data").html(data);
         }
         });
         });
         $("#searchform").on("keyup keypress",function(e){
         var code = e.keycode || e.which;
         if(code==13){
         $("#btnSearch").click();
         return false;
         }
         });
         });
        </script>

              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <p class="active nav-link">ข่าวประชาสัมพัมพันธ์ งานบริการสารสนเทศ</p>
                </li>
                <li>
<?php
  include("includes/config.php");  
  $sqlCat="SELECT * FROM  nw_news where status_act='1' ";
      $queryCat1=mysqli_query($conn,$sqlCat);
      $Num_Rows1 = mysqli_num_rows($queryCat1);

      $Per_Page1 = 3;   // Per Page
      if (isset($_GET["Page1"])) {
        $Page1 = $_GET["Page1"];
      }

      if(!isset($_GET["Page1"]))
      {
        $Page1 = 1;
      }

      $Prev_Page1 = $Page1 - 1;
      $Next_Page1 = $Page1 + 1;

      $Page_Start1 = (($Per_Page1*$Page1)-$Per_Page1);
      if($Num_Rows1<=$Per_Page1)
      {
        $Num_Pages1 =1;
      }
      else if(($Num_Rows1 % $Per_Page1)==0)
      {
        $Num_Pages1 =($Num_Rows1/$Per_Page1) ;
      }
      else
      {
        $Num_Pages1 =($Num_Rows1/$Per_Page1)+1;
        $Num_Pages1 = (int)$Num_Pages1;
      }

      $sqlCat.=" order  by id_act desc LIMIT $Page_Start1 , $Per_Page1";
      $queryCat1  = mysqli_query($conn,$sqlCat);


      echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
      $intRows1 = 0;
      while($resutCat=mysqli_fetch_array($queryCat1))
      {
        echo "<td>"; 
        $intRows1++;
?>

      <table cellspacing="10" cellpadding="5" width="100%">
          <tbody>
            <tr>
              <td height="255" valign="top">
              <table width="126" height="100" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><img src="Authorities/news/myphoto/<?php
                      $strSQL = "SELECT * FROM nw_photo where id_photo= ".$resutCat['id_photo']." ";
                      $objQuery = mysqli_query($conn,$strSQL);
                      $objResult = mysqli_fetch_array($objQuery); 
                      if($objResult['id_act'] == $resutCat['id_act'])
                      {
                      echo $objResult['name_photo'];
                      }
                      else
                      {
                      echo"empty.gif";
                      }
                      ?>" width="195" height="123" border="0"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
                  <br />
                  <b>
                  <font size="2">
                    <?php echo $resutCat["name_act"];?>
                    </font></b><br />

                  <font color="#999999" size="2">
                  Update :<?php echo $resutCat["date_act"];?>
                </font><br />
                  <font size="2">
                    <?php echo  $message = substr($resutCat['detail_act'],0,40)."&nbsp;..."; ?>
                  </font><br />
                  <font  size="2"><a href="view_news.php?id_act=<?php echo $resutCat["id_act"];?>"  title="ดูรายละเอียด" >ดูรายละเอียด...</a></font> </td>
            </tr>
          </tbody>
        </table>
        <?php
        echo"</td>";
      if(($intRows1)%3==0)
      {
        echo"</tr>";
      }
    }
    echo"</tr></table>";
    ?>
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="99%" valign="top" align="center">
    <?php
    if($Prev_Page1)
    {
      echo "";
      echo " <a href='$_SERVER[SCRIPT_NAME]?Page1=$Prev_Page1' title='กลับ'><< Back</a> ";
    }

    for($i1=1; $i1<=$Num_Pages1; $i1++){
      if($i1 != $Page1)
      {
          echo "";
        echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page1=$i1' >$i1</a> ]";
      }
      else
      {
          echo "";
        echo "<b> $i1 </b>";
      }
    }
    if($Page1!=$Num_Pages1)
    {
      echo "";
      echo " <a href ='$_SERVER[SCRIPT_NAME]?Page1=$Next_Page1' title='ถัดไป'>Next>></a> ";
    }
    ?>
        </td>
      </tr>
    </table>

    </li>
    </ul>

              <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <p class="active nav-link">กิจกรรม งานบริการสารสนเทศ</p>
              </li>
              <li>
                <?php
include("includes/config.php");  
$sqlCat="SELECT * FROM  nt_act where status_act='1' ";
    $queryCat=mysqli_query($conn,$sqlCat);
    $Num_Rows = mysqli_num_rows($queryCat);

    $Per_Page = 3;   // Per Page
    if (isset($_GET["Page"])) {
      $Page = $_GET["Page"];
    }

    if(!isset($_GET["Page"]))
    {
      $Page=1;
    }

    $Prev_Page = $Page-1;
    $Next_Page = $Page+1;

    $Page_Start = (($Per_Page*$Page)-$Per_Page);
    if($Num_Rows<=$Per_Page)
    {
      $Num_Pages =1;
    }
    else if(($Num_Rows % $Per_Page)==0)
    {
      $Num_Pages =($Num_Rows/$Per_Page) ;
    }
    else
    {
      $Num_Pages =($Num_Rows/$Per_Page)+1;
      $Num_Pages = (int)$Num_Pages;
    }

    $sqlCat.=" order  by id_act desc LIMIT $Page_Start , $Per_Page";
    $queryCat  = mysqli_query($conn,$sqlCat);


    echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
    $intRows = 0;
    while($resutCat=mysqli_fetch_array($queryCat))
    {
      echo "<td>"; 
      $intRows++;
?>

      <table cellspacing="10" cellpadding="5" width="100%">
          <tbody>
            <tr>
              <td height="255" valign="top">
              <table width="126" height="100" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><img src="Authorities/activity/myphoto/<?php   
                      $strSQL = "SELECT * FROM nt_photo where id_photo= ".$resutCat['id_photo']." ";
                      $objQuery = mysqli_query($conn,$strSQL);
                      $objResult = mysqli_fetch_array($objQuery); 
                      if($objResult['id_act'] == $resutCat['id_act'])
                      {
                      echo $objResult['name_photo'];
                      }
                      else
                      {
                      echo"empty.gif";
                      }
                      ?>" width="195" height="123" border="0"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
                  <br />
                  <b>
                  <font size="2">
                    <?php echo $resutCat["name_act"];?>
                    </font></b><br />

                  <font color="#999999" size="2">
                  Update :<?php echo $resutCat["date_act"];?>
                </font><br />
                  <font size="2">
                    <?php echo  $message = substr($resutCat['detail_act'],0,40)."&nbsp;..."; ?>
                  </font><br />
                  <font  size="2"><a href="view_activity.php?id_act=<?php echo $resutCat["id_act"];?>"  title="ดูรายละเอียด" >ดูรายละเอียด...</a></font> </td>
            </tr>
          </tbody>
        </table>
        <?php
        echo"</td>";
      if(($intRows)%3==0)
      {
        echo"</tr>";
      }
    }
    echo"</tr></table>";
    ?>
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="99%" valign="top" align="center">
    <?php
    if($Prev_Page)
    {
      echo "";
      echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page' title='กลับ'><< Back</a> ";
    }

    for($i=1; $i<=$Num_Pages; $i++){
      if($i != $Page)
      {
          echo "";
        echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i' >$i</a> ]";
      }
      else
      {
          echo "";
        echo "<b> หน้า $i </b>";
      }
    }
    if($Page!=$Num_Pages)
    {
      echo "";
      echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page' title='ถัดไป'>Next>></a> ";
    }
    ?>
        </td>
      </tr>
    </table>

    </li>
    </ul>
              
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <p class="active nav-link">เวลาทำการสำนักวิทยบริการแล้วเทคโนโลยีสารสนเทศ</p>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Item</a>
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
 <!-- footer -->
           <br>
           <br>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <div class="container">
    <div class="text-center bg-primary text-white py">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="display-4">Library</h1>
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
    
  </div>
</body>

</html>