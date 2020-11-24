<?php include 'koneksi.php';
include 'MY_url_helper.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="style.css">

  <title>Simple System</title>
  <script src="./sweet.js"></script>

  <link rel="stylesheet" media="print" href="print.css" />
</head>

<body class="">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Digital Entreprenuer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="register.php">Register</a>
          <a class="nav-link" href="login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <h2 class="mt-5 mb-5 text-center">Login</h2>
    <div class="row">
      <div class="col-md-4 offset-4">
        <div class="card-body bg-light">
          <form method="post">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Level</label>
              <select name="level" class="form-control" id="level">
                <option value="">Pilih</option>
                <option value="admin">Admin</option>
                <option value="member">Member</option>
                <option value="pemilik">Pemilik</option>
              </select>
            </div>
            <button name="login" class="btn btn-primary">Login</button>
          </form>
          <?php
          if (isset($_POST['login'])) {
            if ($_POST['level'] == "member") {
              $cekUsername = $con->get('tb_member', '*', array(
                'member_username' => $_POST['username']
              ));
              if ($cekUsername['member_password'] == $_POST['password']) {;
                $_SESSION['data'] = $cekUsername;
                $_SESSION['level'] = "member";
                echo '<script>
              swal("", "Anda berhasil login", "success");
              setTimeout(() => {
                window.location="index.php"
              }, 1000);
              </script>';
              } else {
                echo '<script>swal("", "Username / Password Salah", "error");</script>';
              }
            } elseif ($_POST['level'] == "admin") {
              $cekUsername = $con->get('tb_admin', '*', array(
                'admin_username' => $_POST['username']
              ));

              if ($cekUsername['admin_password'] == $_POST['password']) {;
                $_SESSION['data'] = $cekUsername;
                $_SESSION['level'] = "admin";
                echo '<script>
              swal("", "Anda berhasil login", "success");
              setTimeout(() => {
                window.location="index.php"
              }, 1000);
              </script>';
              } else {
                echo '<script>swal("", "Username / Password Salah", "error");</script>';
              }
            } elseif ($_POST['level'] == "pemilik") {
              $cekUsername = $con->get('tb_admin', '*', array(
                'pemilik_username' => $_POST['username']
              ));
              if ($cekUsername['pemilik_password'] == $_POST['password']) {;
                $_SESSION['data'] = $cekUsername;
                $_SESSION['level'] = "pemilik";
                echo '<script>
              swal("", "Anda berhasil login", "success");
              setTimeout(() => {
                window.location="index.php"
              }, 1000);
              </script>';
              } else {
                echo '<script>swal("", "Username / Password Salah", "error");</script>';
              }
            }
          }
          ?>
        </div>
      </div>
    </div>

  </div>

  <footer>

  </footer>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>