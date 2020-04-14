<?php
// Start the session
session_start();
include("config.php");
require 'utils/CheckLogin.php';
$password = md5($_POST['password']);
$email = $_POST['email'];
$id_user = $_SESSION['id_user'];


if(empty($_POST['password'])){
    $query = mysqli_query($mysqli, "UPDATE user SET email='$email'  WHERE id_user='$id_user'");
}else{
    $query = mysqli_query($mysqli, "UPDATE user SET password='$password', email='$email'  WHERE id_user='$id_user'");
}




if ($query) {
    echo "<script>alert('Edit akun sukses')</script>";
} else {
    echo "<script>alert('Edit akun gagal')</script>";
}

echo "<script>window.location.replace('${siteURL}setelan_akun.php')</script>";

?>