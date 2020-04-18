<?php
    function daftarKategori($mysqli){
        echo '<div class="list-group">';
        echo '<h4 style="padding:0 1.25rem">Kategori</h4>';
        $dataKategori = mysqli_query($mysqli, "SELECT * FROM kategori ORDER BY nama_kategori");
        if (mysqli_num_rows($dataKategori) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($dataKategori)) {
                echo '<a class="list-group-item list-group-item-action" href="kategori.php?id=' . $row["id_kategori"] . '">' . $row["nama_kategori"] . '</a>';
            }
        }
        echo '</div>';
    }
?>