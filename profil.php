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

$offset = (int) $page * 5;

$dataMemes = mysqli_query($mysqli, "SELECT p.id_post, p.judul, u.username, u.id_user, p.url, p.waktu_post, k.id_kategori, k.nama_kategori 
FROM post p 
INNER JOIN user u ON u.id_user=p.id_user 
INNER JOIN kategori k ON k.id_kategori=p.id_kategori 
AND p.id_user='$id' 
ORDER BY waktu_post DESC LIMIT $offset,5");

if ($page > 0) {
    showPost($mysqli, $dataMemes, $siteURL, false);
    exit();
}

$dataUser = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user=$id");
$DU = mysqli_fetch_array($dataUser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7a5a347cb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title><?php echo $DU['username']; ?></title>
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
        
            <?php
            daftarKategori($mysqli);
            ?>
        
        <hr>
    <?php
    }
    ?>
    <h1><?php echo $DU['username']; ?></h1>

    <div id="postwrapper">
        <?php showPost($mysqli, $dataMemes, $siteURL, false); ?>
    </div>

    <button id="tomboltambah" onclick="tambah(1)">Tambah</button>
</body>

</html>