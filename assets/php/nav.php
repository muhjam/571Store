<nav id="navbar" class="navbar-expand-lg bg-light position-fixed w-100">
	<div class="container-fluid">
		<div class="row d-flex py-2">
			<div class="col d-none d-lg-inline">
				<a href="" target="_blank" class="mx-1"><i class="fa-brands fa-facebook-f"></i></a>
				<a href="" target="_blank" class="mx-1"><i class="fa-brands fa-twitter"></i></a>
				<a href="" target="_blank" class="mx-1"><i class="fa-brands fa-youtube"></i></a>
				<a href="" target="_blank" class="mx-1"><i class="fa-brands fa-instagram"></i></a>
			</div>
			<div class="col d-none d-lg-inline text-center">
				<p class="d-inline">The King of Thrifthings</p>
			</div>
			<div class="col d-flex justify-content-lg-end justify-content-between">
				<div class="search d-inline">
					<i class="fa-solid fa-magnifying-glass" onclick="search()"></i>
					<form action="" class="d-inline">
						<input type="search" id="input-search" onfocusout="closeSearch()" autocomplete="off" name="q"
							class="bg-light me-1">
					</form>
				</div>
				<div>
					<i class="fa-solid fa-user mx-1"></i>
					<a href="" class="mx-1">Mycart <i class="fa-solid fa-cart-shopping"></i><span>0</span></a>
					<i class="bi bi-receipt-cutoff notification"> <span class="notification-dot"></span></i>
					<!-- <a href="">Dashboard <i class="fa-solid fa-gauge"></i></a> -->
				</div>
			</div>
		</div>

		<div class="row py-3">
			<div class="col text-center">
				<a href="index.php" class="navbar-brand fs-5 border border border-secondary border-2 rounded p-3">571
					Store</a>
			</div>
		</div>

		<div class="row pt-3 pb-1">
			<div class="col text-center">
				<a href="#home" class="mx-1">Home</a>
				<a href="#shop" id="dropdown-shop" class="mx-1" role="button" data-bs-toggle="dropdown"
					aria-expanded="false">Shop
				</a>
				<div class="dropdown-menu w-100 overflow-auto border-0 text-center pb-5 position-absolute">
					<h3>Colection</h3>
					<a href="" class="dropdown-item">T-shirt</a>
					<a href="" class="dropdown-item">Shirt</a>
					<a href="" class="dropdown-item">Polo Shirt</a>
					<a href="" class="dropdown-item">Sweatershirt</a>
					<a href="" class="dropdown-item">Jacket</a>
					<a href="" class="dropdown-item">Pants</a>
					<a href="" class="dropdown-item">Shoes</a>
					<a href="" class="dropdown-item">Sandals</a>
					<a href="" class="dropdown-item">Bags</a>
					<a href="" class="dropdown-item">Hats</a>
					<a href="" class="dropdown-item">Sockes</a>
					<a href="" class="dropdown-item">Watches</a>
					<a href="" class="dropdown-item">Wallet</a>
					<a href="" class="dropdown-item">Gloves</a>
					<a href="" class="dropdown-item">Sunglasses</a>
					<a href="" class="dropdown-item">Bracelet</a>
					<a href="" class="dropdown-item">Other</a>
				</div>

				<a href="#about" class="mx-1">About</a>
				<!-- <li><a href="">blog</a></li> -->
				<a href="#contact" class="mx-1">Contact</a>
				</ul>
			</div>
		</div>
	</div>
</nav>