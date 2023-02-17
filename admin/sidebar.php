   <a href="../index.php" target="_blank" class="brand-link">
   	<img src="../assets/icon/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
   		style="opacity: .8">
   	<span class="brand-text font-weight-light">bandstore<span style="color:red">.</span></span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
   	<!-- Sidebar user panel (optional) -->
   	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
   		<div class="image">
   			<img src="assets/img/profile.png" class="img-circle elevation-2" alt="User Image">
   		</div>
   		<div class="info">
   			<a href="#" class="d-block"><?= $pengguna['nama_pengguna']; ?></a>
   		</div>
   	</div>

   	<!-- Sidebar Menu -->
   	<nav class="mt-2">
   		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
   			<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   			<li class="nav-item">
   				<a href="index.php" class="nav-link">
   					<i class="nav-icon fas fa-home"></i>
   					<p>
   						Home
   					</p>
   				</a>
   			</li>
   			<li class="nav-item">
   				<a href="users.php" class="nav-link">
   					<i class="nav-icon fas fa-user"></i>
   					<p>
   						Users
   					</p>
   				</a>
   			</li>
   			<li class="nav-item">
   				<a href="employees.php" class="nav-link">
   					<i class="nav-icon fas fa-users"></i>
   					<p>
   						Employees
   					</p>
   				</a>
   			</li>
   			<li class="nav-item">
   				<a href="notes.php" class="nav-link">
   					<i class="nav-icon fas fa-clipboard"></i>
   					<p>
   						Notes
   					</p>
   				</a>
   			</li>
   			<li class="nav-item">
   				<a href="products.php" class="nav-link">
   					<i class="nav-icon fas fa-box"></i>
   					<p>
   						Products
   					</p>
   				</a>
   			</li>
   			<li class="nav-item has-treeview">
   				<a href="#" class="nav-link">
   					<i class="nav-icon fas fa-copy"></i>
   					<p>
   						Report
   						<i class="fas fa-angle-left right"></i>
   						<span class="badge badge-info right">7</span>
   					</p>
   				</a>
   				<ul class="nav nav-treeview">
							<li class="nav-item">
   						<a href="report_karyawan.php" class="nav-link">
   							<i class="far fa-circle nav-icon"></i>
   							<p>Karyawan</p>
   						</a>
   					</li>
   					<li class="nav-item">
   						<a href="report_laba_rugi.php" class="nav-link">
   							<i class="far fa-circle nav-icon"></i>
   							<p>Laba Rugi</p>
   						</a>
   					</li>
   					<li class="nav-item">
   						<a href="report_pembelian.php" class="nav-link">
   							<i class="far fa-circle nav-icon"></i>
   							<p>Pembelian</p>
   						</a>
   					</li>
						<li class="nav-item">
   						<a href="report_penjualan.php" class="nav-link">
   							<i class="far fa-circle nav-icon"></i>
   							<p>Penjualan</p>
   						</a>
   					</li>
						<li class="nav-item">
   						<a href="report_stok.php" class="nav-link">
   							<i class="far fa-circle nav-icon"></i>
   							<p>Stok</p>
   						</a>
   					</li>
						<li class="nav-item">
   						<a href="report_retur_pembelian.php" class="nav-link">
   							<i class="far fa-circle nav-icon"></i>
   							<p>Retur Pembelian</p>
   						</a>
   					</li>
							<li class="nav-item">
   						<a href="report_retur_penjualan.php" class="nav-link">
   							<i class="far fa-circle nav-icon"></i>
   							<p>Retur Penjualan</p>
   						</a>
   					</li>
   				</ul>
   			</li>
   		</ul>
   	</nav>
   	<!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->