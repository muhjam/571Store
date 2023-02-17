<?php include 'assets/php/session.php';
if(!isset($_POST['kode_karyawan'])){
	header('location:employees.php');
}
	
if(isset($_POST['submit'])){
if(ubah_karyawan($_POST)>0){
		 echo "
        <script>
        alert('Bukti karyawan berhasil diubah!');
				window.location='employees.php';
        </script>
        ";
    }
}
$kode_karyawan=$_POST['kode_karyawan'];
$karyawan=query("SELECT * FROM karyawan WHERE kode_karyawan='$kode_karyawan'")[0];

?>
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
								<h1>Ubah Data Karyawan</h1>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12 col-sm-8">

								<div class="card">
									<div class="card-header">
										<div class="card card-dark">
											<div class="card-header">
												<h3 class="card-title">Input Karyawan</h3>
											</div>
											<!-- /.card-header -->
											<!-- form start -->
											<form action="" method="post">
												<input hidden type="text" name="kode_karyawan" value="<?= $kode_karyawan?>">
												<div class="card-body">
													
													<div class="form-group">
														<label for="nama_karyawan">Name</label>
														<input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan"
															placeholder="Enter Name" autocomplete="off" required maxlength="100"
															value="<?= $karyawan['nama_karyawan']?>">
													</div>

													<div class="form-group">
														<label for="jabatan">Employ</label>
														<select id="jabatan" class="form-control" name="jabatan" required style="cursor:pointer;">
															<option value="">Select Product Type</option>
															<option value="manager keuangan" <?php if($karyawan['jabatan']=='manager keuangan'){echo'selected';}?>> 
																Manager Keuangan</option>
																<option value="staff keuangan" <?php if($karyawan['jabatan']=='staff keuangan'){echo'selected';}?>>Staff Keuangan</option>
																<option value="staff oprational" <?php if($karyawan['jabatan']=='staff oprational'){echo'selected';}?>>
																Staff Oprasional</option>
																<option value="manager pemasaran" <?php if($karyawan['jabatan']=='manager pemasaran'){echo'selected';}?>>Manager Pemasaran</option>
																	<option value="kepala gudang" <?php if($karyawan['jabatan']=='kepala gudang'){echo'selected';}?>>Kepala Gudang</option>
																	<option value="staff gudang" <?php if($karyawan['jabatan']=='staff gudang'){echo'selected';}?>>Staff Gudang</option>
														</select>
													</div>
															<div class="form-group">
														<label for="harga">Salary</label>
														<input type="text" name="gaji" class="form-control" placeholder="Enter Price"
															id="harga" maxlength="16" required
															value="<?= rupiahnokoma($karyawan['gaji'])?>">
													</div>
													</div>
												</div>
												<!-- /.card-body -->
												<div class="card-footer">
													<button type="submit" name="submit" class="btn btn-dark">Submit</button>
												</div>
											</form>
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

		<!-- bootstrap -->
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

		<script>
		tinymce.init({
			selector: 'textarea#editor',
			skin: 'bootstrap',
			plugins: 'lists, link, image, media',
			toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
			menubar: false,
		});
		</script>


		<!-- my javascript -->>
		<script>

		</script>


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