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
              </ul>
<?php
  include("includes/config.php");  
    $sql = "SELECT * FROM  personnel";
      $query = mysqli_query($conn,$sql);
      $Num_Rows = mysqli_num_rows($query);

      $Per_Page = 9;   // Per Page
      if (isset($_GET["Page"])) {
        $Page = $_GET["Page"];
      }

      if(!isset($_GET["Page"]))
      {
        $Page = 1;
      }

      $Prev_Page = $Page - 1;
      $Next_Page = $Page + 1;

      $Page_Start = (($Per_Page*$Page)-$Per_Page);
      if($Num_Rows<=$Per_Page)
      {
        $Num_Pages = 1;
      }
      else if(($Num_Rows % $Per_Page)==0)
      {
        $Num_Pages = ($Num_Rows/$Per_Page) ;
      }
      else
      {
        $Num_Pages = ($Num_Rows/$Per_Page)+1;
        $Num_Pages = (int)$Num_Pages;
      }

      $sql.=" order  by personnel_id desc LIMIT $Page_Start , $Per_Page";
      $query1  = mysqli_query($conn,$sql);


      echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
      $intRows1 = 0;
      while($resut = mysqli_fetch_array($query1))
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
                    <td><img src="../img/<?php  echo $resut['personnel_form'];
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
                    <?php echo $resut['personnel_library']; ?>
                    </font></b><br />

                  <font size="2">
                  ชื่อ :<?php echo $resut['personnel_name']; ?>
                </font><br />

                <font size="2">
                  ตำแหน่ง :<?php echo $resut['personnel_position']; ?>
                </font><br />

                <font size="2">
                  เบอร์โทร :<?php echo $resut['personnel_telephone']; ?>
                </font><br />

                <!--   <font size="2">
                    <?php echo  $message = substr($resut['personnel_form'],0,40)."&nbsp;..."; ?>
                  </font><br />
                  <font  size="2"><a href="view_news.php?id_act=<?php echo $resutCat["id_act"];?>"  title="ดูรายละเอียด" >ดูรายละเอียด...</a></font>  -->
                </td>
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
    <br><br>
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="99%" valign="top" align="center">
    <?php
    if($Prev_Page)
    {
      echo "";
      echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page' title='กลับ'><< Back</a> ";
    }

    for($i1=1; $i1<=$Num_Pages; $i1++){
      if($i1 != $Page)
      {
          echo "";
        echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i1' >$i1</a> ]";
      }
      else
      {
          echo "";
        echo "<b> หน้า $i1 </b>";
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