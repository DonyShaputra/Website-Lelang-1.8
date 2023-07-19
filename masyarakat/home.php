<?php include "navbar.php" ?>




  
    


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   
    <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

<!--
  - custom css link
-->
<link rel="stylesheet" href="./assets/css/style-prefix.css">

<!--
  - google font link
-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
  rel="stylesheet">

    </head>

    <div class="container">
      
<!-- Tabel barang yang dipilih -->
<?php
  if(isset($_GET['id_lelang'])) { 
    if($_GET['status_lelang'] == 'OPEN') {   
?>
<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Proses Lelang</h4>
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Barang</th>
            <th>Tanggal Daftar</th>
            <th>Harga Awal</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Foto</th>
          </tr>
        </thead>

        <tbody>
        <?php 
          include "../koneksi.php";
          $qry_barang=mysqli_query($conn,"select * from barang where id = $_GET[id_lelang]");
          $no=0;
          if($data=mysqli_fetch_array($qry_barang)) {
          $no++; ?>
          <tr>
            <td><?=$no?>.</td>
            <td><?=$data['nama_barang']?></td>
            <td><?=$data['tanggal']?></td>
            <td>Rp.<?=number_format($data['harga_awal'])?></td>
            <td><?=substr($data['deskripsi_barang'], 0, 20)?>...</td>
            <td><?=$data['status']?></td>
            <td><img src="../foto_barang/<?=$data['foto']?>" 
            alt="<?=$data['nama_barang']?>"></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <div class="mt-2">
        <form action="" method="POST">
          <input type="number" name="harga_tawar" placeholder="Harga Penawaran">
          <button type="submit" class="btn btn-success" name="tawar">Tawar</button>
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
                echo "<meta http-equiv='Refresh' content='1; URL=./home.php?id_lelang=$_GET[id_lelang]&status_lelang=$_GET[status_lelang]'>";
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
      <h1 class="text-dark mb-2">Penawaran</h1>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include "../koneksi.php";
            $sql = "SELECT * FROM lelang, masyarakat where id_barang = $_GET[id_lelang] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
            $qry_tawar = mysqli_query($conn, $sql);
            $no = 0;
            while($data_tawar=mysqli_fetch_array($qry_tawar)) {            
            $no++; ?>
          <tr>
            <td><?=$no?></td>
            <td><?=$data_tawar['nama']?></td>
            <td>Rp.<?=number_format($data_tawar['penawaran_harga'])?></td>
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
    } elseif($_GET['status_lelang'] == 'SOLD') {
?>
<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Hasil Lelang</h4>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>PEMENANG</th>
          </tr>
        </thead>

        <tbody>
          <?php
            include "../koneksi.php";
            $sql = "SELECT * FROM lelang, masyarakat where id_barang = $_GET[id_lelang] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
            $qry_tawar = mysqli_query($conn, $sql);
            $no = 0;
            while($data_tawar=mysqli_fetch_array($qry_tawar)) {            
            $no++; ?>
          <tr>
            <td><?=$no?></td>
            <td><?=$data_tawar['nama']?></td>
            <td>Rp.<?=number_format($data_tawar['penawaran_harga'])?></td>

            <td><?=$data_tawar['status']?></td>
          </tr>
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
		  echo "<h1 class='text-dark mb-3'>Penawaran tidak dibuka!</h1>";
	  }
	}
?>
<!-- End barang yg dipilih-->

<!-- Daftar Semua Barang -->

       
         <!DOCTYPE html>
<html>
  <head>
	
    <style>
      /* CSS untuk border */
	  
      .barang {
        
        padding: 10px;
        margin: 10px;
        max-width: 300px;
        max-height: 450px;
      
        float: left;
      }

      .barang img {
        width: 280px;
        height: 250px;
      }

      .barang .nama {
        font-size: 20px;
        font-weight: bold;
        margin-top: 10px;
      }

      .barang .harga {
        font-size: 18px;
        color: red;
        margin-top: 10px;
      }

      .barang .deskripsi {
        font-size: 16px;
        margin-top: 10px;
      }

      .barang .beli {
        display: block;
        background-color: #ff8f9c;
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: 10px;
        text-decoration: none;
        font-size: 16px;
      }

      .barang .beli:hover {
        background-color: #6487c8;
      }
    </style>
  
        <?php 
          include "../koneksi.php";
          $qry_barang=mysqli_query($conn,"select * from barang");
          $no=0;
          while($data=mysqli_fetch_array($qry_barang)) {
          $no++; ?>
          
         
					<!-- single product -->
          
   
					<div class="barang">
						<div class="single-product">
							<img class="img-fluid" src="../foto_barang/<?=$data['foto']?>" alt="">
							<div class="product-details">
								<h6><?=$data['nama_barang']?></h6>
								<div class="price">
									<h6>Rp.<?=number_format($data['harga_awal'])?></h6>
									<h6 class=""><?=$data['status']?></h6>
								</div>
								<div class="prd-bottom">

									<a href="single-product.php?id_lelang=<?=$data['id']?>&status_lelang=<?=$data['status']?>" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text" >Tawar</p>
									</a>

                  </div>
								</div>
							</div>
						</div>
  
          
           

            
 

          
         
          
          <?php
          }
          ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>








	
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<!-- End -->

  