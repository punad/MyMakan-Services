<!-- invoice.php -->
<?php include 'template/header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}

?>

					<section class="panel">
						<div class="panel-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-4 mt-md">
										
											<h1 class="h2 mt-none mb-sm text-dark text-bold">Resit</h1>
											<h4 class="h4 m-none text-dark text-bold">Resit No. <?php echo $_GET['booking-number']; ?></h4>
										</div>
										<?php 
											include 'dbCon.php';
											$con = connect();
											$res_id = $_SESSION['id'];
											$sql = "SELECT * FROM `restaurant_info` where id = '$res_id';";
											$result = $con->query($sql);
											foreach ($result as $r) {
										?>
										<div class="col-sm-8 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												<b class="text-capitalize"><?php echo $r['restaurent_name']; ?></b>
												<br/>
												<?php echo $r['address']; ?>
												<br/>
												No. Telefon: +6<?php echo $r['phone']; ?>
												<br/>
												<?php echo $r['email']; ?>
											</address>
											<div class="ib">
												<img style="width: 180px;height: 80px;" src="user-image/<?php echo $r['logo']; ?>" alt="OKLER Themes" />
											</div>
										</div>
										<?php } ?>
									</div>
								</header>
								<?php 
									$booking_number = $_GET['booking-number'];
									$sql2 = "SELECT * FROM `booking_details` where booking_id = '$booking_number';";
									$result2 = $con->query($sql2);
									foreach ($result2 as $r2) {
										$booking_date = $r2['booking_date'];
										$booking_time = $r2['booking_time'];
										$booking_name = $r2['name'];
										$booking_phone = $r2['phone'];
									} ?>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
											<p class="h5 mb-xs text-dark text-semibold">
											Diminta Tuan/Puan, untuk tiba awal sebelum 15 minit bagi mengelakkan tempahan anda dibatalkan. <br>
											Terima kasih kerana menggunakan perkhidmatan kami.<br> <br>Terima kasih daun keladi. 
											<br>Nanti buatlah tempahan bersama kami lagi.</p>
											<br>
												<address>
													Kepada: <?php echo $booking_name; ?>
													<br/>
													No. Telefon: +6<?php echo $booking_phone; ?>
												
												</address>
											</div>
										</div>
										<div class="col-md-6">
											<div class="bill-data text-right">
												<p class="mb-none">
													<span class="text-dark">Tarikh Tempahan:</span>
													<span class="value"><?php echo $booking_date; ?></span>
												</p>
												<p class="mb-none">
													<span class="text-dark">Masa Tempahan:</span>
													<span class="value"><?php echo $booking_time; ?></span>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">Meja dan Kerusi:</p>
												<address>
													<?php 
													$booking_number = $_GET['booking-number'];
													$sql3 = "SELECT bc.booking_id,bc.chair_no,rt.table_name
														FROM booking_chair as bc, restaurant_chair as rc,restaurant_tables as rt
														WHERE bc.chair_id = rc.id
														AND rc.tbl_id = rt.id
														and bc.booking_id ='$booking_number';";
													$result3 = $con->query($sql3);
													foreach ($result3 as $r3) {
													?>
													<?php echo $r3['chair_no']; ?>, 
													<?php  } ?>
												</address>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-id"     class="text-semibold">No.</th>
												<th id="cell-item"   class="text-semibold">Menu</th>
												<th id="cell-price"  class="text-left text-semibold">Harga</th>
												<th id="cell-qty"    class="text-center text-semibold">Kuantiti</th>
												<th id="cell-total"  class="text-center text-semibold">Jumlah</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$booking_number = $_GET['booking-number'];
											$sql4 = "SELECT bm.booking_id,bm.qty,mi.item_name,mi.price
												FROM booking_menus as bm, menu_item as mi
												WHERE bm.item_id = mi.id
												AND bm.booking_id ='$booking_number';";
											$result4 = $con->query($sql4);
											$count = 1;
											$grand_total = 0;
											foreach ($result4 as $r4) {
											$grand_total = $grand_total + $r4['price'] * $r4['qty'];
											?>
											<tr>
												<td><?php echo $count; ?>.</td>
												<td class="text-semibold text-dark"><?php echo $r4['item_name']; ?></td>
												<td>RM<?php echo $r4['price']; ?></td>
												<td class="text-center"><?php echo $r4['qty']; ?></td>
												<td class="text-center">RM
												<?php echo $subtotal= $r4['price'] * $r4['qty']; ?> 
												</td>
											</tr>
											<?php $count++; } ?>
										</tbody>
									</table>
								</div>
							
								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													<tr class="h4">
														<td colspan="2">Jumlah Keseluruhan</td>
														<td class="text-left">RM<?php echo $grand_total; ?> </td>
														
														
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="text-right mr-lg">	
							</div>
						</div>
					</section>

					<!-- end: page -->
			

			<?php include 'template/right-bar.php'; ?>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>