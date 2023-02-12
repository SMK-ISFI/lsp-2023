<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/util.css">
</head>
<body>

  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/img/img-01.png" alt="IMG">
				</div>

				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Member Register
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nama" placeholder="Nama" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password-confirm" placeholder="Konfirmasi Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register">
							Register
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							Sudah punya akun! Login.
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>

			</div>
		</div>
	</div>
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
			scale: 1.1
		});
  </script>
</body>
</html>
<?php
require "config/Connection.php";

if (isset($_POST["register"])) {
	// Mendapatkan isi inputan pada form register
	$nama 						= $_POST["nama"];
	$email 						= $_POST["email"];
	$password 				= $_POST["password"];
	$confirmPassword	= $_POST["password-confirm"];

	// Proses cek password dan konfirmasi password
	if ($password === $confirmPassword) {
		// Proses simpan ke database
		$query = "INSERT INTO tb_users(nama, email, password) VALUES (?, ?, ?)";
		$data = $connect->prepare($query);
		$data->bindParam(1, $nama);
		$data->bindParam(2, $email);
		$data->bindParam(3, password_hash($password, PASSWORD_DEFAULT));
		$success = $data->execute();

		// Cek sukses masuk ke database
		if ($success) {
			echo "
				<script>
					alert('Pendaftaran berhasil. Silahkan Login!');
					window.location = 'index.php';
				</script>
				";
		} else {
			echo "
				<script>
					alert('Pendaftaran gagal, ulang!');
				</script>
				";
		}

	} else {
		echo "
			<script>
				alert('Password tidak sama!');
			</script>
			";
	}
}
?>