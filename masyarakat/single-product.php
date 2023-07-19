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
							<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
							<li class="nav-item submenu dropdown active">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
									<li class="nav-item active"><a class="nav-link" href="single-product.html">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="contact.html"><?=$_SESSION['nama']?></a></li>
						</ul>
						
					</div>
				</div>
			</nav>
		</div>
		
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="home.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!-- Tabel barang yang dipilih -->
	<?php
  if(isset($_GET['id_lelang'])) { 
    if($_GET['status_lelang'] == 'OPEN') {   
		
?>


        <tbody>
        <?php 
          include "../koneksi.php";
          $qry_barang=mysqli_query($conn,"select * from barang where id = $_GET[id_lelang]");
          
          if($data=mysqli_fetch_array($qry_barang)) {
          ?>
         
          <?php
          }
          ?>
        </tbody>
      </table>
      <div class="mt-2">
     
        </form>
        <!-- tawar menawar -->
        <?php
          if(isset($_POST['tawar'])) {        
            // $id_pet = 0;
            $id_brg = $data['id'];
            $id_mas = $_SESSION['id'];
            $harga = $_POST['harga_tawar'];
            $tanggal = date('Y-m-d'); 
            // $harga_awal = $data['harga_awal'];

            $query2 = mysqli_query($conn, "select max(penawaran_harga) as tertinggi from lelang where id_barang=$id_brg");
            if($data2 = mysqli_fetch_array($query2)) $tertinggi = "$data2[tertinggi]";
            else $tertinggi = 0;

            if($harga > $data['harga_awal']) {
              if($harga > $tertinggi) {
                $sql = "INSERT INTO `lelang`(`id_barang`, `tgl_lelang`, `penawaran_harga`, `id_masyarakat`) VALUES ('$id_brg','$tanggal','$harga','$id_mas')";
                $query = mysqli_query($conn, $sql);
                // meta bisa menjadi pengganti header
                echo "<meta http-equiv='Refresh' content='1; URL=./single-product.php?id_lelang=$_GET[id_lelang]&status_lelang=$_GET[status_lelang]'>";
              } else {
                $num = number_format($data2['tertinggi']);
                echo "<h3 class='text-dark mt-2'>Tidak boleh dibawah penawaran tertinggi Rp.$num</h3>";
              }  
            } else {
              $num = number_format($data['harga_awal']);
              echo "<h3 class='text-dark mt-2'>Tidak boleh dibawah harga awal Rp.$num</h3>";
            }
          }  
        ?>
        <!-- end tawar menawar -->
      </div>
      <!-- tampil siapa aja yang nawar -->
    
      <table class="table">
        <thead>
        
        </thead>
        <tbody>
          <?php
            include "../koneksi.php";
            $sql = "SELECT * FROM lelang, masyarakat where id_barang = $_GET[id_lelang] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
            $qry_tawar = mysqli_query($conn, $sql);
            $no = 0;
            while($data_tawar=mysqli_fetch_array($qry_tawar)) {            
           ?>
          <tr>
         
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <!-- end -->
    </div>
  </div>
</div>
<?php
    } elseif($_GET['status_lelang'] == 'CLOSE') {
		
?>
<
      

        <tbody>
		<?php 
          include "../koneksi.php";
          $qry_barang=mysqli_query($conn,"select * from barang where id = $_GET[id_lelang]");
          
          if($data=mysqli_fetch_array($qry_barang)) {
          ?>
         
          <?php
          }
          ?>
          <?php
		  
            include "../koneksi.php";
			
            $sql = "SELECT * FROM lelang, masyarakat where id_barang = $_GET[id_lelang] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
            $qry_tawar = mysqli_query($conn, $sql);
            $no = 0;
            while($data_tawar=mysqli_fetch_array($qry_tawar)) {            
            $no++; ?>
       
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
	<?php
		} else {
			
	  }
	}
?>

<?php
    if($_GET['status_lelang'] == 'SOLD') {
	
?>

      

        <tbody>
		<?php 
          include "../koneksi.php";
          $qry_barang=mysqli_query($conn,"select * from barang where id = $_GET[id_lelang]");
          
          if($data=mysqli_fetch_array($qry_barang)) {
          
         
         
          }
          ?>
          <?php
		  
            include "../koneksi.php";
			
            $sql = "SELECT * FROM lelang, masyarakat where id_barang = $_GET[id_lelang] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
            $qry_tawar = mysqli_query($conn, $sql);
            $no = 0;
            while($data_tawar=mysqli_fetch_array($qry_tawar)) {            
            $no++; ?>
       
          <?php
          }
		}
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
	
	

        <!-- end tawar menawar -->
	<!--================End Single Product Area =================-->

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

					<!-- Collect the nav links, forms, and other content for toggling -->
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
                            <li class="nav-item active"><a class="nav-link" href="home.php">Home</a></li>


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
	<!-- End Header Area -->

	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="../foto_barang/<?=$data['foto']?>" alt="">
					
				
						
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?=$data['nama_barang']?></h3>
						<h2>Rp.<?=number_format($data['harga_awal'])?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Status</span> : <?=$data['status']?></a></li>
							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul>
						<p><?=substr($data['deskripsi_barang'], 0, 500)?></p>

<style>
.rounded-input {
  padding:12px;
  border-radius:10px;
  font-family:inherit;
  font-size: inherit;
  width:75%;
} 





</style>


							
      
		  <?php
		  
		
    if($_GET['status_lelang'] == 'SOLD') {
	
?>
  <input type="number" class="rounded-input" name="harga_tawar" placeholder="Harga Penawaran">
          <button  type="" class="genric-btn disable radius" name="tawar">Tawar</button>
		  <?php
	}
	?>

	<?php
	
    if($_GET['status_lelang'] == 'CLOSE') {
	
?>
  <input type="number" class="rounded-input" name="harga_tawar" placeholder="Harga Penawaran">
          <button  type="" class="genric-btn disable radius" name="tawar">Tawar</button>
		  <?php
		  
		}  
		if($_GET['status_lelang'] == 'OPEN') {
			
			?>
			  <form action="" method="POST">
          <input type="number" class="rounded-input" name="harga_tawar" placeholder="Harga Penawaran">
			<button  type="submit" class="genric-btn  primary radius" name="tawar">Tawar</button>
<?php
		  
	}
		  ?>
        </form>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				
				<li class="nav-item" id="myTabContent">
					<a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Tawaran</a>
				</li>
				
				
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
						<?php
            include "../koneksi.php";
            $sql = "SELECT * FROM lelang, masyarakat where id_barang = $_GET[id_lelang] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
            $qry_tawar = mysqli_query($conn, $sql);
          
            while($data_tawar=mysqli_fetch_array($qry_tawar)) {            
             ?>
          <tr>
           
            
            
          </tr>
          
							<tbody>
								<tr>
									<td>
										<h5><?=$data_tawar['nama']?></h5>
									</td>
									<td>
										<h5>Rp.<?=number_format($data_tawar['penawaran_harga'])?></h5>
									</td>
                                    <td>
                                        <h5><?=$data_tawar['status']?></h5>

                                        <?php
          }
          ?>
                                    </td>
								</tr>

			
				
	

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>