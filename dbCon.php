
<?php 
function connect($flag=TRUE){
	
	$servername = "remotemysql.com";
	$username = "hi1dabo0mb";
	$password = "gXtBPWw0AJ";
	$dbName = "hi1dabo0mb";
	
	//$servername = "localhost";
	//$username = "root";
	//$password = "";
	//$dbName = "res_booking";

	if($flag){
		$conn = new mysqli($servername, $username, $password, $dbName);
	}else{
		$conn = new mysqli($servername, $username, $password);
	}
	if ($conn->connect_error) {
		die("Connection failed: $conn->connect_error");
	}
	return $conn;
}
?>