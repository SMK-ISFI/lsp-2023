<?php
$query = "SELECT COUNT(idproduk) AS jumlah FROM tb_produk";
$data  = $connect->prepare($query);
$data->execute();
$result = $data->fetch(PDO::FETCH_OBJ); 
?>
<div class="container">
  <h4 class="text-center mb-5">Selamat datang di halaman dashboard School SMK ISFI Banjarmasin</h4>

  <div class="row">
    <div class="col-lg-3 col-sm-12">
      <p class="text-center">Jumlah Data Produk</p>
      <div class="card">
        <div class="card-body text-center">
          <h5><?= $result->jumlah ?></h5>
          <span>Produk</span>
        </div>
      </div>
    </div>
  </div>
</div>