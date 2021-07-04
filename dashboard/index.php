<!-- booking-list.php -->
<?php include 'template/header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}

?>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include 'template/top-bar.php'; ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include 'template/left-bar.php'; ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2> Selamat Datang Ke Halaman Pemilik Restoran </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Senarai Tempahan</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						
						
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									
								</div>
						
								<h2 class="panel-title">Semua Tempahan</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>No. Telefon</th>
											<th>Tarikh</th>
											<th>Masa</th>
											<th>Bil</th>
											<th class="hidden-phone">Status Tempahan</th>
											<th class="hidden-phone">Terima/Batal</th>
											<th class="hidden-phone">Cetak Resit</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$count = 1;
										include 'dbCon.php';
										$con = connect();
										$res_id = $_SESSION['id'];
										$sql = "SELECT * FROM `booking_details` WHERE res_id = '$res_id'  ORDER BY make_date DESC;";
										$result = $con->query($sql);
										foreach ($result as $r) {
										?>
										<tr class="gradeX">
											<td class="center hidden-phone"><?php echo $count; ?></td>
											<td><?php echo $r['name']; ?></td>
											<td><?php echo $r['phone']; ?></td>
											<td><?php echo $r['booking_date']; ?></td>
											<td><?php echo $r['booking_time']; ?></td>
											<td>RM<?php echo $r['bill']; ?> </td>
											<td class="center hidden-phone">
												<?php 
													$status = $r['status'];
													if ($status == 0) {
												?>
												<p class="text-danger">Tempahan Dibatalkan</p>
												<?php }else{ ?>
													<p class="text-success">Tempahan Diterima</p>
												<?php } ?>
											</td>
											<td class="center hidden-phone">
												<?php 
													if ($status == 1) {
												?>
												<a href="approve-reject.php?breject_id=<?php echo $r['id']; ?>&booking-number=<?php echo $r['booking_id']; ?>" class="btn btn-danger"  onclick="if (!Done()) return false; ">Batal</a>
												<?php }else{ ?>
												<a href="approve-reject.php?bapprove_id=<?php echo $r['id']; ?>&booking-number=<?php echo $r['booking_id']; ?>" class="btn btn-success"  onclick="if (!Done()) return false; ">Terima</a>	
												<?php } ?>
											</td>
											<td class="center hidden-phone">
												<a href="invoice.php?booking-number=<?php echo $r['booking_id']; ?>" class="btn btn-primary">Cetak</a>
											</td>
										</tr>
										<?php $count++; } ?>
									</tbody>
								</table>
							</div>
						</section>
						
						
					<!-- end: page -->
				</section>
			</div>

			<?php include 'template/right-bar.php'; ?>
		</section>
		<script type="text/javascript">
	       function Done(){
	         return confirm("Adakah anda mahu mengesahkan status ini?");
	       }
   		</script>
<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
		<?php include 'template/script-res.php'; ?>
	</body>
</html>