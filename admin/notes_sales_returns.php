<?php include 'assets/php/session.php'; ?>
<!DOCTYPE html>
<html>

	<head>
		<?php include 'header.php' ?>
	</head>

	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<?php include 'nav.php' ?>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<?php include 'sidebar.php' ?>

			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Retur Penjualan<span style="color:red">.</span></h1>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
	<div class="card">
										<div class="card-header">
										<a href="report_retur_penjualan.php"><button type="submit" class="btn btn-light"><svg
													xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
													class="bi bi-printer-fill" viewBox="0 0 16 16">
													<path
														d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
													<path
														d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
												</svg> Print</button></a>
									</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
													<th>Date</th>
												<th>User Code</th>
												<th>User Name</th>
												<th>Product Code</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<?php 
				include 'assets/php/koneksi.php';


			$sql = mysqli_query($koneksi,"SELECT a.kode_pengguna, a.nama_pengguna, b.kode_produk, b.jumlah_produk, c.harga_produk, b.tanggal_retur  
			FROM 
			pengguna a 
			INNER JOIN retur_penjualan b
			ON a.kode_pengguna=b.kode_pengguna
			INNER JOIN produk c
			ON b.kode_produk=c.kode_produk") or die(mysql_error());


				$no=0;
				while($retur_penjualan = mysqli_fetch_array($sql))
				{
				$no++;
				$kode_pengguna=$retur_penjualan['kode_pengguna'];
					?>

												<td><?= $no; ?></td>
												<td>	<?= date("d-m-Y", strtotime($retur_penjualan['tanggal_retur'])); ?></td>
												<td>
													<?= $retur_penjualan['kode_pengguna']; ?>
												</td>
												<td>
													<?= $retur_penjualan['nama_pengguna']; ?>
												</td>
												<td><?= $retur_penjualan['kode_produk']; ?></td>
													<td><?= rupiah($retur_penjualan['harga_produk']); ?></td>
												<td><?= $retur_penjualan['jumlah_produk']; ?></td>
												<td><?= rupiah($retur_penjualan['jumlah_produk']*$retur_penjualan['harga_produk']); ?></td>
											</tr>														
											<?php }; ?>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<?php include 'footer.php' ?>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->
		<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"autoWidth": false,
			});
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
		</script>
	</body>

</html>