<?php
$query = "SELECT * FROM tb_produk";
$data  = $connect->prepare($query);
$data->execute();
$results = $data->fetchAll(PDO::FETCH_OBJ); 
?>
<div class="container">
  <h3>Halaman Kelola Data Produk</h3>

  <a href="home.php?produk-tambah" class="btn btn-md btn-green-custom mb-3">Tambah Produk</a>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id Produk</th>
          <th>Nama Produk</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Gambar</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($results as $show) {
        ?>
        <tr>
          <td><?= $show->idproduk ?></td>
          <td><?= $show->namaproduk ?></td>
          <td><?= $show->deskripsi ?></td>
          <td>Rp. <?= number_format($show->harga, 2, ', ', '.') ?></td>
          <td><img src="../img/<?= $show->gambar ?>" alt="" class="img-thumbnail" width="100"></td>
          <td>
            <a href="home.php?produk-edit&id=<?= $show->idproduk ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="home.php?produk-hapus&id=<?= $show->idproduk ?>" class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>