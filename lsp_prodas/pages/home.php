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
                <li><a href="../index.php" class="nav-link">Logout</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <div class="banner"></div>

    <div class="container py-5 mb-4">
      <div class="banner-text text-center">
        <h1>Warung Makan Sederhana</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam quaerat consequatur quia, aspernatur officiis a consectetur! Excepturi facere soluta provident voluptates possimus necessitatibus repellendus delectus ullam, est, laboriosam, quasi officiis!</p>
      </div>
    </div>

    <div class="container mb-4">
      <h2 class="text-center mb-4">Daftar Makanan</h2>
      <div class="row">
        <?php
        require "../data/produk.php";
        foreach ($produk as $tampil => $data) {
        ?>
        <div class="col-lg-4 col-sm-12">
          <div class="card h-100">
            <img src="../assets/img/<?= $data[2] ?>" class="card-img-top" alt="<?= $data[2] ?>" height="200">
            <div class="card-body">
              <h5 class="card-title"><?= $data[0] ?></h5>
              <h4>Rp. <?= $data[1] ?></h4>
            </div>
            <div class="card-footer">
              <a href="transaksi.php?id=<?= $tampil ?>" class="btn btn-process">Pilih</a>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
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
  </body>
</html>
