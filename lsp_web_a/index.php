<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
						Member Login
					</span>

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
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Daftar Akun Baru.
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

if (isset($_POST["login"])) {
	// Mendapatkan isi inputan pada form login
	$email 		= $_POST["email"];
	$password = $_POST["password"];

	// Proses cek email ke database
	$query = "SELECT * FROM tb_users WHERE email = ?";
	$data = $connect->prepare($query);
	$data->bindParam(1, $email);
	$data->execute();
	$result = $data->fetch(PDO::FETCH_OBJ);

	// Proses cek email
	if (isset($result->email)) {
		// Proses cek password
		if (password_verify($password, $result->password)) {
			session_start();
			$_SESSION["email"] = $result->email;

			echo "<meta http-equiv='refresh' content='1;url=pages/home.php'>";
		} else {
			echo "
				<script>
					alert('Password yang anda masukkan salah!');
				</script>
			";
		}
	} else {
		echo "
			<script>
				alert('Email tidak terdaftar!');
			</script>
		";
	}
}
?>