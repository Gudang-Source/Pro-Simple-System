<?php include 'header.php' ?>

<div class="container">
  <h2 class="mt-5 mb-5 text-center">Digital Entreprenuer</h2>
  <div class="lastCol row">
    <div class="col-md-6">
      <div class="card-body bg-light">
        <h4>Daftarkan Produk Anda</h4>
        <form enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="">Nama Produk</label>
            <input name="nama" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Harga</label>
            <input name="harga" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Img</label>
            <input name="img" type="file" class="form-control-file" required>
          </div>
          <div class="form-group">
            <label for="">Jenis</label>
            <select name="jenis" required name="level" class="form-control" id="level">
              <option value="">Pilih</option>
              <option value="Admin">Admin</option>
              <option value="Member">Member</option>
              <option value="Pemilik">Pemilik</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="ket" id="" cols="3" rows="3" class="form-control" required></textarea>
          </div>
          <button class="btn btn-primary" name="simpan">Tambah</button>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
          $gambar = $_FILES['img'];
          $lokas = "./img/";
          $namaImg = fileUpload($gambar, $lokas);
          $simpan = $con->insert('tb_produk', array(
            'member_id' => '1',
            'produk_nama' => $_POST['nama'],
            'produk_jenis' => $_POST['jenis'],
            'produk_ket' => $_POST['ket'],
            'produk_harga' => $_POST['harga'],
            'produk_img' => $namaImg,
            'produk_status' => 0
          ));

          if ($simpan) {
            echo '<script>swal("", "Data tersimpan", "success");</script>';
          } else {
            echo '<script>swal("", "Data tidak tersimpan", "error");</script>';
          }
        }
        ?>
      </div>
    </div>
  </div>
  <h4 class="mt-5 ">Produk yang di Daftarkan</h4>
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
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $con->select('tb_produk', '*', ['member_id' => '1']);
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