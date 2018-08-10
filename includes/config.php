<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "library_11";

// $servername = "127.0.0.1:53111";
// $username = "azure";
// $password = "6#vWHD_$";
// $database = "localdb";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	@date_default_timezone_set("Asia/Bangkok"); 
@mysqli_query($conn,"SET NAMES UTF8");
	@mysqli_query($conn,"SET character_set_results=utf8"); 
	@mysqli_query($conn,"SET character_set_client=utf8");
	@mysqli_query($conn,"SET character_set_connection=utf8");
$sql = "SET GLOBAL time_zone = '+7:00'";
$query = mysqli_query($conn, $sql);
if ($query) {
		
}
// echo "Connected successfully";
?>