<?php
// Start the session
session_start();
include("config.php");
require 'utils/CheckLogin.php';

$isi_komentar = $_POST['isi_komentar'];
$id_komentar = $_POST['id_komentar'];
$id_user = $_SESSION['id_user'];

$query = mysqli_query($mysqli, "UPDATE komen SET isi_komen='$isi_komentar' WHERE id_komen='$id_komentar' AND id_user='$id_user'");

if ($query) {
    echo "<script>alert('Edit komen sukses')</script>";
} else {
    echo "<script>alert('Edit komen gagal')</script>";
}

echo "<script>window.history.back()</script>";
