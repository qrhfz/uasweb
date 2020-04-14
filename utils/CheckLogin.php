<?php
if(!isset($_SESSION['id_user'])){
    //header("location: ".$siteURL);
    echo "<script>alert('Anda belum login')</script>";
    echo "<script>window.location.replace('${siteURL}')</script>";
    exit();
}

?>