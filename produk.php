<?php include 'header.php' ?>

<div class="container">
  <h2 class="mt-5 mb-5 text-center">Produk yang di Daftarkan Digital Entreprenuer</h2>
  <button class="btn btn-primary mt-3 mb-3" onclick="window.print()">Cetak Produk</button>
  <table class="mb-5 table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Jenis</th>
        <th>Keterangan</th>
        <th>Harga</th>
        <th>Img</th>
        <th>Status</th>
        <th class="lastCol"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $con->select('tb_produk', '*');
      ?>
      <?php foreach ($data as $no => $row) : ?>
        <tr>
          <td><?= ++$no ?></td>
          <td><?= $row['produk_nama'] ?></td>
          <td><?= $row['produk_jenis'] ?></td>
          <td><?= $row['produk_ket'] ?></td>
          <td><?= $row['produk_harga'] ?></td>
          <td><img style="width: 150px;" src="./img/<?= $row['produk_img'] ?>" alt=""></td>
          <td><?= ($row['produk_status'] == 0) ? 'Belum Di Konfirmasi' : 'Sudah Di Konfirmasi' ?></td>
          <td class="lastCol">
            <?php if ($row['produk_status'] == 1) : ?>
              <form method="post">
                <input type="hidden" name="id" value="<?= $row['produk_id'] ?>">
                <button class="btn btn-primary btn-sm" name="konfirmasi">Batal Konfirmasi</button>
              </form>
              <?php
              if (isset($_POST['konfirmasi'])) {
                $update = $con->update('tb_produk', array(
                  'produk_status' => 0,
                ), ['produk_id' => $_POST['id']]);
                if ($update) {
                  header('location:produk.php');
                } else {
                  header('location:produk.php');
                }
              }
              ?>
            <?php else : ?>
              <form method="post">
                <input type="hidden" name="id" value="<?= $row['produk_id'] ?>">
                <button class="btn btn-primary btn-sm" name="konfirmasi">Konfirmasi</button>
              </form>
              <?php
              if (isset($_POST['konfirmasi'])) {
                $update = $con->update('tb_produk', array(
                  'produk_status' => 1,
                ), ['produk_id' => $_POST['id']]);
                if ($update) {
                  header('location:produk.php');
                } else {
                  header('location:produk.php');
                }
              }
              ?>
            <?php endif ?>
          </td>
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