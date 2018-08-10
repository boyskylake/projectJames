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
              <li class="nav-item">
                <a href="#" class="active nav-link">กระดานสนทนา</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="NewQuestion.php">* ตั้งกระทู้ใหม่</a>
              </li>
            </ul>
            <?php
            
                include 'includes/config.php';
                $strSQL = "SELECT * FROM webboard";
                $objQuery = mysqli_query($conn, $strSQL) or die ("Error Query [".$strSQL."]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $Per_Page = 10;   // Per Page
                
                if (isset($_GET["Page"])) {
                  $Page = $_GET["Page"];
                }
                if(!isset($Page))
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

                $strSQL .=" order  by QuestionID DESC LIMIT $Page_Start , $Per_Page";
                $objQuery  = mysqli_query($conn,$strSQL);
              
              
             ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ที่</th>
                    <th scope="col" width="458">ชื่อกระทู้</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">เวลา</th>
                    <th scope="col">ดู</th>
                    <th scope="col">ตอบ</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    while($objResult = mysqli_fetch_assoc($objQuery))
                     {
                    ?>
                  <tr>
                  <td><?php echo $objResult["QuestionID"];?></td>
                  <td><a href="ViewWebboard.php?QuestionID=<?php echo $objResult['QuestionID']; ?>"><?php echo $objResult["Question"]; ?></a></td>
                  <td><?php echo $objResult["Name"];?></td>
                  <td><div align="center"><?php echo $objResult["CreateDate"];?></div></td>
                  <td align="right"><?php echo $objResult["View"];?></td>
                  <td align="right"><?php echo $objResult["Reply"];?></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
              <br>
                  Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
                  <?php
                  if($Prev_Page)
                  {
                    echo " <a href=' ".$_SERVER['SCRIPT_NAME']."?Page=".$Prev_Page." '><< Back</a> ";
                  }

                  for($i=1; $i<=$Num_Pages; $i++){
                    if($i != $Page)
                    {
                      echo "[ <a href='".$_SERVER['SCRIPT_NAME']."?Page=".$i."'>$i</a> ]";
                    }
                    else
                    {
                      echo "<b> ".$i." </b>";
                    }
                  }
                  if($Page!=$Num_Pages)
                  {
                    echo " <a href ='".$_SERVER['SCRIPT_NAME']."?Page=".$Next_Page."'>Next>></a> ";
                  }
                  mysqli_close($conn);
                  ?>

          </div>
        </div>
      </div>
    <!-- </div> -->
    <?php
              include("includes/footer.inc.php");
            ?>
</body>
</html>