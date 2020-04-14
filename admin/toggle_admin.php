<?php
session_start();
include "../config.php";
include '../utils/jenisAkun.php';

$id = $_GET['id'];
require '../utils/CheckLogin.php';

if ($jenisAkun != 1) {
    echo "<script>window.location.replace('${siteURL}')</script>";
    exit();
}

$dataUser = mysqli_query($mysqli, "SELECT jenis_akun FROM user WHERE id_user='$id'");
$DU = mysqli_fetch_array($dataUser);

if ($DU['jenis_akun'] == 0) {
    $updateQuery = mysqli_query($mysqli, "UPDATE user SET jenis_akun=1 WHERE id_user=$id");
} else {
    $updateQuery = mysqli_query($mysqli, "UPDATE user SET jenis_akun=0 WHERE id_user=$id");
}




if ($updateQuery) {
    echo "<script>alert('Berhasil Ganti Jenis Akun')</script>";
} else {
    echo "<script>alert('Gagal Ganti Jenis Akun')</script>";
}

echo "<script>window.location.replace('${siteURL}admin/mod_user.php')</script>";
