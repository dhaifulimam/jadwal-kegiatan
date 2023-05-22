<?php

require 'functions.php';

$id = $_GET["id"];

if (deljad($id) > 0) {
    echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = '../admin/jadwal.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = '../admin/jadwal.php';
            </script>
        ";
}
