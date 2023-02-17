<?php 
include 'assets/php/session.php'; 
include 'assets/php/head.php';
include 'assets/php/nav.php';
?>
<!-- header -->
<header id="home" class="w-100 position-relative pb-3">
	<!-- Full-width images with number and caption text -->
	<div class="mySlides">
		<img class="w-100" src="assets/img/slide.png">
	</div>
	<div class="mySlides">
		<img class="w-100" src="assets/img/slidee.png">
	</div>
	<div class="mySlides">
		<img class="w-100" src="assets/img/slideee.png">
	</div>
	<!-- Next and previous buttons -->
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
</header>
<!-- header -->
<!-- categories -->
<section id="categories" class="py-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-sm-4 position-relative mb-sm-0 mb-3">
				<a href="">
					<img src="assets/img/men.png" alt="Men Category" width="100%" height="100%">
					<h4 class="position-absolute bottom-0 start-0 end-0 text-center">Men</h4>
				</a>
			</div>
			<div class="col-12 col-sm-4 position-relative mb-sm-0 mb-3">
				<a href="">
					<img src="assets/img/bastseller.png" alt="Bast Seller Category" width="100%" height="100%">
					<h4 class="position-absolute bottom-0 start-0 end-0 text-center">Bast Seller</h4>
				</a>
			</div>
			<div class="col-12 col-sm-4 position-relative mb-sm-0 mb-3">
				<a href="">
					<img src="assets/img/woman.png" alt="Woman Category" width="100%" height="100%">
					<h4 class="position-absolute bottom-0 start-0 end-0 	text-center">Woman</h4>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- categories -->

<!-- items slider -->
<section id="shop" class="py-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col text-center">
				<h3>New Arrivals</h3>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<ul id="autoWidth" class="cs-hidden">
					<li class="item">
						<div class="box">
							<div class="slide-img">
								<img src="assets/img/test_nike_air_f_1.png" alt="">
								<div class="overlay">
									<a href="#" class="buy-btn">Buy Now</a>
								</div>
							</div>
							<div class="detail-box">
								<div class="type">
									<a href="">Nike Air Force 1 '07</a>
									<span>Nike</span>
								</div>
								<div class="price">
									<span>499K</span>
								</div>
							</div>
						</div>
					</li>
					<li class="item">
						<div class="box">
							<div class="slide-img">
								<img src="assets/img/test_jacket_1.png" alt="">
								<div class="overlay">
									<a href="#" class="buy-btn">Buy Now</a>
								</div>
							</div>
							<div class="detail-box">
								<div class="type">
									<a href="">Hoodie Zip Elstinko</a>
									<span>Elstinko</span>
								</div>
								<div class="price">
									<span>899K</span>
								</div>
							</div>
						</div>
					</li>
					<li class="item">
						<div class="box">
							<div class="slide-img">
								<img src="assets/img/test_lekbong_nba.png" alt="">
								<div class="overlay">
									<a href="#" class="buy-btn">Buy Now</a>
								</div>
							</div>
							<div class="detail-box">
								<div class="type">
									<a href="">Vest Basketball NBA</a>
									<span>Bulls</span>
								</div>
								<div class="price">
									<span>1M</span>
								</div>
							</div>
						</div>
					</li>
					<li class="item">
						<div class="box">
							<div class="slide-img">
								<img src="assets/img/test_sweater_pink.png" alt="">
								<div class="overlay">
									<a href="#" class="buy-btn">Buy Now</a>
								</div>
							</div>
							<div class="detail-box">
								<div class="type">
									<a href="">Hoodie Pancoat</a>
									<span>Pancoat</span>
								</div>
								<div class="price">
									<span>1M</span>
								</div>
							</div>
						</div>
					</li>
					<li class="item">
						<div class="box">
							<div class="slide-img">
								<img src="assets/img/test_jacket_crewneck.png" alt="">
								<div class="overlay">
									<a href="#" class="buy-btn">Buy Now</a>
								</div>
							</div>
							<div class="detail-box">
								<div class="type">
									<a href="">Crewneck NCAA Athletics</a>
									<span>NCAA</span>
								</div>
								<div class="price">
									<span>1M</span>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- items slider -->

<!-- about -->
<section id="about" class="py-5">
	<div class="row px-3 pt-5 py-md-0 my-5 mx-0">
		<div class="col-12 col-md-6 d-flex align-items-center">
			<div class="content px-3">
				<h2>About Us</h2>
				<p>571 Store is one of the biggest thrifting fashion stores in Indonesia. Therefore we always sell
					quality
					product
					and of course original. Customer satisfaction is our responsibility.</p>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="box">
				<iframe class="map border rounded"
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.213473145514!2d107.54593231405609!3d-6.865002495039011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e46b75031587%3A0xfd53c7228229a7e!2sJl.%20Tutwuri%2C%20Citeureup%2C%20Kec.%20Cimahi%20Utara%2C%20Kota%20Cimahi%2C%20Jawa%20Barat%2040512!5e0!3m2!1sen!2sid!4v1674060832756!5m2!1sen!2sid"
					allowfullscreen="" loading="lazy" width="100%" height="100%"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
</section>
<!-- about -->

<?php include 'assets/php/footer.php'; ?>