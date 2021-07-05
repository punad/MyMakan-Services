<!-- index.php -->
<?php include 'template/header.php'; ?>
  <body>
    
    <?php include 'template/nav-bar.php'; ?>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel"style="height: 400px;">
      <div class="slider-item" style="background-image: url('images/nasikerabu.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-10 col-sm-12 ftco-animate"style="padding-bottom: 30%;">
              <h1 class="mb-3">Hampa Dok Tunggu Apa Lagi?</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url('images/nasiayam.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-10 col-sm-12 ftco-animate"style="padding-bottom: 30%;">
              <h1 class="mb-3">Mai La Buat Tempahan Lekaih!</h1> 
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url('images/nasidagang.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-10 col-sm-12 ftco-animate"style="padding-bottom: 30%;">
              <h1 class="mb-3">Jangan Kalut-Kalut</h1> 
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END slider -->

    <div class="ftco-section-reservation">
      <div class="container">
        <div class="row">
          <div class="col-md-12 reservation pt-5 px-5">
              <p style="font-size: 25px; color: #000;font-weight: bold;margin-top: -30px">Tempah Sekarang</p>
            <div class="block-17" style="min-height: 80px;">
              
              <form action="restaurant-list.php" method="POST" class="d-block d-lg-flex">
                <div class="fields d-block d-lg-flex">
                  <p style="font-size: 20px;color: #000">Negeri</p>
                  <div class="select-wrap one-half">
                    <div class="icon"> <!-- <span class="ion-ios-arrow-down" -->
					</span></div>
                    <select name="city" id="" class="form-control" disabled="">
                      <option value="Malaysia">Kedah</option>
                    </select>
                  </div>
                    <p style="font-size: 20px;color: #000">Lokasi</p>
                  <div class="select-wrap one-half">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select data-plugin-selectTwo class="form-control populate" name="area" required=""  style="cursor: pointer;">
                      <option value=""> -Daerah- </option>
                      <?php 
                        include 'dbCon.php';
                        $con = connect();
                        $sql = "SELECT * FROM `locations`;";
                        $result = $con->query($sql);
                        foreach ($result as $r) {
                      ?>
                        <option value="<?php echo $r['id']; ?>"><?php echo $r['location_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <input type="submit" class="search-submit btn btn-primary" name="find" value="Cari">  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php include 'template/font-menu.php'; ?>  
    <section class="ftco-section bg-light">
      <div class="container special-dish"> 
           
            <h3 style="text-align: center;">Apakah itu MyMakan Services?</h3> 
 <h6 style="text-align: center;">MyMakan Services membantu pemilik restoran di sekitar kedah dengan menyediakan perkhidmatan membuat tempahan meja 
								dan makanan dengan cara yang tepat dan pantas. Perkhidmatan kami juga dapat membantu pemilik restoran
								memperbaiki kos pekerja dan sebagainya. Hal ini pasti membuatkan pemilik restoran selesa dan mampu menyediakan 
								perkhidmatan yang baik kepada pelanggan.</h6>
      </div>
	  
	 
    </section>
  
  <?php include 'template/footer.php'; ?>
  
  <?php include 'template/script.php'; ?>
  
  <script src="dashboard/assets/vendor/jquery/jquery.js"></script>
  <script src="dashboard/assets/vendor/select2/select2.js"></script>
  <script src="dashboard/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    
  </body>
</html>