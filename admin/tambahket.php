<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}


require '../function/functions.php';

if (isset($_POST["tamket"])) {

    if (tamket($_POST) > 0) {
        echo "<script>
                    alert('daftar berhasil');
                    document.location.href = 'jadwal.php';
                  </script>";
    } else {
        echo "<script>
                    alert('daftar gagal');
                  </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-Newuser.css">
    <title>tambah page</title>
</head>

<body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <img src="../logodinascilegon/logo.png" alt="logo">
            <a class="navbar-brand" href="admin-page.php">Dinas Koperasi Dan UMKM kota Cilegon</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="admin-page.php">Home<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="newuser.php">Tambah Admin</a>
                    <a class="nav-item btn btn-success tombol" href="logout.php">logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir nav bar -->

    <!-- form tambah -->
    <div class="container content">

        <h1 class="d-flex justify-content-center">Form Tambah Kegiatan</h1>

        <form action="" method="POST">
            <div class="form-group">
                <label for="jam">jam kegiatan</label>
                <input type="time" name="jam" class="form-control" id="jam" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="Nama">Nama Kegiatan</label>
                <input type="text" name="Nama" class="form-control" id="Nama" autocomplete="off" required>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" name="tamket" class="btn btn-success add">tambah</button>
            </div>
        </form>
    </div>
    <!-- akhir form tambah -->


    <!-- Optional JavaScript -->
    <script src=""></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>