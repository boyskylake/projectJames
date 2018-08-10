<?php 
  if(!isset($_SESSION['unm']))
  {
    echo "<br><br><h1 align='center'>Please Login!</h1>";
    exit();
  }

  if($_SESSION['status'] != "staff")
  {
    echo "<br><br><h1 align='center'>This page for Staff only!</h1>";
    exit();
  } 

?>

