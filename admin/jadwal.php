<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

$nama = $_SESSION["login"];

require '../function/functions.php';

$datakop = query("SELECT * FROM jadket");

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
    <link rel="stylesheet" href="css/jadwalStl.css">
    <title>admin page</title>
</head>

<body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <img src="../logodinascilegon/logo.png" alt="logo">
            <a class="navbar-brand" href="../homepage/home.php">Dinas Koperasi Dan UMKM kota Cilegon</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="admin-page.php">Home</a>
                    <a class="nav-item nav-link" href="tambah.php">Tambah Kegiatan</a>
                    <a class="nav-item btn btn-success tombol" href="logout.php">logout</a>
                </div>
            </div>
        </div>
    </nav>



    <div class="container agenda">
        <br>
        <a class="nav-item btn btn-primary admin" href="tambahket.php">tambah kegiatan</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">jam</th>
                    <th scope="col">kegiatan</th>
                    <th scope="col">opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datakop as $dt) : ?>
                    <tr>
                        <th><?= substr($dt["jam"], 0, 5); ?></th>
                        <td><?= $dt["kegiatan"]; ?></td>
                        <td>
                            <a class="nav-item btn btn-warning admin" href="../function/ubahFunction.php?id=<?= $dt["id"]; ?>">ubah</a>
                            <a class="nav-item btn btn-danger admin" href="../function/deletejadwal.php?id=<?= $dt["id"]; ?>">hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>

    <script src=""></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>