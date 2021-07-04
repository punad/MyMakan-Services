<!-- delete-table.php -->
<?php
	if (isset($_GET['table_id'])) {
		$id =$_GET['table_id'];
		$sql ="DELETE FROM `restaurant_tables` WHERE id = '$id';";
		include_once 'dbCon.php';
		$con = connect();
		if ($con->query($sql) === TRUE) {
		echo '<script>alert("DELETED.")</script>'; 
		echo '<script>window.location ="table-list.php"</script>';
		
	    } else {
			echo "Error: " . $sql . "<br>" . $con->error;
		} 
	}
?>
