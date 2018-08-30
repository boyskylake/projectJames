<?php 
   $id_stock = $_POST['id_stock'];

			include("../includes/config.php"); 

			for($i=0; $i<COUNT($_POST['id']); $i++){

		$daterev = $_POST['daterev'][$i];
		$datereturn = $_POST['datereturn'][$i];
		$status = $_POST['status'][$i];
		$id = $_POST['id'][$i];
			
			      $strSQL = "UPDATE order_detail SET "; 
			      $strSQL .="date_receive = '$daterev',";
			      $strSQL .="date_return = '$datereturn',";
			      $strSQL .="status = '$status'"; 
			      $strSQL .="WHERE id = '".$id."' "; 
					 mysqli_query($conn,$strSQL) or die(mysqli_error());
		}  
		header('Location:view_order.php?id='.$id_stock.'');
 ?>

<!-- <script>
	window.location='view_order.php?id=';
</script> -->