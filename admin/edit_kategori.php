<?php
session_start();
require '../config.php';
require '../utils/jenisAkun.php';
require '../utils/CheckLogin.php';

if ($jenisAkun != 1) {
    header("location: " . $siteURL);
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($mysqli, "SELECT * FROM kategori WHERE id_kategori='$id'");
    $DK = mysqli_fetch_array($query);
}

?>

    Nama Kategori <input type="text" name="nama_kategori" id="" value="<?php echo $DK['nama_kategori'];?>"> <br>
    Keterangan <input type="text" name="keterangan" id="" value="<?php echo $DK['keterangan'];?>"> <br>
    <input type="hidden" name="edit_id" value="<?php echo $id;?>">

