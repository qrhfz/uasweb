<?php
function showPost($mysqli, $dataMemes, $siteURL, $exit)
{


    if (mysqli_num_rows($dataMemes) > 0) {
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
            <div class="card">
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
                        <button type="button" class="btn btn-primary btn-lg"><i class="fas fa-comment"></i> <?php echo $komenCount ?>
                    </span>
                </div>
            </div>

<?php
        }
    } else {
        echo "0 results";
        //($exit) ? header("location: " . $siteURL) : '';
    }
}
?>