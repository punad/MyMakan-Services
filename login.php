<!-- signin.php -->
<?php include 'template/header.php'; ?>
  <body>
    
    <?php include 'template/nav-bar.php'; ?>

    
    <section class="home-slider owl-carousel" style="height: 300px;">
      <div class="slider-item" style="background-image: url('images/nasikerabu.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 30%;">
              <h1 class="mb-3">Makan Sampai Kenyang Noh!</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
       
        </div>
        <div class="row">
          <div class="col-md-12 dish-menu">

            <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class="flaticon-meat"></span> Log Masuk</a>
              
            </div>

            <div class="tab-content py-5" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                    <div class="menus d-flex ftco-animate" style="background: white;">
	                    <div class="row" style="width: 100%">
					        <div class="col-md-12">
					            <form action="" method="POST" enctype="multipart/form-data">
					              <div class="form-group">
					                <input type="email" name="email" class="form-control" required="" placeholder="Email">
					              </div>
					              <div class="form-group">
					                <input type="password" name="password" class="form-control" required="" placeholder="Kata Laluan">
					              </div>
					              <div class="form-group">
					                <input type="submit" value="Log Masuk" name="login" class="btn btn-primary py-3 px-5">
					              </div>
					            </form>
                      <p class="text-center">Belum Mempunyai Akaun? <a href="register.php">Daftar Sekarang</a> </p>
					        </div>
					    </div>
	                </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

 

    <?php include 'template/footer.php'; ?>
    
    <?php include 'template/script.php'; ?>


    
  </body>
</html>



<?php 
  if (isset($_POST['login'])) {
    
  $email = $_POST['email'];
  $password = $_POST['password'];

  

  include 'dbCon.php';
  $con = connect();

  $emailSQL = "SELECT * FROM restaurant_info WHERE email = '$email';";

  $passwordSQL = "SELECT * FROM restaurant_info WHERE email = '$email' And password = '$password';";

  $emailResult = $con->query($emailSQL);

  $passwordResult = $con->query($passwordSQL);

  if ($emailResult->num_rows <= 0) {
    echo '<script>alert("This Email Does Not Exist.")</script>';
    echo '<script>window.location="login.php"</script>';
  }else if ($passwordResult->num_rows <= 0) {
    echo '<script>alert("This Password is Incorrect.")</script>';
    echo '<script>window.location="login.php"</script>';
  }else{

    $_SESSION['isLoggedIn'] = TRUE;

    

     $SQL = "SELECT * FROM restaurant_info WHERE email = '$email' And password = '$password'";

    $result = $con->query($SQL);

    foreach ($result as $r) {
      $_SESSION['id'] = $r['id'];
      $_SESSION['name'] = $r['restaurent_name'];   
      $_SESSION['phone'] = $r['phone'];
      $_SESSION['email'] = $r['email'];
      $_SESSION['password'] = $r['password'];
      $_SESSION['role'] = $r['role'];
    }

    if ($_SESSION['role'] == 1) {
       echo '<script>window.location="dashboard/index.php"</script>';
    }elseif ($_SESSION['role'] == 2) {
      echo '<script>window.location="index.php"</script>';
    } 
    
    
  }

  }
?>