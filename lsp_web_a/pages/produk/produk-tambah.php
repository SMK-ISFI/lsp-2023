<div class="container">
  <h3>Tambah Produk</h3>

  <div class="col-6">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama-produk" class="form-label">Nama Produk</label>
        <input type="text" name="nama-produk" id="nama-produk" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="nama-produk" class="form-label">Deskripsi Produk</label>
        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga Produk</label>
        <input type="number" name="harga" id="harga" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="gambar" class="form-label">Gambar Produk</label>
        <input type="file" name="gambar" id="gambar" class="form-control" required>
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

  // Mendapatkan informasi gambar
  $namaGambar = $_FILES["gambar"]["name"];
  $tempGambar = $_FILES["gambar"]["tmp_name"];

  // Upload gambar ke folder img
  move_uploaded_file($tempGambar, "../img/$namaGambar");
  
  // Simpan data ke database
  $query = "INSERT INTO tb_produk(namaproduk, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)";
  $data  = $connect->prepare($query);
  $data->bindParam(1, $namaProduk); 
  $data->bindParam(2, $deskripsi);
  $data->bindParam(3, $harga); 
  $data->bindParam(4, $namaGambar);
  $success = $data->execute();
  
  // Cek sukses masuk ke database
		if ($success) {
			echo "
				<script>
					alert('Data produk berhasil disimpan!');
					window.location = 'home.php?produk';
				</script>
				";
		} else {
			echo "
				<script>
					alert('Data gagal disimpan, ulangi!');
				</script>
				";
		}
}
?>