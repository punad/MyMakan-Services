<!-- restaurant-list.php -->

<?php 
if (isset($_POST['find'])) {
  $area_id = $_POST['area'];

                        include 'dbCon.php';
  include 'template/header.php'; ?>
  <body>
    
   <?php include 'template/nav-bar.php'; ?>
    
    
    <section class="home-slider owl-carousel"style="height: 300px;" >
      <div class="slider-item" style="background-image: url('images/nasikerabu.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 col-sm-12 ftco-animate text-center" >
              <h1 class="mb-3"></h1>
            </div>
          </div>
        </div>
      </div>


    </section>



    

    <section class="ftco-section bg-light">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12 dish-menu">

            <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class="flaticon-meat"></span> Pilihan Restoran</a>
            </div>

            <div class="tab-content py-5" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                  <?php  
                    $con = connect();
                    $sql = "SELECT * FROM `restaurant_info` WHERE location = '$area_id';";
                    $result = $con->query($sql);
                    foreach ($result as $r) {
                  ?>
                  <div class="col-lg-12">
                    <div class="menus d-flex ftco-animate">
                      <div class="menu-img" style="background-image: url(dashboard/user-image/<?php echo $r['logo']; ?>)"></div>
                      <div class="text d-flex">
                        <div class="row one-half">
                        	<div class="col-lg-12">
                          	<h3><?php echo $r['restaurent_name']; ?></h3>
                      		</div>
                          <div class="col-lg-12">
                            <p><?php echo $r['address']; ?></p>
                          </div>
                        </div>
                        <div class="one-third">
                        	<a href="reservation.php?res_id=<?php echo $r['id']; ?>" class="btn btn-info" style="width: 100%;margin-left: 23px;margin-top: 18px;">Tempah Sekarang</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
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
  }else{

  }
 ?>