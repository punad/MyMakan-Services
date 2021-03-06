<!-- booking-list.php -->
<?php include 'template/header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
  echo '<script>window.location="login.php"</script>';
}

?>


  <body> 

    
      <?php include 'template/top-bar.php'; ?>
    

      <div class="inner-wrapper">
   
        <?php include 'template/left-bar.php'; ?>
   
        <section role="main" class="content-body">
          <header class="page-header">
            <h2>Kemaskini Profil</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li>
                <li><span>Profil</span></li> 
              </ol>
          
              <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>
   
          <section>
            
                <?php

                include 'dbCon.php';
                $con = connect();
                $res_id = $_SESSION['id']; 

                $sql = "SELECT * FROM `restaurant_info` where id = '$res_id';";
                $result = $con->query($sql);
                $row =  mysqli_fetch_assoc($result);


                if (isset($_POST['save'])) {
               
                  $sql = "UPDATE `restaurant_info` SET `restaurent_name`='".$_POST['fullname']."',`email`='".$_POST['email']."',`phone`='".$_POST['phone']."',`address`='".$_POST['address']."',`location`='".$_POST['area']."',`password`='".$_POST['password']."' WHERE `id`='$res_id'";
                  $cur = $con->query($sql);
                  if ($cur) {
                   
                    echo '<script>alert("Akaun telah dikemaskini.")</script>';
                    echo '<script>window.location="profile.php"</script>';
                  }
                }

                if (isset($_POST['savephoto'])) { 
                    $targetDirectory = "user-image/";
          
                    $file_name = $_FILES['image']['name'];
                  
                    $file_mime_type = $_FILES['image']['type'];
                   
                    $file_size = $_FILES['image']['size'];
                    
                    $file_tmp = $_FILES['image']['tmp_name'];
                 
                    $extension = pathinfo($file_name,PATHINFO_EXTENSION);

                    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
                      move_uploaded_file($file_tmp,$targetDirectory.$file_name);
                        $sql = "UPDATE `restaurant_info` SET `logo`='".$file_name."' WHERE `id`='$res_id'"; 
                        if ($con->query($sql) === TRUE) {
                          echo '<script>alert("Logo has been updated")</script>';
                          echo '<script>window.location="profile.php"</script>';
                        }else {
                              echo "Error: " . $sql . "<br>" . $con->error;
                          }
                      
                    }else{
                      echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
                        echo '<script>window.location="profile.php"</script>';
                    }
                }
                 
                 ?>
<style type="text/css">
.stretch {
    margin-top: 5px;
}
.stretch img{ 
 width: 100%; 
 cursor: pointer;
} 
</style>

  <div class="contanier"> 
    <div class="row">

        <div class="col-lg-3"><!--left col-->
           <div class="panel panel-default">            
            <div class="panel-body"> 
              <div  id="image-container " class="stretch">
                <img title="profile image"  data-target="#logomodal"  data-toggle="modal"      src="<?php echo 'user-image/'.$row['logo']; ?>"  >  
              </div>
             </div>
          <ul class="list-group">
       
         
            
            <li class="list-group-item text-right"><span class="pull-left"><strong></strong></span> 
             <?php echo $row['restaurent_name']; ?> 
             </li>
            
          </ul>   
          </div>
          
        </div> 
        <div class="col-lg-9"> 
    <form class="form-horizontal" method="POST" action="profile.php">  
      <div class="row">    

              <div class="form-group">
                <div class="col-md-7">
                <label class="col-md-4 control-label" for=
                  "Fname">Nama Restoran:</label>

                  <div class="col-md-8">
                   <input type="text" name="fullname" class="form-control" required="" placeholder="Restaurant Name" value="<?php echo $row['restaurent_name'];?>">
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="col-md-7">
                <label class="col-md-4 control-label" for=
                  "Lname">Alamat Emel:</label>

                  <div class="col-md-8"> 
                     <input type="email" name="email" class="form-control" required="" placeholder="Restaurant Email" value="<?php echo $row['email'];?>">
                  </div>
                </div>
              </div> 


              <div class="form-group">
                <div class="col-md-7">
                <label class="col-md-4 control-label" for=
                  "Mname">No. Telefon:</label>

                  <div class="col-md-8"> 
                     <input type="text" name="phone" class="form-control" required="" placeholder="Restaurant Phone" value="<?php echo $row['phone'];?>">
                  </div>
                </div>
              </div> 
              <div class="form-group">
                <div class="col-md-7">
                  <label class="col-md-4 control-label" for=
                  "CustomerAddress">Lokasi:</label>

                  <div class="col-md-8">
                     <select class="form-control " name="area" required="">
                            <option value=""> -Pilih Lokasi Restoran- </option>
                            <?php   
                              $sql = "SELECT * FROM `locations`;";
                              $result = $con->query($sql);
                              foreach ($result as $r) {

                                if ($row['location']==$r['id']) {
                                   echo  '<option SELECTED value="'.$r['id'].'">'.$r['location_name'].'</option>';
                                }else{
                                     echo  '<option value="'.$r['id'].'">'.$r['location_name'].'</option>';
                                } 
                          } ?>
                         </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="col-md-7">
                  <label class="col-md-4 control-label" for=
                  "Gender">Alamat:</label>

                  <div class="col-md-8"> 

                     <textarea name="address" id="" cols="30" rows="2" class="form-control" placeholder="Restaurant Address"><?php echo $row['address'];?></textarea>
                  </div>
                </div>
              </div> 
 

               <div class="form-group">
                <div class="col-md-7">
                  <label class="col-md-4 control-label" for=
                  "CustomerContact">Kata Laluan:</label>

                  <div class="col-md-8">
                     <input type="password" name="password" class="form-control" required="" placeholder="Password" value="<?php echo $row['password'];?>">
                  </div>
                </div>
              </div>   

             <div class="form-group">
                <div class="col-md-7">
                  <label class="col-md-4 control-label" for=
                  "CustomerContact"></label>

                  <div class="col-md-8">
                         <input type="submit" value="Simpan" name="save" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </div> 

        
          </div>  
           </form>  
           
        </div>
    </div>
  </div>
          </section>
                 
           
            
            

        </section>
      </div>

      <?php include 'template/right-bar.php'; ?>  

    <?php include 'template/script-res.php'; ?>
  </body>
</html>



<div class="modal fade" id="logomodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">x</button>

                                     <h4 class="modal-title" id="myModalLabel">Kemaskini Gambar Profil</h4>
                                </div>

                                <form action="profile.php" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8"> 
                                                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                                                              <input name="MAX_FILE_SIZE" type="hidden" 
                                                              value="1000000"> 
                                                              <input id="image" name="image" type="file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Tutup</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Muatnaik Gambar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>