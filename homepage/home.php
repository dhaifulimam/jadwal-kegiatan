<?php
require '../function/functions.php';

$datakop = query("SELECT * FROM koperasi");
$kegiatan = query("SELECT * FROM jadket");
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
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="../logodinascilegon/logo.png" alt="logo">
        <a class="navbar-brand" href="#">Dinas Koperasi Dan UMKM kota Cilegon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item btn btn-success tombol" href="../join/join.php">join us</a>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="row videopl">
            <div class="col">
                <?php foreach ($datakop as $dt) : ?>
                    <?php
                    $listvideo = [];
                    $listvideo = $dt["video_koperasi"];
                    ?>
                <?php endforeach; ?>
                <video src="../video/<?= $listvideo ?>" controls loop></video>

            </div>

            <div class="col">
                <div class="container agenda">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">jam</th>
                                <th scope="col">kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kegiatan as $jk) : ?>
                                <tr>
                                    <th><?= substr($jk["jam"], 0, 5); ?></th>
                                    <td><?= $jk["kegiatan"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="card">
            <div class="card-body d-flex justify-content-center">
                <blockquote class="blockquote mb-0">
                    <p>copyright dhaiful imam 2021</p>
                </blockquote>
            </div>
        </div>
    </div>


    <script src="js/gallery.js"></script>

    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>