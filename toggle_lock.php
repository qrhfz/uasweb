<?php
session_start();
include("config.php");

include 'utils/jenisAkun.php';

$id = $_GET['id'];
require 'utils/CheckLogin.php';

if ($jenisAkun != 1) {
    echo "<script>window.location.replace('${siteURL}')</script>";
    exit();
}

$dataPost = mysqli_query($mysqli, "SELECT status_lock FROM post WHERE id_post='$id'");
$DP = mysqli_fetch_array($dataPost);

if ($DP['status_lock'] == 0) {
    $updateQuery = mysqli_query($mysqli, "UPDATE post SET status_lock=1 WHERE id_post=$id");
} else {
    $updateQuery = mysqli_query($mysqli, "UPDATE post SET status_lock=0 WHERE id_post=$id");
}




if ($updateQuery) {
    echo "<script>alert('Berhasil Update Post')</script>";
} else {
    echo "<script>alert('Gagal Update Post')</script>";
}

echo "<script>window.location.replace('${siteURL}post.php?id=${id}')</script>";

?>