<?php
// Start the session
session_start();
include("config.php");
$id_post = $_GET['id'];
include 'utils/showPost.php';
include 'utils/showKomen.php';
include 'utils/jenisAkun.php';
include 'utils/sign.php';
include 'utils/daftarKategori.php';

$dataMemes = mysqli_query(
    $mysqli,
    "SELECT p.id_post, p.judul, u.username, u.id_user, p.url, p.waktu_post, p.status_lock, k.id_kategori, k.nama_kategori 
FROM post p 
INNER JOIN user u ON u.id_user=p.id_user 
INNER JOIN kategori k ON k.id_kategori=p.id_kategori 
AND p.id_post='$id_post'"
);

if (!isset($_SESSION['id_user'])) {
    $id_user = NULL;
} else {
    $id_user = $_SESSION['id_user'];
}

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
    <title>Document</title>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">MEME </div>
            <div class="list-group list-group-flush">
                <?php daftarKategori($mysqli) ?>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo $siteURL; ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <?php include 'utils/singNavItem.php'?>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div id="postwrapper">
                            <?php
                            showPost($mysqli, $dataMemes);
                            ?>
                        </div>
                        <?php

                        $dataLock = mysqli_query($mysqli, "SELECT status_lock FROM post WHERE id_post=$id_post");

                        $DL = mysqli_fetch_array($dataLock);

                        ///Punyanya ADMIN
                        echo '<div class="mb-3 d-flex flex-row-reverse">';
                        if ($jenisAkun == 1) {
                            echo '<span class="ml-3"><a class="btn btn-danger btn" href="proses_del_post.php?id=' . $id_post . '"><i class="fas fa-eraser"></i> Delete</a></span>';
                            echo '<span class="ml-3"><a class="btn btn-warning btn" href="toggle_lock.php?id=' . $id_post . '">';
                            echo ($DL['status_lock'] == 0)?'<i class="fas fa-lock"></i> Lock':'<i class="fas fa-lock-open"></i> Unlock';
                            echo '</a></span>';
                        }
                        echo '</div>';
                        ///FORM KOMENTAR
                        if (isset($_SESSION['id_user']) && $DL['status_lock'] == 0 && $_SESSION['statusBan'] == false) {
                        ?>

                            <form action="proses_tambah_komen.php" method="post" class="mb-5">
                                <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                                
                                <textarea class="form-control" name="isi_komen" id="" cols="30" rows="10">buat komentar</textarea><br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php
                        }
                        echo '<h2>Komentar</h2>';

                        showKomen($mysqli, $id_post, $id_user);
                        ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>



        </div>
    </div>
    <?php signFormModal() ?>
</body>

</html>