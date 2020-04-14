<?php
// Start the session
session_start();
include("config.php");
include 'utils/showPost.php';
include 'utils/daftarKategori.php';

if (!isset($_GET['page'])) {
    $page = 0;
} else {
    $page = $_GET['page'];
}

$id = $_GET['id'];

if (!isset($_SESSION['id_user'])) {
    $id_user = NULL;
} else {
    $id_user = $_SESSION['id_user'];
}

if (!isset($_GET['page'])) {
    $page = 0;
} else {
    $page = $_GET['page'];
}

$offset = (int)$page*5;

$dataMemes = mysqli_query($mysqli, "SELECT p.id_post, p.judul, u.username, u.id_user, p.url, p.waktu_post, k.id_kategori, k.nama_kategori 
FROM post p 
INNER JOIN user u ON u.id_user=p.id_user 
INNER JOIN kategori k ON k.id_kategori=p.id_kategori 
AND p.id_kategori = '$id' 
ORDER BY waktu_post DESC LIMIT $offset,5");

if($page>0){
    showPost($mysqli,$dataMemes,$siteURL,false);
    exit();
}

$dataKategori = mysqli_query($mysqli,"SELECT * FROM kategori WHERE id_kategori=$id");
$DK = mysqli_fetch_array($dataKategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7a5a347cb9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title><?php echo $DK['nama_kategori'];?></title>
</head>

<body>

    <?php
    if (empty($id_user)) {
        include 'utils/sign.php';
        echo '</hr>';
    } else {
    ?>
        <center>
            <a href="tambah_post.php">Tambah Post</a>
            <a href="profil.php?id=<?php echo $_SESSION['id_user'] ?>">Lihat Profil</a>
            <a href="setelan_akun.php">Setelan Akun</a>
            <a href="logout.php">Logout</a>
        </center>
        <hr>
        <ul>
            <?php
            daftarKategori($mysqli);
            ?>
        </ul>
        <hr>
    <?php
    }
    ?>
    <h1><?php echo $DK['nama_kategori'];?></h1>
    <div><?php echo $DK['keterangan'];?></div>
    <div id="postwrapper">
        <?php showPost($mysqli,$dataMemes,$siteURL,false);?>
    </div>

    <button id="tomboltambah" onclick="tambah(1)">Tambah</button>
</body>

</html>