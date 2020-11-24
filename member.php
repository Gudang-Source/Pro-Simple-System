<?php include 'header.php' ?>

<div class="container">
  <h2 class="mt-5 mb-5 text-center">Daftar Member Digital Entreprenuer</h2>
  <button class="btn btn-primary mt-3 mb-3" onclick="window.print()">Cetak Member</button>
  <table class="mb-5 table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Usrename</th>
        <th>Password</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $con->select('tb_member', '*');
      ?>
      <?php foreach ($data as $no => $row) : ?>
        <tr>
          <td><?= ++$no ?></td>
          <td><?= $row['member_username'] ?></td>
          <td><?= $row['member_password'] ?></td>
          <td><?= $row['member_nama'] ?></td>
          <td><?= $row['member_alamat'] ?></td>
          <td><?= $row['member_email'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<footer>

</footer>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>