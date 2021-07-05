<!-- manage-insert.php -->
<?php 
session_start();
include_once 'dbCon.php';
$con = connect();
	if (isset($_POST['regascus'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $role = 2;

        

        // existing email check
        $checkSQL = "SELECT * FROM `restaurant_info` WHERE email = '$email';";
        $checkresult = $con->query($checkSQL);
        if ($checkresult->num_rows > 0) {
        	echo '<script>alert("Emel ini telah berdaftar.")</script>';
        	echo '<script>window.location="register.php"</script>';
        }else{

	        	if (isset($_FILES['image'])) {
				 
				    $targetDirectory = "dashboard/user-image/";
				    
				    $file_name = $_FILES['image']['name'];
				    
				    $file_mime_type = $_FILES['image']['type'];
				    
				    $file_size = $_FILES['image']['size'];
				    
				    $file_tmp = $_FILES['image']['tmp_name'];
				    
				    $extension = pathinfo($file_name,PATHINFO_EXTENSION);

				    //register as customer
				    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
				    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);
				    	$iquery="INSERT INTO `restaurant_info`(`restaurent_name`, `email`, `phone`, `logo`, `password`, `role`) 
			        		VALUES ('$fullname','$email','$phone','$address','$file_name','$password','$role');";
			        	if ($con->query($iquery) === TRUE) {
			        		echo '<script>alert("Pendaftaran anda telah berjaya")</script>';
			        		echo '<script>window.location="login.php"</script>';
			        	}else {
			                echo "Error: " . $iquery . "<br>" . $con->error;
			            }
				    	
				    }else{
				    	echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
		        		echo '<script>window.location="register.php"</script>';
				    }
				}else{
					$file_name = "";

					$iquery="INSERT INTO `restaurant_info`(`restaurent_name`, `email`, `phone`, `address`, `logo`, `password`, `role`) 
			        		VALUES ('$fullname','$email','$phone','$address','$file_name','$password','$role');";
		        	if ($con->query($iquery) === TRUE) {
		        		echo '<script>alert("Pendaftaran anda telah berjaya")</script>';
		        		echo '<script>window.location="register.php"</script>';
		        	}else {
		                echo "Error: " . $iquery . "<br>" . $con->error;
		            }
				}
        }
    }

	//register as restaurant
	if (isset($_POST['regasres'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $area = $_POST['area'];
        $password = $_POST['password'];
        $role = 1;

        

        $checkSQL = "SELECT * FROM `restaurant_info` WHERE email = '$email';";
        $checkresult = $con->query($checkSQL);
        if ($checkresult->num_rows > 0) {
        	echo '<script>alert("Emel ini telah digunakan.")</script>';
        	echo '<script>window.location="register.php"</script>';
        }else{

	        	if (isset($_FILES['image'])) {
				 
				    $targetDirectory = "dashboard/user-image/";
				    
				    $file_name = $_FILES['image']['name'];
				    
				    $file_mime_type = $_FILES['image']['type'];
				    
				    $file_size = $_FILES['image']['size'];
				    
				    $file_tmp = $_FILES['image']['tmp_name'];
				   
				    $extension = pathinfo($file_name,PATHINFO_EXTENSION);

				    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
				    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);
				    	$iquery="INSERT INTO `restaurant_info`(`restaurent_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `role`) 
			        		VALUES ('$fullname','$email','$phone', '$address','$area','$file_name','$password','$role');";
			        	if ($con->query($iquery) === TRUE) {


			        			echo '<script>alert("Pendafaran restoran anda telah berjaya.")</script>';
			        				echo '<script>window.location="login.php"</script>';

			
			        	}else {
			                echo "Error: " . $iquery . "<br>" . $con->error;
			            }
				    	
				    }else{
				    	echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
		        		echo '<script>window.location="register.php"</script>';
				    }
				}else{
					$file_name = "";

					$iquery="INSERT INTO `restaurant_info`( `restaurent_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `role`) 
		        		VALUES ('$fullname','$email','$phone', '$address','$area', '$file_name','$password','$role');";
		        	if ($con->query($iquery) === TRUE) {
		        		echo '<script>alert("Pendafaran restoran anda telah berjaya.")</script>';
		        		echo '<script>window.location="login.php"</script>';
		        	}else {
		                echo "Error: " . $iquery . "<br>" . $con->error;
		            }
				}
        }
    }



    
    if (isset($_POST['book'])) {

    	$bdinsert = false;
    	$u_id = $_SESSION['id'];
    	$res_id = $_POST['res_id'];
  		$reservation_name = $_POST['reservation_name'];
		$reservation_phone = $_POST['reservation_phone'];
		$reservation_date = $_POST['reservation_date'];
		$reservation_time = $_POST['reservation_time'];
		$total_price = $_POST['total_price'];
		

		date_default_timezone_set("Asia/Kuala_Lumpur");
         $make_time =date("h:i:sa");
         $make_date =date("Y-m-d");
		$booking_id= uniqid();

		$iquery="INSERT INTO `booking_details`(`booking_id`,`res_id`,`c_id`,`make_date`, `make_time`, `name`, `phone`, `booking_date`, `booking_time`, `bill`) 
		    VALUES ('$booking_id','$res_id','$u_id','$make_date','$make_time','$reservation_name','$reservation_phone','$reservation_date','$reservation_time','$total_price');";
		if ($con->query($iquery) === TRUE) {
			$bdinsert = true;
		}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }

        $cinsert = false;
        if ($bdinsert == true) {
        	for($q = 0; $q < count($_POST["chair"]); $q++){
                $c_id = $_POST['chair'][$q]; 
                $chair_no = ""; 
                $sql5 = "SELECT * FROM `restaurant_chair` WHERE id = '$c_id';";
                $result5 = $con->query($sql5);
                foreach ($result5 as $r5) {
                	$chair_no = $r5['chair_no'];
                }
                $ciQuery = "INSERT INTO `booking_chair`(`booking_id`, `chair_id`, `chair_no`) 
                		VALUES ('$booking_id','$c_id','$chair_no');";
                if ($con->query($ciQuery) === TRUE) {
					$cinsert = true;
				}else {
		            echo "Error: " . $ciQuery . "<br>" . $con->error;
		        }
            }
        }

        $iinsert = false;
        if ($cinsert == true) {
        	for($i = 0; $i < count($_POST["item"]); $i++){
                $i_id = $_POST['item'][$i];
                $qty = $_POST['qty'][$i];
                $itmQuery = "INSERT INTO `booking_menus`(`booking_id`, `item_id`, `qty`) 
                		VALUES ('$booking_id','$i_id','$qty');";
                if ($con->query($itmQuery) === TRUE) {
					$iinsert = true;
				}else {
		            echo "Error: " . $itmQuery . "<br>" . $con->error;
		        }
            }
        }

       if ($bdinsert == true && $cinsert == true && $iinsert == true) {
    		echo '<script>alert("Tempahan anda berjaya. Anda akan mendapat emel sebentar lagi. Terima kasih")</script>';
    		echo '<script>window.location="index.php"</script>';
    	}else {
    		echo "Error: " . $iquery . "<br>" . $con->error;
    		echo "Error: " . $ciQuery . "<br>" . $con->error;
            echo "Error: " . $iquery . "<br>" . $con->error;
        } 
    }		
?>