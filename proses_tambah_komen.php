<?php
// Start the session
session_start();
include("config.php");
require 'utils/CheckLogin.php';
$id_user = $_SESSION['id_user'];
$id_post = $_POST['id_post'];
$isi = $_POST['isi_komen'];


if (!empty($_POST['isi_komen']) && !empty($_POST['id_post'])) {

    $query = mysqli_query($mysqli, "INSERT INTO komen (id_user, isi_komen, id_post) VALUE ('$id_user', '$isi', '$id_post')");
} else {
    $query = false;
}

if ($query) {
    echo "<script>alert('Tambah komen sukses')</script>";
} else {
    echo "<script>alert('Tambah komen gagal')</script>";
}

echo "<script>window.location.replace('${siteURL}post.php?id=${id_post}')</script>";
