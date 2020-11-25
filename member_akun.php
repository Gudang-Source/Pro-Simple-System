<?php include 'header.php' ?>

<div class="container">
  <h2 class="mt-5 mb-5 text-center">Member di Digital Entreprenuer</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="card-body bg-light">
        <?php
        $data = $con->get('tb_member', '*', ['member_id' => 1]);
        ?>
        <form enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="">Username</label>
            <input type="hidden" name="member_id" value="<?= $data['member_id'] ?>">
            <input name="member_username" type="text" value="<?= $data['member_username'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input name="member_password" type="text" value="<?= $data['member_password'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input name="member_nama" type="text" value="<?= $data['member_nama'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input name="member_email" type="email" value="<?= $data['member_email'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea class="form-control" name="member_alamat" cols="10" rows="3"><?= $data['member_alamat'] ?></textarea>
          </div>
          <button class="btn btn-primary" name="simpan">Update</button>
        </form>
        <?php
        if (isset($_POST['simpan'])) {

          $simpan = $con->update('tb_member', array(
            'member_username' => $_POST['member_username'],
            'member_password' => $_POST['member_password'],
            'member_nama' => $_POST['member_nama'],
            'member_email' => $_POST['member_email'],
            'member_alamat' => $_POST['member_alamat']
          ), ['member_id' => '1']);

          if ($simpan) {
            header('location:member_akun.php');
          } else {
            header('location:member_akun.php');
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