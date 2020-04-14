<?php
session_start();
include '../config.php';
include 'jenisAkun.php';


if(isset($_GET['id'])){
    $id_post = $_GET['id'];
}else{
    exit();
}

if(isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];
}else{
    $id_user = NULL;
}

if(isset($_GET['update'])){
    $isUpdate = $_GET['update'];
}else{
    $isUpdate = 0;
}

$dataUserSuka = mysqli_query($mysqli, "SELECT * FROM suka WHERE id_post='$id_post' AND id_user='$id_user'");
$isSuka = mysqli_num_rows($dataUserSuka);

echo '<div id="countwrp-'.$id_post.'">';

if ($isSuka) {
    echo '<i class="far fa-heart heart" id="likebtn-'.$id_post.'"></i>';
    if($isUpdate&&$id_user!=NULL)
        mysqli_query($mysqli, "DELETE FROM suka WHERE id_post='$id_post' AND id_user='$id_user'");
} else {
    echo '<i class="fas fa-heart heart" id="likebtn-'.$id_post.'"></i>';
    if($isUpdate&&$id_user!=NULL)
        mysqli_query($mysqli, "INSERT INTO suka (id_post, id_user) VALUES ('$id_post', '$id_user')");
}

$dataSuka = mysqli_query($mysqli, "SELECT * FROM suka WHERE id_post='$id_post'");
$sukaCount=mysqli_num_rows($dataSuka);
echo $sukaCount;
echo '</div>';
?>
