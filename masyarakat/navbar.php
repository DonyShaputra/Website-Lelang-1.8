<?php
session_start();
  if($_SESSION['status_login']!=true) {
    header('location: ../index.php');
  }
?>
<!DOCTYPE html>



<html lang="zxx" class="no-js">

<head>


	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->

    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet">
    <link href="../font-awesome/css/brands.css" rel="stylesheet">
    <link href="../font-awesome/css/solid.css" rel="stylesheet">



	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="#">Home</a></li>


							<li class="nav-item "><a class="nav-link" href="../logout.php"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i>&nbspLogout</a></li>


							<li class="nav-item"><a class="nav-link"  ><i class="fa-sharp fa-solid fa-user"></i>&nbsp<?=$_SESSION['nama']?></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class=""></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>

	<style>

	.slider-container {
  position: relative;
  
}

.slider {
  display: flex;
  overflow-x: hidden;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  -webkit-overflow-scrolling: touch;
    =
}

.slider img {
  flex: 0 0 auto;
  width: 100%;
  height: auto;
  scroll-snap-align: start;

}

.prev,
.next {
  position: absolute;
  top: 60%;
  transform: translateY(-50%);
  z-index: 1;
  background-color: #f1f1f1;
  border: none;
  cursor: pointer;
  font-size: 2rem;
  color: #ff7300;

  text-decoration: none;
  display: inline-block;
  padding: 7px 16px
}

.prev {
  left: 0;
}

.next {
  right: 0;
}

.prev:hover,
.next:hover {
	background-color: #ddd;
  color: black;
}




	</style>
	<!-- End Header Area -->

	<!-- start banner Area -->
	
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col order-1">
			
						<!-- single-slide -->
						<br>
						<br>
						<br>
						<br>
						
						
  <div class="slider">
    <img src="assets/images/banner/banner1.png" alt="Banner 1">
    <img src="assets/images/banner/banner2.png" alt="Banner 2">
    <img src="assets/images/banner/banner3.png" alt="Banner 3">
  </div>
  
  <button class="prev" class="fas fa-chevron-left"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>
  <button class="next" class="fas fa-chevron-right"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>
</div>
			</div>

			
		
	</section>
	
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
			</div>
		</div>
		
	</section>
	
	
	<!-- end features Area -->

	<!-- Start category Area -->
	
						
								
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								
								<img class="img-fluid w-100" src="img/category/c1.jpg" alt="">
								<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c2.jpg" alt="">
								<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c3.jpg" alt="">
								<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Product for Couple</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c4.jpg" alt="">
								<a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
							
						</a>
								</a>
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100" src="img/category/c5.jpg" alt="">
						<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Sneaker for Sports</h6>
							</div>
							
              </a>
					</div>
				</div>
			</div>
		</div>
		
	</section>
	
	<!-- End category Area -->

	<!-- start product Area -->
	
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Produk Terbaru</h1>
							
							<p>Selamat Berbelanja</p>
						</div>
					</div>
				</div>
        </div>
    
  
        
						
	
<script> 
const slider = document.querySelector('.slider');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let scrollPos = 0;
let currentIndex = 0;
let lastIndex = slider.children.length - 1;

function slideTo(index) {
  slider.scrollTo({
    left: slider.children[index].offsetLeft,
    behavior: 'smooth'
  });
  currentIndex = index;
}

prevBtn.addEventListener('click', () => {
  if (currentIndex > 0) {
    slideTo(currentIndex - 1);
  } else {
    slideTo(lastIndex);
  }
});

nextBtn.addEventListener('click', () => {
  if (currentIndex < lastIndex) {
    slideTo(currentIndex + 1);
  } else {
    slideTo(0);
  }
});

setInterval(() => {
  if (currentIndex < lastIndex) {
    slideTo(currentIndex + 1);
  } else {
    slideTo(0);
  }
}, 5000);

</script>			
	<!-- end product Area -->

</body>


</html>