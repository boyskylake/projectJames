<?php 
   
   $id_stock = $_POST['id_stock'];

			include("../includes/config.php"); 

			for($i=0; $i<COUNT($_POST['id']); $i++){

        if (!empty($_POST['daterev'][$i])) {
            $daterev = $_POST['daterev'][$i];
            echo $daterev;
        }
        if (empty($_POST['daterev'][$i])){
            $daterev = "0000-00-00";
        echo $daterev;

        }
        if (!empty($_POST['date_return'][$i])) {
        $datereturn = $_POST['date_return'][$i];
        echo $datereturn;
        }
        if (empty($_POST['date_return'][$i]))
        {
        $datereturn = "0000-00-00";
        echo $datereturn;
        }
		$status = $_POST['status'][$i];
        $id = $_POST['id'][$i];
                
			      $strSQL = "UPDATE order_detail SET "; 
			      $strSQL .="date_receive = '$daterev',";
			      $strSQL .="date_return = '$datereturn',";
			      $strSQL .="status = '$status'"; 
			      $strSQL .="WHERE id = '".$id."' "; 
					 mysqli_query($conn,$strSQL) or die(mysqli_error($conn));
        }

        
	header("Location:view_order.php?id=".$id_stock."");
 ?>

<!-- <script>
	window.location='view_order.php?id=';
</script> --