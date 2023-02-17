<?php 

include 'assets/php/session.php'; 
if(isset($_POST['has'])){
	if(hapus_pembelian($_POST)>0){
		 echo "
        <script>
        alert('Bukti pembelian berhasil dihapus!');
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
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
								<h1>Pembelian Produk<span style="color:red">.</span></h1>
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
										<a href="notes_purchase_add.php"><button type="submit" class="btn btn-light"><svg
													xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
													class="bi bi-clipboard2-plus" viewBox="0 0 16 16">
													<path
														d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
													<path
														d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
													<path
														d="M8.5 6.5a.5.5 0 0 0-1 0V8H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V9H10a.5.5 0 0 0 0-1H8.5V6.5Z" />
												</svg>
												</svg> Note</button></a>

										<a href="report_pembelian.php"><button type="submit" class="btn btn-light"><svg
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
													<th>Code</th>
													<th>Name</th>
													<th>Brand</th>
													<th>Type</th>
													<th>Quantity</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<?php 
				include 'assets/php/koneksi.php';		
		$sql = mysqli_query($koneksi,"SELECT * FROM pembelian ORDER BY kode_pembelian DESC") or die(mysql_error());
				$no=0;
				while($pembelian = mysqli_fetch_array($sql))
				{
				$no++;
				$kode_pembelian=$pembelian['kode_pembelian'];
					?>

													<td><?= $no; ?></td>
													<td>
														<?= date("d-m-Y", strtotime($pembelian['tanggal_pembelian'])); ?>
													</td>
													<td>
														<?= $pembelian['kode_pembelian']; ?>
													</td>
													<td><?= $pembelian['nama_produk']; ?></td>
													<td><?= $pembelian['merk_produk']; ?></td>
													<td><?= $pembelian['jenis_produk']; ?></td>
													<td><?= $pembelian['jumlah_produk']; ?></td>
													<td><?= rupiah($pembelian['harga_produk']); ?></td>
													</td>
												</tr>

												<div class="modal fade" id="myModal4<?php echo $kode_pembelian; ?>" role="dialog">
													<div class="modal-dialog">
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Confirmation</h4>
															</div>
															<div class="modal-body">
																<?php
												include('assets/php/koneksi.php');
												$kode_pembeliann = $kode_pembelian;
												$kueri = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE kode_pembelian='$kode_pembeliann'") or die(mysql_error());
												$data = mysqli_fetch_array($kueri);
											?>
																<form role="form" action="" method="POST">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="hidden" class="form-control" name="kode_pembelian"
																				value="<?php echo $data['kode_pembelian']; ?>" />
																			<label> Are you sure to delete <?php echo $data['nama_produk']; ?> ? </label>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-success" name="has">Ya</button>
																		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>


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