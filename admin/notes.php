<?php include 'assets/php/session.php';

$sql="SELECT * FROM pengguna";

$jumlah_stok=query("SELECT SUM(jumlah_produk) total FROM stok")[0]['total'];
$jumlah_pembelian=query("SELECT SUM(jumlah_produk) total FROM pembelian")[0]['total'];
$jumlah_penjualan=query("SELECT SUM(jumlah_produk) total FROM penjualan")[0]['total'];
$jumlah_retur_penjualan=query("SELECT SUM(jumlah_produk) total FROM retur_penjualan")[0]['total'];
$jumlah_retur_pembelian=query("SELECT SUM(jumlah_produk) total FROM retur_pembelian")[0]['total'];
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include 'header.php' ?>
	</head>

	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">

			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<?php include 'nav.php' ?>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<?php include 'sidebar.php' ?>
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0 text-dark">Notes</h1>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->

				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<!-- Small boxes (Stat box) -->
						<div class="row">
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-primary">
									<div class="inner">
										<h3><?php if($jumlah_pembelian>0){echo"$jumlah_pembelian";}else{echo"0";} ?></h3>

										<p>Pembelian Produk</p>
									</div>
									<div class="icon">
										<i class="ion ion-clipboard"></i>
									</div>
									<a href="notes_purchase.php" class="small-box-footer">More info <i
											class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-warning">
									<div class="inner">
										<h3><?php if($jumlah_retur_pembelian>0){echo"$jumlah_retur_pembelian";}else{echo"0";} ?></h3>
										<p>Retur Pembelian</p>
									</div>
									<div class="icon">
										<i class="ion ion-arrow-return-left"></i>
									</div>
									<a href="notes_purchase_returns.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-danger">
									<div class="inner">
										<h3><?= $jumlah_retur_penjualan; ?></h3>
										<p>Retur Penjualan</p>
									</div>
									<div class="icon">
										<i class="ion ion-arrow-return-left"></i>
									</div>
									<a href="notes_sales_returns.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-secondary">
									<div class="inner">
										<h3><?php if($jumlah_stok>0){echo"$jumlah_stok";}else{echo"0";} ?></h3>
										<p>Stok Produk</p>
									</div>
									<div class="icon">
										<i class="fa fa-box"></i>
									</div>
									<a href="notes_stok.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
						</div>

							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
									<div class="inner">
										<h3><?php if($jumlah_stok>0){echo"$jumlah_penjualan";}else{echo"0";} ?></h3>
										<p>Penjualan Produk</p>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>
									<a href="notes_sales.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
						</div>
						<!-- /.row -->
						<!-- Main row -->
						<div class="row">
							<!-- Left col -->
							<section class="col-lg-7 connectedSortable">
								<!-- Custom tabs (Charts with tabs)-->

								<!-- /.card -->

								<!-- DIRECT CHAT -->

								<!--/.direct-chat -->

								<!-- TO DO List -->

								<!-- /.card -->
							</section>
							<!-- /.Left col -->
							<!-- right col (We are only adding the ID to make the widgets sortable)-->
							<section class="col-lg-5 connectedSortable">


								<!-- /.card -->

								<!-- Calendar -->

								<!-- /.card -->
							</section>
							<!-- right col -->
						</div>
						<!-- /.row (main row) -->
					</div><!-- /.container-fluid -->
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
		<!-- jQuery UI 1.11.4 -->
		<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		$.widget.bridge('uibutton', $.ui.button)
		</script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- ChartJS -->
		<script src="plugins/chart.js/Chart.min.js"></script>
		<!-- Sparkline -->
		<script src="plugins/sparklines/sparkline.js"></script>
		<!-- JQVMap -->
		<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="plugins/moment/moment.min.js"></script>
		<script src="plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<!-- Summernote -->
		<script src="plugins/summernote/summernote-bs4.min.js"></script>
		<!-- overlayScrollbars -->
		<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
	</body>

</html>