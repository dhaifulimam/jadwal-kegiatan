<?php
$conn = mysqli_connect("localhost", "root", "", "dinaskoperasi");


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah()
{
    global $conn;

    $hero = upload();

    if (!$hero) {
        return false;
    }

    $query = "INSERT INTO koperasi
                    VALUES
                 ('', '$hero')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload()
{
    $namaFile = $_FILES['video']['name'];
    $error = $_FILES['video']['error'];
    $tmpName = $_FILES['video']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                    alert('pilih video dulu');
                  </script>";
        return false;
    }

    $ekstensivideovalid = ['mp4', 'mpg', 'mkv', 'mpeg'];
    $ekstensivideo = explode('.', $namaFile);
    $ekstensivideo = strtolower(end($ekstensivideo));

    if (!in_array($ekstensivideo, $ekstensivideovalid)) {
        echo "<script>
                    alert('yang anda upload bukan video');
                  </script>";
        return false;
    }


    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensivideo;

    $nama_dir = '../video';

    move_uploaded_file($tmpName, "$nama_dir/$namaFilebaru");

    return $namaFilebaru;
}


function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM koperasi WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM pelayanan WHERE 
                    nik LIKE '%$keyword%' OR
                    nama LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%'
                    ";

    return query($query);
}

function daftar($data)
{

    global $conn;

    // $username = strtolower(stripslashes($data["username"]));
    $nama = $data["nama"];
    $username = $data["username"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username telah terdaftar');
                  </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
                    alert('password tidak sesuai');
                  </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    // $password = md5($password);

    mysqli_query($conn, "INSERT INTO user VALUES('','$nama', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function tamket($data)
{
    global $conn;
    $jam = $data["jam"];
    $nama = $data["Nama"];

    mysqli_query($conn, "INSERT INTO jadket VALUES('','$jam', '$nama')");

    return mysqli_affected_rows($conn);
}

function deljad($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM jadket WHERE id = $id");

    return mysqli_affected_rows($conn);
}
