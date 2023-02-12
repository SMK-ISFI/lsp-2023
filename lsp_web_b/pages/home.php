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
          <h4 class="text-center mb-5">Selamat datang di halaman dashboard School SMK ISFI Banjarmasin</h4>

          <div class="row">
            <div class="col-lg-3 col-sm-12">
              <p class="text-center">Jumlah Data Produk</p>
              <div class="card">
                <div class="card-body text-center">
                  <?php
                  $query = "SELECT COUNT(idproduk) AS jumlah FROM tb_produk";
                  $data  = $connect->prepare($query);
                  $data->execute();
                  $result = $data->fetch(PDO::FETCH_OBJ); 
                  ?>
                  <h5><?= $result->jumlah ?></h5>
                  <span>Produk</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>