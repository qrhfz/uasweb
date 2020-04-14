<?php
// Start the session
session_start();
include("config.php");
require 'utils/CheckLogin.php';
$id_user = $_SESSION['id_user'];
$judul = $_POST['judul'];
$meme = $_FILES['meme']['name'];
$kategori = $_POST['id_kategori'];
$lokasi_file = $_FILES['meme']['tmp_name'];


if(!empty($_POST['judul'])&&!empty($_FILES['meme']['name'])){
    
    $memeReady = "meme/".date("ymdHis-").$meme;
    move_uploaded_file($lokasi_file, $memeReady);
    $query = mysqli_query($mysqli, "INSERT INTO post (id_user, judul, url, id_kategori) VALUE ('$id_user', '$judul', '$memeReady', '$kategori')");
}else{
    $query = false;
    
}




if ($query) {
    echo "<script>alert('Tambah post sukses')</script>";
} else {
    echo "<script>alert('Tambah post gagal')</script>";
}

echo "<script>window.location.replace('${siteURL}')</script>";
