<?php
function showPost($mysqli, $dataMemes)
{
    $n = mysqli_num_rows($dataMemes);
    if ($n == 0) {
        echo '<div class="alert alert-secondary" role="alert">
        Tidak ada post untuk dimuat.
      </div>';
    } else if ($n >= 1) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($dataMemes)) {
            $id_post = $row['id_post'];
            $id_user = $row['id_user'];
            $dataUserSuka = mysqli_query($mysqli, "SELECT * FROM suka WHERE id_post='$id_post' AND id_user='$id_user'");
            $isSuka = mysqli_num_rows($dataUserSuka);
            $id_post = $row['id_post'];
            $dataSuka = mysqli_query($mysqli, "SELECT id_suka FROM suka WHERE id_post='$id_post'");
            $sukaCount = mysqli_num_rows($dataSuka);
            $dataKomen = mysqli_query($mysqli, "SELECT id_komen FROM komen WHERE id_post='$id_post'");
            $komenCount = mysqli_num_rows($dataKomen);
?>
            <div class="card mb-3 mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="py-2"><a class="text-decoration-none text-dark font-weight-bold" href="profil.php?id=<?php echo $row['id_user'] ?>"><?php echo '@' . $row['username'] ?></a></div>
                        <div><a class="btn btn-secondary" href="kategori.php?id=<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></a></div>
                    </div>

                </div>
                <img class="card-img-top" src="<?php echo $row['url']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['judul'] ?></h5>
                    <span id="sukawrp-<?php echo $id_post;  ?>">
                        <button type="button" class="btn btn-primary btn-lg btn-suka" id="likebtn-<?php echo $id_post ?>">
                            <?php echo ($isSuka) ? '<i class="fas fa-heart "></i>' : '<i class="far fa-heart heart" id="likebtn-' . $id_post . '"></i>'; ?>
                            <?php echo $sukaCount ?>
                        </button>
                    </span>
                    <span id="komen-<?php echo $id_post; ?>">
                        <a href="post.php?id=<?php echo $id_post; ?>" type="button" class="btn btn-primary btn-lg"><i class="fas fa-comment"></i> <?php echo $komenCount ?></a>
                    </span>
                </div>
            </div>

<?php
        }
        if ($n > 4) {
            echo   '<button class="btn btn-primary btn-lg btn-block" id="tomboltambah" onclick="tambah(1)">Muat</button>';
        }else if($n>1){
            echo '<div class="alert alert-secondary" role="alert">
        Semua post sudah dimuat.
      </div>';
        }
    }
}
?>