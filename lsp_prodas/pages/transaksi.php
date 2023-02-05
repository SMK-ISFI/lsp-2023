<?php
require "../data/produk.php";
$id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Warung Makan Sederhana</title>
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center position-relative">
          <div class="col-4">
            <div class="site-logo">
              <a href="index.html" class="font-weight-bold">
                Warung Makan Sederhana
              </a>
            </div>
          </div>

          <div class="col-8 text-right">
            <span class="d-inline-block d-lg-none"
              ><a
                href="#"
                class="text-primary site-menu-toggle js-menu-toggle py-5"
                ><span class="icon-menu h3 text-dark"></span></a
            ></span>

            <nav
              class="site-navigation text-right ml-auto d-none d-lg-block"
              role="navigation"
            >
              <ul class="site-menu main-menu js-clone-nav ml-auto">
                <li class="active">
                  <a href="home.php" class="nav-link">Beranda</a>
                </li>
                <li>
                  <a href="#" class="nav-link">Daftar Transaksi</a>
                </li>
                <li><a href="#" class="nav-link">Logout</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <div class="banner"></div>

    <div class="container py-5 mb-4">
      <div class="banner-text text-center">
        <h1>Transaksi</h1>
      </div>
    </div>

    <div class="container mb-4">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-12">
          <form>
            <div class="form-group">
              <label for="no-transaksi">No. Transaksi</label>
              <input type="text" name="no-transaksi" value="<?= mt_rand() ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama-customer">Nama Customer</label>
              <input type="text" name="nama-customer" class="form-control">
            </div>
            <div class="form-group">
              <label for="pilih-produk">Pilihan Makanan</label>
              <input type="text" name="pilih-produk" value="<?= $produk[$id][0] ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" name="harga" id="harga" value="<?= $produk[$id][1] ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="number" name="jumlah" id="jumlah" class="form-control">
            </div>
            <button type="button" onclick="hitungTotal()" class="btn btn-process mb-3">Hitung Total</button>
            <div class="form-group">
              <label for="total-harga">Total Harga</label>
              <input type="number" name="total-harga" id="total-harga" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="bayar">Pembayaran</label>
              <input type="number" name="bayar" id="bayar" class="form-control">
            </div>
            <button type="button" onclick="hitungKembalian()" class="btn btn-process mb-3">Hitung Kembalian</button>
            <div class="form-group">
              <label for="kembalian">Total Harga</label>
              <input type="number" name="kembalian" id="kembalian" class="form-control" readonly>
            </div>
            <button type="button" onclick="simpan()" class="btn btn-process mb-3">Simpan</button>
          </form>
        </div>
      </div>
    </div>

    <div class="footer py-2">
      <div class="container">
        <p class="mt-2 font-weight-normal">&copy; 2023 Warung Makan Sederhana</p>
      </div>
    </div>

    <!-- button back top -->
    <a
      id="back-to-top"
      href="#"
      class="btn btn-secondary btn-lg back-to-top"
      role="button"
      ><span class="icon-chevron-up"></span
    ></a>

    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.sticky.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
      const harga = document.getElementById("harga");
      const jumlah = document.getElementById("jumlah");
      const totalHarga = document.getElementById("total-harga");
      const bayar = document.getElementById("bayar");
      const kembalian = document.getElementById("kembalian");

      function hitungTotal() {
        if (jumlah.value === "" || jumlah.value < 0) {
          alert("Jumlah Harus Diisi");
        } else {
          let total = parseInt(harga.value) * parseInt(jumlah.value);
          totalHarga.value = total;
        }
      }

      function hitungKembalian() {
        if (bayar.value === "" || bayar.value < totalHarga.value) {
          alert("Pembayaran Kurang Dari Total Harga");
        } else {
          kembalian.value = parseInt(bayar.value) - parseInt(totalHarga.value);
        }
      }
      
      function simpan() {
        alert("Berhasil disimpan");
        window.location = "home.php";
      }
    </script>
  </body>
</html>
