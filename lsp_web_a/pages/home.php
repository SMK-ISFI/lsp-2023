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
        <?php
          if (isset($_GET["dashboard"])) 
          {
            include "dashboard.php";
          }
          elseif (isset($_GET["produk"]))
          {
            include "produk/produk.php";
          }
          elseif (isset($_GET["produk-tambah"]))
          {
            include "produk/produk-tambah.php";
          }
          elseif (isset($_GET["produk-edit"]))
          {
            include "produk/produk-edit.php";
          }
          elseif (isset($_GET["produk-hapus"]))
          {
            include "produk/produk-hapus.php";
          }
          else
          {
            include "dashboard.php";
          }
        ?>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>