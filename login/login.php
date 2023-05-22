<?php

session_start();
require '../function/functions.php';

if (isset($_SESSION["login"])) {
    header("Location: ../admin/admin-page.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // if ($password == $row["password"]) {

            $_SESSION["login"] = $row["nama"];

            header("Location: ../admin/admin-page.php");
            exit;
        }
    }

    $error = true;

    if ($error) {
        echo "
                    <script>
                         alert('username atau password salah');
                    </script>
                ";
    }
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="CSS/Stylelogin.css">
    <script src="https://kit.fontawesome.com/d6d01c45ff.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <img class="bg" src="img/1.png">
    <div class="container">

        <div class="logo">
            <img src="img/logo1.svg">
        </div>

        <div class="loginform">
            <form action="" method="POST">
                <h2 class="title">Login</h2>

                <div class="input-div username">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" name="username" id="username" class="forminput" autocomplete="off" required>
                    </div>
                </div>

                <div class="input-div password">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="password" id="password" class="forminput" autocomplete="off" Required>
                    </div>
                </div>

                <input type="submit" name="login" class="btn" value="login">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/loginform.js"></script>

</body>

</html>