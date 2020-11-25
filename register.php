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
  <div class="container mb-5">
    <h2 class="mt-5 mb-5 text-center">Register</h2>
    <div class="row">
      <div class="col-md-6 offset-3">
        <div class="card-body bg-light">
          <form enctype="multipart/form-data" method="post">
            <div class="form-group">
              <label for="">Username</label>
              <input name="member_username" type="text" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input name="member_password" type="password" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Nama</label>
              <input name="member_nama" type="text" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input name="member_email" type="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Alamat</label>
              <textarea class="form-control" name="member_alamat" id="" cols="10" rows="3" class="form-control" required></textarea>
            </div>
            <button class="btn btn-primary" name="simpan">Register</button>
          </form>
          <?php
          if (isset($_POST['simpan'])) {
            $simpan = $con->insert('tb_member', array(
              'member_username' => $_POST['member_username'],
              'member_password' => $_POST['member_password'],
              'member_nama' => $_POST['member_nama'],
              'member_email' => $_POST['member_email'],
              'member_alamat' => $_POST['member_alamat']
            ));

            if ($simpan) {
              echo '<script>
              swal("", "Data tersimpan, silakan login", "success");
              setTimeout(() => {
                window.location="login.php"
              }, 3000);
              </script>';
            } else {
              echo '<script>swal("", "Data tidak tersimpan", "error");</script>';
            }
          }
          ?>
        </div>
      </div>
      <script>

      </script>
    </div>

  </div>

  <footer>

  </footer>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>