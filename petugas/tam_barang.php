<?php include "navbar.php" ; ?>

<div class="page-header">
  <h3 class="page-title">Data Barang</h3>
</div>

<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Daftar Barang</h4>
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
          $qry_barang=mysqli_query($conn,"select * from barang");
          $no=0;
          while($data=mysqli_fetch_array($qry_barang)) {
          $no++; ?>
          <tr>
            <td><?=$no?>.</td>
            <td><?=$data['nama_barang']?></td>
            <td><?=$data['tanggal']?></td>
            <td>Rp.<?=number_format($data['harga_awal'])?></td>
            <td><?=substr($data['deskripsi_barang'], 0, 20)?>...</td>
            <td><?=$data['status']?></td>
            <td><img src="../foto_barang/<?=$data['foto']?>" align="right "
            alt="<?=$data['nama_barang']?>"></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>