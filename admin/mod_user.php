<?php
session_start();
require '../config.php';
require '../utils/jenisAkun.php';
require '../utils/CheckLogin.php';

if ($jenisAkun != 1) {
    header("location: " . $siteURL);
    exit();
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
</head>

<body>

    <h1>Daftar User</h1>
    <form action="mod_user.php" method="get">
        <input type="text" name="" id="" placeholder="masukan username">
        <input type="submit" value="submit">
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php

        if (!isset($_GET['page'])) {
            $page = 0;
        } else {
            $page = (int) $_GET['page'];
        }

        if (!isset($_GET['s'])) {
            $namesearch = "";
        } else {
            $namesearch = $_GET['s'];
        }

        $offset = $page * 25;
        $queryUser = mysqli_query($mysqli, "SELECT * FROM user WHERE username LIKE '%$namesearch%' LIMIT $offset,25");
        $countrow = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM user WHERE username LIKE '%$namesearch%'"));
        while ($DU = mysqli_fetch_array($queryUser)) {
        ?>
            <tr>
                <td><?php echo $DU['id_user'] ?></td>
                <td><?php echo $DU['username'] ?></td>
                <td>
                    <span class="dropdown">
                        <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="dropdownMenuButton-<?php echo $DU['id_user']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ban
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-<?php echo $DU['id_user']; ?>">
                            <a class="dropdown-item" href="ban.php?id=<?php echo $DU['id_user'] ?>&waktu=w">Ban Seminggu</a>
                            <a class="dropdown-item" href="ban.php?id=<?php echo $DU['id_user'] ?>&waktu=m">Ban Sebulan</a>
                            <a class="dropdown-item" href="ban.php?id=<?php echo $DU['id_user'] ?>&waktu=y">Ban Setahun</a>
                        </div>
                    </span>

                    <?php
                    if ($DU['jenis_akun'] == 0) {
                        echo '<a class="btn btn-success btn-sm" href="toggle_admin.php?id=' . $DU['id_user'] . '">Jadikan Admin</a>';
                    } else {
                        echo '<a class="btn btn-warning btn-sm" href="toggle_admin.php?id=' . $DU['id_user'] . '">Jadikan User Biasa</a>';
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>
    <?php
    if ($page > 0) {
        echo '<a class="btn btn-success btn-sm" href="mod_user.php?page=' . strval($page - 1) . '">Prev</a>';
    }
    if (($page + 1) < $countrow / 25) {
        echo '<a class="btn btn-success btn-sm" href="mod_user.php?page=' . strval($page + 1) . '">Next</a>';
    }
    ?>
</body>

</html>