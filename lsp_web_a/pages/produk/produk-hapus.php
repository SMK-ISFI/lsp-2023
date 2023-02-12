<?php

/**
 * Mendapatkan data produk yang di hapus dari database berdasarkan id yang dikirim dari url
 */ 
$id = $_GET["id"];
$query = "SELECT * FROM tb_produk WHERE idproduk = ?";
$data  = $connect->prepare($query);
$data->bindParam(1, $id);
$data->execute();
$result = $data->fetch(PDO::FETCH_OBJ);

// hapus gambar dari folder
unlink("../img/$result->gambar");
$query2 = "DELETE FROM tb_produk WHERE idproduk = ?";
$data2 = $connect->prepare($query2);
$data2->bindParam(1, $id);
$success = $data2->execute();

if ($success) {
  echo "
    <script>
      alert('Data produk berhasil dihapus!');
      window.location = 'home.php?produk';
    </script>
    ";
} else {
  echo "
    <script>
      alert('Data gagal dihapus, ulangi!');
    </script>
    ";
}