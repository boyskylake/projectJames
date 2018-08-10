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
              <p class="active nav-link">ข่าวประชาสัมพันธ์</p>
            </li>
          </ul>
  
  <?php
include("../includes/config.php");   

$strSQL = "UPDATE nw_news SET "; 
$strSQL .="id_photo = '".$_GET["id_photo"]."' "; 
$strSQL .="WHERE id_act = '".$_GET["id_act"]."' "; 
$objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());

if($objQuery) 
{
echo "<table>
        <tr>
        <td background='../../images/end.png'>&nbsp;&nbsp;&nbsp;&nbsp; <span class='style17'>&nbsp;&nbsp;ตั้งค่าเรียบร้อย</span>
		</td>
        </tr>
        </table>";
echo "<meta http-equiv=refresh content=2;URL=data_news.php>";
} 
else
{     
echo "Error Save [".$strSQL."]"; 
} 
mysqli_close($conn); 
?>
        

        </div>
      </div>
    </div>

    <br><br>
  <?php include '../includes/footer.inc.php'; ?>
</body>
</html>
