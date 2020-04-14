<?php
// Start the session
session_start();
include("config.php");
require 'utils/CheckLogin.php';
$id_user = $_SESSION['id_user'];
$data = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user='$id_user'");
$du = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setelan Akun</title>
</head>
<body>
        <center>
            <a href="tambah_post.php">Tambah Post</a>
            <a href="profil.php">Lihat Profil</a>
            <a href="profil.php?id=<?php echo $_SESSION['id_user']?>">Lihat Profil</a>
            <a href="logout.php">Logout</a>
        </center>
            <h1>Lihat/Edit Akun</h1>
        <form action="proses_edit_akun.php" method="post">
            Username : <input type="text" name="username" id="" value="<?php echo $du['username'] ?>" disabled> <br>
            password : <input type="text" name="password" id=""> <br>
            Email    : <input type="email" name="email" id="" value="<?php echo $du['email'] ?>"> <br>
            <input type="submit" value="submit">
        </form>

</body>
</html>