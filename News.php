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
                  <a class="active nav-link" href="#">ข่าวประชาสัมพันธ์</a>
                </li>
              </ul>
              <li>
                <?php
include("includes/config.php");  
$sqlCat="SELECT * FROM  nw_news where status_act='1' ";
    $queryCat1=mysqli_query($conn,$sqlCat);
    $Num_Rows1 = mysqli_num_rows($queryCat1);

    $Per_Page1 = 9;   // Per Page
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
    <br><br>
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
            
          </div>
        </div>
      </div>
     <!-- </div> -->
 <!-- footer -->
            <?php
              include("includes/footer.inc.php");
            ?>
</body>

</html>