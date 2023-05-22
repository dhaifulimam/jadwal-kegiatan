<?php 

require 'functions.php';

$id = $_GET["id"];

        if(hapus($id) > 0 ) {
        echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = '../admin/admin-page.php';
            </script>
        ";
         }else {
        echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = '../admin/admin-page.php';
            </script>
        ";
        }

?>