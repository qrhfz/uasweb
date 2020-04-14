<?php
session_start();
require '../config.php';
require '../utils/jenisAkun.php';
require '../utils/CheckLogin.php';

if ($jenisAkun != 1) {
    header("location: " . $siteURL);
    exit();
}

if (isset($_POST['buatkategori']) && $_POST['keterangan']) {
    $buatkategori = $_POST['buatkategori'];
    $keterangan = $_POST['keterangan'];
    $query = mysqli_query($mysqli, "INSERT INTO kategori (nama_kategori,keterangan) VALUES ('$buatkategori','$keterangan') ");

    if ($query) {
        echo "<script>alert('Berhasil Tambah Kategori')</script>";
    } else {
        echo "<script>alert('Gagal Tambah Kategori')</script>";
    }
}

if (isset($_POST['edit_id']) && $_POST['keterangan'] && $_POST['nama_kategori']) {
    $id_kategori = $_POST['edit_id'];
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];
    $query = mysqli_query($mysqli, "UPDATE kategori SET nama_kategori='$nama_kategori',keterangan='$keterangan' WHERE id_kategori = $id_kategori");

    if ($query) {
        echo "<script>alert('Berhasil Edit Kategori')</script>";
    } else {
        echo "<script>alert('Gagal Edit Kategori')</script>";
    }
}

if (isset($_GET['del'])) {
    $id_kategori = $_GET['del'];
    $query = mysqli_query($mysqli, "DELETE FROM kategori WHERE id_kategori = $id_kategori");

    if ($query) {
        echo "<script>alert('Berhasil Hapus Kategori')</script>";
    } else {
        echo "<script>alert('Gagal Hapus Kategori')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
    <script>
        $(document).ready(function() {
            $('.openPopup').on('click', function() {
                var dataURL = $(this).attr('data-href');
                console.log(dataURL)
                $('.modal-body').load(dataURL, function() {
                    $('#exampleModal').modal({
                        show: true
                    });
                });
            });
        });
    </script>
</head>

<body>
    Buat kategori <br>
    <form action="mod_kategori.php" method="post">
        Nama Kategori <input type="text" name="buatkategori" id="">
        Keterangan <input type="text" name="keterangan" id="">
        <input type="submit" value="Submit">
    </form>

    <h1>Daftar Kategori</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
        <?php

        $queryKategori = mysqli_query($mysqli, "SELECT * FROM kategori");

        while ($DK = mysqli_fetch_array($queryKategori)) {
        ?>
            <tr>
                <td><?php echo $DK['id_kategori'] ?></td>
                <td><?php echo $DK['nama_kategori'] ?></td>
                <td><?php echo $DK['keterangan'] ?></td>
                <td>
                    <a class="btn btn-danger" href="mod_kategori.php?del=<?php echo $DK['id_kategori'] ?>">Delete</a>
                    <button type="button" class="btn btn-primary openPopup" data-href="edit_kategori.php?id=<?php echo $DK['id_kategori'] ?>" data-toggle="modal" data-target="#exampleModal">
                        Edit
                    </button>
                </td>
            </tr>
        <?php
        }

        ?>

    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="mod_kategori.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>