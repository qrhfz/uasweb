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

$query = mysqli_query($mysqli, "DELETE FROM komen WHERE id_komen='$id'");

if ($query) {
    echo "<script>alert('Berhasil Hapus Komen')</script>";
} else {
    echo "<script>alert('Gagal Hapus Komen')</script>";
}

echo "<script>window.history.back()</script>";

?>