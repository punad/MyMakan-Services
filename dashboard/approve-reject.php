<!-- approve-reject.php -->
<?php 
	session_start();
   include_once 'dbCon.php';
   $con = connect();  
	
	if (isset($_GET['breject_id'])) {
		$id =$_GET['breject_id'];
		$sql ="UPDATE booking_details SET status = 0 WHERE id = '$id';";
		if ($con->query($sql) === TRUE) {
		echo '<script>alert("Telah dibatalkan.")</script>';
		echo '<script>window.location="booking-list.php"</script>';
	    } else {
			echo "Error: " . $sql . "<br>" . $con->error;
		} 
	}

	// approve booking request
	if (isset($_GET['bapprove_id'])) {
		$id =$_GET['bapprove_id'];
		
		$sql ="UPDATE booking_details SET status = 1 WHERE id = '$id';";
		
		$sql2 ="SELECT `id`, `c_id`, (SELECT `restaurent_name` FROM `restaurant_info` WHERE restaurant_info.id= booking_details.c_id) as username,(SELECT `email` FROM `restaurant_info` WHERE restaurant_info.id= booking_details.c_id) as email FROM booking_details WHERE id = '$id';";
		$result= $con->query($sql2);
		foreach ($result as $r ) {
			$cname = $r['username'];
			$email = "syazwanyuznann@gmail.com";
		}
		if ($con->query($sql) === TRUE) {
			include 'mailSender.php'; 
			$mail->Body = '<html><body>
	                Hello '.$cname.' . <br>
					Tempahan anda telah disahkan oleh pemilik restoran. <br>
					Invois disertakan di bawah ini sebagai rujukan. <br>
					Terima Kasih.
	                </body></html>';
					
	            $mail->addAddress($email, "Syazwan Yuznan");
	            if($mail->send()) {
	            	echo  '<script>alert("Tempahan ini telah disahkan. Email telah dihantar kepada pelanggan.")</script>';
	                echo '<script>window.location="booking-list.php"</script>';
	            }else{
	                echo  '<script>alert("Tempahan ini telah disahkan. Email tidak berjaya dihantar kepada pelanggan.")</script>';
	                 echo '<script>window.location="booking-list.php"</script>';
	            } 
		
	    } else {
			echo "Error: " . $sql . "<br>" . $con->error;
		} 
	}
 

?>
 
 