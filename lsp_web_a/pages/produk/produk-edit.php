<?php
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
<div class="container">
  <h3>Edit Produk</h3>

  <div class="col-6">
    <form action="" method="POST">
      <div class="mb-3">
        <label for="nama-produk" class="form-label">Nama Produk</label>
        <input type="text" name="nama-produk" id="nama-produk" class="form-control" value="<?= $result->namaproduk ?>" required>
      </div>
      <div class="mb-3">
        <label for="nama-produk" class="form-label">Deskripsi Produk</label>
        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"><?= $result->deskripsi ?></textarea>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga Produk</label>
        <input type="number" name="harga" id="harga" class="form-control" value="<?= $result->harga ?>" required>
      </div>
      <button type="submit" name="simpan" class="btn btn-green-custom">Simpan</button>
    </form>
  </div>
</div>
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
					window.location = 'home.php?produk';
				</script>
				";
		} else {
			echo "
				<script>
					alert('Data gagal disimpan, ulangi!');
          window.location = 'home.php?produk-edit&id=$id';
				</script>
				";
		}
}
?>