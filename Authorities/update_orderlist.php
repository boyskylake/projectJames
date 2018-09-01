<?php 
			include("includes/config.php"); 

			for($i=0; $i<COUNT($_POST['id']); $i++){
		$status = $_POST['status'][$i];
		$id = $_POST['id'][$i];

		// echo $status;
		// echo $id;
			
			      $strSQL = "UPDATE order_stock SET "; 
			      $strSQL .="status = '$status'"; 
			      $strSQL .="WHERE id_stock = '$id'";

				  mysqli_query($conn,$strSQL) or die(mysqli_error($conn));
		}  
		// header('Location:ABookList.php');
 ?>
 <script>
	window.location='ABookList.php';
</script>