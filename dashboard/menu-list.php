<!-- menu-list.php -->
<?php include 'template/header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}

?>
	<body>
		<section class="body">


			<?php include 'template/top-bar.php'; ?>
			<!-- end: header -->

			<div class="inner-wrapper">
	
				<?php include 'template/left-bar.php'; ?>
		

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Kemaskini Menu</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Kemaskini Menu</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

	
						
						
						<section class="panel">
							<header class="panel-heading">
								
						
								<h2 class="panel-title">Senarai Menu</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>No.</th>
											<th>Gambar Menu</th>
											<th>Nama Menu</th>
											<th>Jenis Menu</th>
											<th>Harga</th>
											<th>Dibuat Oleh</th>
											<th class="hidden-phone">Status Menu</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$res_id = $_SESSION['id'];
										$count = 1;
										include 'dbCon.php';
										$con = connect();
										$sql = "SELECT * FROM `menu_item` WHERE res_id = '$res_id';";
										$result = $con->query($sql);
										foreach ($result as $r) {
										?>
										<tr class="gradeX">
											<td class="center hidden-phone"><?php echo $count; ?></td>
											<td class="center hidden-phone">
												<figure class="image rounded">
													<img style="height: 50px;width: 50px;border-radius: 10px;    border: 1px solid darkgray;" src="item-image/<?php echo $r['image']; ?>" alt="Item Image" >
												</figure>
											</td>
											<td><?php echo $r['item_name']; ?></td>
											<td><?php echo $r['food_type']; ?></td>
											<td>RM<?php echo $r['price']; ?></td>
											<td><?php echo $r['madeby']; ?></td>
											<td class="center hidden-phone">
												<a href="menu-manage.php?menu_id=<?php echo $r['id']; ?>" class="btn btn-danger"  onclick="if (!Done()) return false; ">Buang</a>
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
	         return confirm("Are you sure?");
	       }
   		</script>
		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		
	</body>
</html>