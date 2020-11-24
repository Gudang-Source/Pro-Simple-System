<?php include 'header.php' ?>

<div class="container">
  <h2 class="mt-5 mb-5 text-center">Selamat Datang di Digital Entreprenuer</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="card-body bg-light">
        <?php
        $data = $con->get('tb_pemilik', '*', ['pemilik_id' => 1]);
        ?>
        <form enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="">Username</label>
            <input type="hidden" name="pemilik_id" value="<?= $data['pemilik_id'] ?>">
            <input name="pemilik_username" type="text" value="<?= $data['pemilik_username'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input name="pemilik_password" type="text" value="<?= $data['pemilik_password'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input name="pemilik_nama" type="text" value="<?= $data['pemilik_nama'] ?>" class="form-control" required>
          </div>
          <button class="btn btn-primary" name="simpan">Update</button>
        </form>
        <?php
        if (isset($_POST['simpan'])) {

          $simpan = $con->update('tb_pemilik', array(
            'pemilik_username' => $_POST['pemilik_username'],
            'pemilik_password' => $_POST['pemilik_password'],
            'pemilik_nama' => $_POST['pemilik_nama']
          ), ['pemilik_id' => '1']);

          if ($simpan) {
            header('location:pemilik.php');
          } else {
            echo '<script>swal("", "Data tidak terupdate", "error");</script>';
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