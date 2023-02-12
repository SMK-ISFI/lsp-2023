<?php
// Cek hak akses menggunakan session
session_start();
if (!isset($_SESSION["email"])) {
  echo "
      <script>
        alert('Anda harus login!');
        window.location = '../index.php';
      </script>
    ";
}
// Memasukkan koneksi
require "../config/Connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <!-- Sidebar -->
      <?php include "sidebar.php" ?>
      <!-- End Sidebar -->

      <div class="col py-3">
        <div class="container">
          <h3>Halaman Kelola Data Produk</h3>

          <a href="produk-tambah.php" class="btn btn-md btn-green-custom mb-3">Tambah Produk</a>

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
                $query = "SELECT * FROM tb_produk";
                $data  = $connect->prepare($query);
                $data->execute();
                $results = $data->fetchAll(PDO::FETCH_OBJ);
                foreach ($results as $show) {
                ?>
                <tr>
                  <td><?= $show->idproduk ?></td>
                  <td><?= $show->namaproduk ?></td>
                  <td><?= $show->deskripsi ?></td>
                  <td>Rp. <?= number_format($show->harga, 2, ', ', '.') ?></td>
                  <td><img src="../img/<?= $show->gambar ?>" alt="" class="img-thumbnail" width="100"></td>
                  <td>
                    <a href="produk-edit.php?id=<?= $show->idproduk ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="produk-hapus.php?id=<?= $show->idproduk ?>" class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>