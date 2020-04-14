<?php
// Start the session
session_start();
include("config.php");

if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['email'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    $query = mysqli_query($mysqli, "INSERT INTO user (username, email, password) VALUE ('$username', '$email', '$password')");
}



if ($query) {
    echo "<script>alert('Registrasi sukses')</script>";
} else {
    echo "<script>alert('Registrasi gagal')</script>";
}

echo "<script>window.location.replace('${siteURL}')</script>";
