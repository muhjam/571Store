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
								<h1>Pengguna Bandstore<span style="color:red">.</span></h1>
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
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Code</th>
												<th>Level</th>
												<th>Name</th>
												<th>Address</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<?php 
				include 'assets/php/koneksi.php';

if($kode_pengguna=='US001'){
		$sql = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE kode_pengguna!='US001' ORDER BY nama_pengguna") or die(mysql_error());
}else if($kode_pengguna!='US001'){
			$sql = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE kode_pengguna!='US001' AND kode_pengguna!='$kode_pengguna' AND level_pengguna!='admin' ORDER BY nama_pengguna") or die(mysql_error());
}

				$no=0;
				while($pengguna = mysqli_fetch_array($sql))
				{
				$no++;
				$kode_pengguna=$pengguna['kode_pengguna'];
					?>

												<td><?= $no; ?></td>
												<td>
													<?= $pengguna['kode_pengguna']; ?>
												</td>
												<td>
													<?= $pengguna['level_pengguna']; ?>
												</td>
												<td><?= $pengguna['nama_pengguna']; ?></td>
												<td><?= $pengguna['alamat_pengguna']; ?></td>
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