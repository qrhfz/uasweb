<?php
// Start the session
session_start();
include("config.php");
require 'utils/CheckLogin.php';
if ($_SESSION['statusBan'] == true)
    header("location: ".$siteURL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <center>
        <a href="tambah_post.php">Tambah Post</a>
        <a href="profil.php">Lihat Profil</a>
        <a href="profil.php?id=<?php echo $_SESSION['id_user'] ?>">Lihat Profil</a>
        <a href="logout.php">Logout</a>
    </center>

    
    <form action="proses_tambah_post.php" method="post" enctype="multipart/form-data">
        Judul : <input type="text" name="judul" id=""> <br>
        File : <input type="file" name="meme" id=""> <br>
        <select name='id_kategori'>
        <option selected>Pilih Kategori</option>
        <?php 
            $dataKategori = mysqli_query($mysqli, "SELECT * FROM kategori ORDER BY nama_kategori");
            if (mysqli_num_rows($dataKategori) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($dataKategori)) {
                    echo '<option value="'.$row["id_kategori"].'">'.$row["nama_kategori"].'</option>';
                }
            }
        ?>
        </select> <br>
        <input type="submit" value="submit">
    </form>

</body>

</html>