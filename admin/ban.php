<?php
session_start();
require "../config.php";
require '../utils/CheckLogin.php';
require '../utils/jenisAkun.php';

$id = $_GET['id'];
$waktu = $_GET['waktu'];


if($jenisAkun != 1){
    echo "<script>window.location.replace('${siteURL}')</script>";
    exit();
}

if(isset($waktu)){
    if($waktu=='w'){
        $banTime = date('Y-m-d H:i:s', strtotime("1 week"));
        echo $banTime;
    }else if($waktu=='m'){
        $banTime = date('Y-m-d H:i:s', strtotime("1 month"));
        echo $banTime;
    }else{
        $banTime = date('Y-m-d H:i:s', strtotime("1 year"));
        echo $banTime;
    }
    $query = mysqli_query($mysqli, "UPDATE user SET masa_ban='$banTime' WHERE id_user=$id");
}

if($query){
    echo "<script>alert('Berhasil Ban')</script>";
    
}else{
    echo "<script>alert('Gagal Ban')</script>";
}

echo "<script>window.location.replace('${siteURL}admin/mod_user.php')</script>";
?> 