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
?>

            <img src="<?php echo $row['url']; ?>" alt=""><br>
            <strong><a href="<?php echo $siteURL . 'post.php?id=' . $row['id_post'] ?>"><?php echo $row['judul'] ?></a></strong><br>
            by <?php echo $row['username']; ?> on <?php echo $row['nama_kategori']; ?> at <?php echo $row['waktu_post']; ?>
            
<?php
            $id_post = $row['id_post'];
            $dataSuka = mysqli_query($mysqli, "SELECT id_suka FROM suka WHERE id_post='$id_post'");
            $sukaCount = mysqli_num_rows($dataSuka);
            echo '<div id="countwrp-'.$id_post.'">';
            echo ($isSuka) ? '<i class="fas fa-heart heart" id="likebtn-'.$id_post.'"></i>' : '<i class="far fa-heart heart" id="likebtn-'.$id_post.'"></i>';
            echo $sukaCount.'   </div>';

            $dataKomen = mysqli_query($mysqli, "SELECT id_komen FROM komen WHERE id_post='$id_post'");
            $komenCount = mysqli_num_rows($dataKomen);

            echo '<div id=komen-'.$id_post.'">';
            echo '<i class="far fa-comment"></i>';
            echo $komenCount.'</div>';
            echo '<hr>';


        }
        echo '';
    } else {
        echo "0 results";
        //($exit) ? header("location: " . $siteURL) : '';
    }
}
?>