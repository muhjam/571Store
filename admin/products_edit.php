<?php include 'assets/php/session.php';
if(!isset($_POST['kode_produk'])){
	header('location:products.php');
}
	
if(isset($_POST['submit'])){
if(ubah_produk($_POST)>0){
		 echo "
        <script>
        alert('Data produk berhasil diubah!');
				window.location='products.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
$kode_produk=$_POST['kode_produk'];
$produk=query("SELECT * FROM produk a NATURAL JOIN stok b WHERE kode_produk='$kode_produk'")[0];

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
								<h1>Mengubah Data Produk</h1>
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
												<h3 class="card-title">Input Purchase</h3>
											</div>
											<!-- /.card-header -->
											<!-- form start -->
											<form action="" method="post" enctype="multipart/form-data">
												<input hidden type="text" name="gambar_produk_lama" value="<?= $produk['gambar_produk'];?>">
												<div class="card-body">
														<div class="form-group">
														<label for="kode_produk">Code</label>
														<input type="text" name="kode_produk" class="form-control" placeholder="Enter Price"
															id="kode_produk" maxlength="16" required
															value="<?= $produk['kode_produk'];?>" readonly>
													</div>
															<div class="form-group">
														<label for="harga">Price</label>
														<input type="text" name="harga_produk" class="form-control" placeholder="Enter Price"
															id="harga" maxlength="16" required
															value="<?= rupiahnokoma($produk['harga_produk'])?>">
													</div>

														<div class="form-group">
														<label for="image">Image</label>
														<img src="../assets/img/<?= $produk['gambar_produk']?>" class="img-thumbnail mb-2" style="width:120px;display:block;" id=img-preview>
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="image" name="gambar_produk"
																aria-describedby="inputGroupFileAddon01" style="cursor:pointer;"
																onchange="previewImage();" value="<?= $produk['gambar_produk'];?>">
															<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
														</div>
														<div class="form-group">
														<label for="keterangan_produk">Description</label>
														<textarea class="form-control" placeholder="Discribe the product" id="keterangan_produk"
															style="height: 100px" name="keterangan_produk"><?= str_replace("<br/>","&#13",$produk['keterangan_produk']) ;?></textarea>
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