<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPDB SMK ISFI Banjarmasin</title>
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
  </head>
  <body>
    
    <div class="container mt-5 py-4">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h2 class="text-center mb-2">Login</h2>
              <hr>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" name="login" class="btn btn-process mb-3">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.sticky.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>
<?php
if (isset($_POST["login"])) {
  if ($_POST["username"] === "admin" && $_POST["password"] === "12345") {
    header("location: pages/home.php");
  } else {
    echo "
    <script>
      alert('Username dan Password Salah');
    </script>
    ";
  }
}
?>