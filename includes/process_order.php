<?php 
	session_start();

	require_once 'config.php';

	$date = date("Y-m-d");
	$username = $_SESSION['unm'];
	$name = $_SESSION['name'];
	$id_mam = $_SESSION['uid'];
	$num = COUNT($_POST['bookid']);

	if (isset($_POST['bookid'])) {

		$sqlstock = "INSERT INTO `order_stock`(`username`, `id_user`, `amount`, `Date`) VALUES ('$username','$id_mam','$num','$date')";
        mysqli_query($conn,$sqlstock) or die("wrong query");
        $last_id = mysqli_insert_id($conn);
	}

	for($i=0; $i<COUNT($_POST['bookid']); $i++)
	{

		$idbook =  $_POST['bookid'][$i];

		 $q = "select * from book where book_id = '".$idbook."' ";
         $res = mysqli_query($conn,$q) or die("wrong query");
         $result = mysqli_fetch_array($res);

          $res1 = $result['book_BooksCode'];
          $res2 = $result['book_ISBN'];
          $res3 = $result['book_BookName'];
          $res4 = $result['book_Library'];
         
         // echo $res1;
        $q2 = "INSERT INTO `order_detail` (`id_stock`, `name`, `b_codes`, `b_isbn`, `b_name`,  `b_library`) 
        VALUES ('$last_id','$name','$res1','$res2','$res3','$res4')";

         mysqli_query($conn,$q2) or die("wrong query".mysqli_error($conn));
	}
	unset($_SESSION['Book']);

?>

<script>
	window.location='../Order.php';
</script>