<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold"> Admin Argon Lelang</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="barang.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Barang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="Masyarakat.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Masyarakat</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="petugas.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Petugas</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
       </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need New Barang</h6>
            <p class="text-xs font-weight-bold mb-0">Please add here</p>
          </div>
        </div>
      </div>
           <a href="barang_tambah.php" class="btn btn-dark btn-sm w-100 mb-3">Tambah Barang</a>
      </div>
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
   <!-- End Navbar -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                Sayo Kravits
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Public Relations
              </p>
            </div>
          </div>
       </div>
      </div>
    </div>
    <?php
include ('koneksi.php');
$id = $_GET['id'];
$show = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");
$data = mysqli_fetch_array($show);

?>
    <div class="container-fluid py-4">
      <div class="row">
        <div >
          <div class="card">
            
            <div class="card-body">
              <p class="text-uppercase text-sm">Edit Barang</p>
              <div class="row">
                  <div class="form-group" >
                    <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <label class="form-control-label"  >Nama Barang</label>
                    <input name="nama_barang"  type="text" placeholder="Masukkan Nama Barang" required class="form-control" value="<?php echo $data['nama_barang']  ?>">
                    <label class="form-control-label">Tanggal Daftar</label>
                    <input name="tanggal"  type="date" placeholder="Masukkan Tanggal" required class="form-control" value="<?php echo $data['tanggal']  ?>">
                    <label class="form-control-label">Harga Awal</label>
                    <input name="harga_awal"  type="text" placeholder="Masukkan Harga Awal" required class="form-control" value="<?php echo $data['harga_awal']  ?>">
                    <label class="form-control-label">Deskripsi Barang</label>
                    <input name="deskripsi_barang"  type="text" placeholder="Masukkan Deskripsi Barang" required class="form-control" value="<?php echo $data['deskripsi_barang']  ?>">
                    <label class="form-control-label">Foto</label>
                    <input type="file" name="foto" id="img" class="form-control" required class="form-control">
           
                    </div>
              </div>

              <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
              <a href="barang.php" class="btn btn-secondary">Batal</a>
           </form>

            </div>
          </div>
        </div>
 </div>
  </div>
   <?php
    include('koneksi.php');
    if (isset($_POST['edit'])) { //proses simpan data barang
        $id = $_POST['id'];

        $nama_barang = $_POST['nama_barang'];
        $tanggal = $_POST['tanggal'];
        $harga_awal = $_POST['harga_awal'];
        $deskripsi_barang = $_POST['deskripsi_barang'];

        $foto = $_FILES['foto'];
    $foto_nama = $_FILES['foto']['name'];
   $foto_size = $_FILES['foto']['size'];
   $foto_tmp_name = $_FILES['foto']['tmp_name'];
    }
//    $foto_petugas_folder = 'upload-foto-siswa/'.$foto_petugas;

   if(isset($foto)){
    if($foto_size > 4044070){
        echo '
        <script>
          alert("Maaf , Ukuran foto siswa anda terlalu besar !");
          window.history.go(-1);
        </script>
        ';
    }else{
        move_uploaded_file( $foto_tmp_name,'upload-barang-foto/'.$foto_nama);
    $edit = mysqli_query($koneksi, 'UPDATE barang SET nama_barang="'.$nama_barang.'", tanggal="'.$tanggal.'" , harga_awal="'.$harga_awal.'" ,deskripsi_barang="'.$deskripsi_barang.'"  ,foto="'.$foto_nama.'" WHERE id="'.$id.'"');
      if ($edit){
        echo '
        <script>
        alert("Berhasil Mengubah Data Barang !");
        window.location="barang.php"; //menuju ke halaman barang
        </script>
        ';
      }
      }
    }
?>    
              
         
 <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>