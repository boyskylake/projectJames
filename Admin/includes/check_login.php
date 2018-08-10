<?php 
  if(!isset($_SESSION['unm']))
  {
    echo "<br><br><h1 align='center'>Please Login!</h1>";
    exit();
  }

  if($_SESSION['status'] != "admin")
  {
    echo "<br><br><h1 align='center'>This page for Admin only!</h1>";
    exit();
  } 

?>

