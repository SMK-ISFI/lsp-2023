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
/**
 * Mendapatkan produk yang di edit dari database berdasarkan id yang dikirim dari url
 */ 
$id = $_GET["id"];
$query = "SELECT * FROM tb_produk WHERE idproduk = ?";
$data  = $connect->prepare($query);
$data->bindParam(1, $id);
$data->execute();
$result = $data->fetch(PDO::FETCH_OBJ);
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
          <h3>Edit Produk</h3>

          <div class="col-6">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="nama-produk" class="form-label">Nama Produk</label>
                <input type="text" name="nama-produk" id="nama-produk" value="<?= $result->namaproduk ?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="nama-produk" class="form-label">Deskripsi Produk</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"><?= $result->deskripsi ?></textarea>
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk</label>
                <input type="number" name="harga" id="harga" value="<?= $result->harga ?>" class="form-control" required>
              </div>
              <button type="submit" name="simpan" class="btn btn-green-custom">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if (isset($_POST["simpan"])) {
  // Medapatkan isi inputan pada form
  $namaProduk = $_POST["nama-produk"];
  $deskripsi  = $_POST["deskripsi"];
  $harga      = $_POST["harga"];
  
  // Simpan data ke database
  $query = "UPDATE tb_produk SET namaproduk=?, deskripsi=?, harga=? WHERE idproduk=?";
  $data  = $connect->prepare($query);
  $data->bindParam(1, $namaProduk); 
  $data->bindParam(2, $deskripsi);
  $data->bindParam(3, $harga); 
  $data->bindParam(4, $id);
  $success = $data->execute();
  
  // Cek sukses masuk ke database
		if ($success) {
			echo "
				<script>
					alert('Data produk berhasil diedit!');
					window.location = 'produk.php';
				</script>
				";
		} else {
			echo "
				<script>
					alert('Data gagal disimpan, ulangi!');
          window.location = 'produk-edit.php?id=$id';
				</script>
				";
		}
}
?>