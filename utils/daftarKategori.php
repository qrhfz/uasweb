<?php
    function daftarKategori($mysqli){

        $dataKategori = mysqli_query($mysqli, "SELECT * FROM kategori ORDER BY nama_kategori");
        if (mysqli_num_rows($dataKategori) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($dataKategori)) {
                echo '<a class="list-group-item list-group-item-action bg-light" href="kategori.php?id=' . $row["id_kategori"] . '">' . $row["nama_kategori"] . '</a>';
            }
        }

    }
?>