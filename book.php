<!-- select-menu.php -->
<?php 
if (isset($_POST['confirm'])) {
  include 'dbCon.php';
   $con = connect();

  $res_id = $_POST['res_id'];
  $reservation_name = $_POST['reservation_name'];
  $reservation_phone = $_POST['reservation_phone'];
  $reservation_date = $_POST['reservation_date'];
  $reservation_time = $_POST['reservation_time'];

  $bkashnumber = '';
  $Rinsql = "SELECT * from restaurant_info WHERE id = '$res_id';";
  $Rinresult = $con->query($Rinsql);
  foreach ($Rinresult as $rri) {
    $bkashnumber = $rri['bkashnumber'];
  }

  $table = $_POST["table"];
  $chair = $_POST["chair"];
   
  include 'template/header.php'; ?>
  <body>
    
     <?php include 'template/nav-bar.php'; ?>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel" style="height: 100px;">
      <div class="slider-item" style="background-image: url('images/nasikerabu.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 col-sm-12 ftco-animate text-center"  style="padding-bottom: 25%;"> 
              <h1 class="mb-3"></h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2>Mengesahkan Tempahan Anda</h2>
          </div>
        </div>
        <div class="row block-9 mb-4">
	        <div class="col-md-6 pr-md-5 flex-column">
	            <div class="row d-block flex-row">
	              <h2 class="h4 mb-4">Maklumat Pelanggan</h2>
		            <div class="col mb-3 d-flex py-4 border" style="background: white;">
		                <div class="align-self-center">
		                	<p class="mb-0"><span>Nama:</span> <a href=""><?php echo $reservation_name; ?></a></p>
		                	<p class="mb-0"><span>No. Telefon:</span> <a href="tel://1234567920"><?php echo $reservation_phone; ?></a></p>
			                <p class="mb-0"><span>Tarikh Tempahan:</span> <a href=""><?php echo $reservation_date; ?></a></p>
			                <p class="mb-0"><span>Masa Tempahan:</span> <a href=""><?php echo $reservation_time; ?></a></p>
		                </div>
		            </div>
	              	<div class="col mb-3 d-flex py-4 border" style="background: white;">
		                <div class="align-self-center">
	                      <p class="mb-0"><span>Meja No:</span>
	                      <?php for($p = 0; $p < count($_POST["table"]); $p++){
	                        $t_id = $_POST['table'][$p];  
	                        $sql4 = "SELECT * FROM `restaurant_tables` WHERE id = '$t_id';";
	                        $result4 = $con->query($sql4);
	                        foreach ($result4 as $r4) {
	                      ?>  
	                       <a style="color: #FFB911;"><?php echo $r4['table_name']; ?></a>
	                      <?php } } ?>
	                      </p>
	                      <p class="mb-0"><span>Kerusi No:</span>
	                        <?php for($q = 0; $q < count($_POST["chair"]); $q++){
	                        $c_id = $_POST['chair'][$q];  
	                        $sql5 = "SELECT * FROM `restaurant_chair` WHERE id = '$c_id';";
	                        $result5 = $con->query($sql5);
	                        foreach ($result5 as $r5) {
	                        ?> 
	                       <a style="color: #FFB911;"><?php echo $r5['chair_no']; ?>,</a>
	                       <?php } } ?>
	                      </p>
	                    </div>
	              	</div>
	        	</div>
          	</div>
          	<div class="col-md-6 pr-md-5 flex-column">
	            <div class="row d-block flex-row">
	              <h2 class="h4 mb-4">Maklumat Tempahan</h2>
		            <div class="col mb-3 d-flex py-4 border" style="background: white;">
		                <div class="align-self-center" style="width: 100%">
		                	<table style="width: 100%">
		                		<thead>
		                			<tr>
			                			<th></th>
			                			<th>Menu</th>
			                            <th>Harga</th>
			                            <th>Kuantiti</th>
			                            <th>Jumlah</th>
		                			</tr>
		                			
		                		</thead>
		                		<tbody>
		                			<?php 
		                			
		                				$total_price = 0;
		                				for($i = 0; $i < count($_POST["item"]); $i++){
				                        $i_id = $_POST['item'][$i];
                                		$qty = $_POST["qty"][$i];
                                		

				                        $c = 1;  
				                        $Itmsql = "SELECT * FROM `menu_item` WHERE id = '$i_id';";
				                        $Itmresult = $con->query($Itmsql);
				                        foreach ($Itmresult as $itmr) {
				                        	
				                        $total_price = $total_price + ($qty * $itmr['price']);
				                    ?> 
				                    <tr>
			                			<td><img style="height: 40px;width: 40px;" src="dashboard/item-image/<?php echo $itmr['image']; ?>" >
			                			</td>
			                            <td><?php echo $itmr['item_name']; ?></td>
			                            <td>RM<?php echo $itmr['price']; ?></td>
						                			<td><?php echo $qty; ?></td>
			                            <td>RM<?php echo $qty * $itmr['price']; ?></td>
							        </tr>
					                <?php $c++; } } ?>
		                		</tbody>
		                	</table>
		                </div>
		            </div>
	              	<div class="col mb-3 d-flex py-4 border" style="background: white;">
		                <div class="align-self-center">
		                  	<p class="mb-0"><span>Jumlah Keseluruhan:RM</span> <a href=""><?php echo $total_price; ?> </a></p>
		                </div>
	              	</div>
	        	</div>
          	</div>
<!--             <div class="col-md-12">
              <div class="col mb-3 border" style="background: white;">
                  <h3 class="text-center">Pay First</h3>
                  <div class="row">
                      <div class="col-md-6" style="text-align: center;">
                        <img style="height: 100px; width: 152px;" src="images/bkash-logo.png">
                        <p class="text-center">Account Number:</p>
                        <h6 class="text-center"><?php echo $bkashnumber; ?></h6>
                      </div>
                      <div class="col-md-6">
                        <h6>Procedure:</h6>
                        <ol>
                          <li>send money</li>
                          <li>netbanking</li>
                          <li>upi</li>
                          <li>wallet</li>
                          <li>paytm</li>
                          <li>Enter  transaction number</li>
                        </ol>
                      </div>
                  </div>
              </div>
            </div> -->
            
          	<form action="manage-insert.php" method="POST">
	          	<div class="col-lg-12" style="text-align: center;">
	                <input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
	                <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
	                <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
	                <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
	                <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
	                <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
	                <?php for($r = 0; $r < count($_POST["table"]); $r++){
	                        $tbl_id = $_POST['table'][$r]; ?>
	                <input type="hidden" name="table[]" value="<?php echo $tbl_id; ?>">
	                <?php } for($s = 0; $s < count($_POST["chair"]); $s++){ 
	                        $chr_id = $_POST['chair'][$s]; ?>
	                <input type="hidden" name="chair[]" value="<?php echo $chr_id; ?>">
	                <?php } ?>
	                <?php for($t = 0; $t < count($_POST["item"]); $t++){ 
	                        $i_id = $_POST['item'][$t];
                          $qty = $_POST['qty'][$t];
                           ?>
	                <input type="hidden" name="item[]" value="<?php echo $i_id; ?>">
                  <input type="hidden" name="qty[]" value="<?php echo $qty; ?>">
	                <?php } ?>
	                <input type="submit" value="Mengesahkan Tempahan" name="book" class="btn btn-primary py-3 px-5">
	            </div>
        	</form>
      </div>
    </section>
    

    <?php include 'template/footer.php'; ?>

    <?php include 'template/script.php'; ?>
    
  </body>
</html>
<?php } ?>