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
    <?php
    if (empty($_SESSION['data'])) {
        echo '<script>
        swal("", "Anda harus login", "error");
        setTimeout(() => {
            window.location="login.php"
        }, 2000);
        </script>';
    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Digital Entreprenuer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php if ($_SESSION['level'] == "admin") : ?>
                        <a class="nav-link" href="index.php">Home</a>
                        <a class="nav-link" href="member.php">Anggota</a>
                        <a class="nav-link" href="produk.php">Produk</a>
                        <a class="nav-link" href="admin.php">Akun</a>
                    <?php elseif ($_SESSION['level'] == "member") : ?>
                        <a class="nav-link" href="member_produk.php">Produk</a>
                        <a class="nav-link" href="member_akun.php">Akun</a>
                    <?php elseif ($_SESSION['level'] == "pemilik") : ?>
                        <a class="nav-link" href="produk.php">Produk</a>
                        <a class="nav-link" href="pemilik.php">Akun</a>
                    <?php else : ?>
                        <a class="nav-link" href="register.php">Register</a>
                        <a class="nav-link" href="login.php">Login</a>
                    <?php endif ?>
                    <a class="nav-link" href="logout.php">Logout</a>

                </div>
            </div>
        </div>
    </nav>