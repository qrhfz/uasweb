<?php
session_start();
require 'config.php';
require 'utils/jenisAkun.php';
require 'utils/CheckLogin.php';

$id = $_GET['id'];

if ($jenisAkun != 1) {
    echo "<script>window.location.replace('${siteURL}')</script>";
    exit();
}

$query = mysqli_query($mysqli, "DELETE FROM post WHERE id_post='$id'");

if ($query) {
    echo "<script>alert('Berhasil Hapus Post')</script>";
} else {
    echo "<script>alert('Gagal Hapus Post')</script>";
}

echo "<script>window.location.replace('${siteURL}')</script>";

?>