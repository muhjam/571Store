<?php include 'assets/php/session.php';
if(!isset($_POST['kode_pembelian'])){
	header('location:notes_purchase.php');
}
	
if(isset($_POST['submit'])){
if(ubah_pembelian($_POST)>0){
		 echo "
        <script>
        alert('Bukti pembelian berhasil diubah!');
				window.location='notes_purchase.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
$kode_pembelian=$_POST['kode_pembelian'];
$pembelian=query("SELECT * FROM pembelian WHERE kode_pembelian='$kode_pembelian'")[0];

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
								<h1>Ubah Catatan Retur Pembelian<span style="color:red">.</span></h1>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>
<?php $jenis_produk=query("SELECT * FROM jenis_produk"); ?>
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12 col-sm-8">

								<div class="card">
									<div class="card-header">
										<div class="card card-dark">
											<div class="card-header">
												<h3 class="card-title">Input Retur</h3>
											</div>
											<!-- /.card-header -->
											<!-- form start -->
											<form action="" method="post">
												<input hidden type="text" name="kode_pembelian" value="<?= $kode_pembelian?>">
												<div class="card-body">
													
													<div class="form-group">
														<label for="tanggal_pembelian">Purchase Date</label>
														<input type="date" name="tanggal_pembelian" class="form-control" id="date" autocomplete="off" value="<?= $pembelian['tanggal_pembelian']?>"
															required>
													</div>
													<div class="form-group">
														<label for="nama_produk">Name</label>
														<input type="text" name="nama_produk" class="form-control" id="nama_produk"
															placeholder="Enter Name" autocomplete="off" required maxlength="100"
															value="<?= $pembelian['nama_produk']?>">
													</div>

													<div class="form-group">
														<label for="type">Type</label>
														<select id="type" class="form-control" name="jenis_produk" required style="cursor:pointer;">
															<option value="">Select Product Type</option>
															<?php foreach($jenis_produk as $jenis): ?>
															
															<option value="<?= $jenis['jenis_produk'];?>" 	<?php if($jenis['jenis_produk']==$pembelian['jenis_produk']){echo"selected";} ?>>
																<?= $jenis['jenis_produk']; ?></option>
															<?php endforeach; ?>
														</select>
													</div>

													<div class="form-group">
														<label for="jumlah_produk">Quantity</label>
														<input type="number" name="jumlah_produk" class="form-control" placeholder="Enter Quantity"
															id="jumlah_produk" min="1" value="1" required value="<?= $pembelian['jumlah_produk']?>">
													</div>

															<div class="form-group">
														<label for="harga">Purchase Price</label>
														<input type="text" name="harga_produk" class="form-control" placeholder="Enter Price"
															id="harga" maxlength="16" required
															value="<?= rupiahnokoma($pembelian['harga_produk'])?>">
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