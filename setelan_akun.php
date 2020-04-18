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
    <script src="https://kit.fontawesome.com/7a5a347cb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Setelan Akun</title>
</head>

<body>
    <center>
        <a href="tambah_post.php">Tambah Post</a>
        <a href="profil.php">Lihat Profil</a>
        <a href="profil.php?id=<?php echo $_SESSION['id_user'] ?>">Lihat Profil</a>
        <a href="logout.php">Logout</a>
    </center>
    <h1>Lihat/Edit Akun</h1>
    <form action="proses_edit_akun.php" method="post">
        Username : <input type="text" name="username" id="" value="<?php echo $du['username'] ?>" disabled> <br>
        password : <input type="text" name="password" id=""> <br>
        Email : <input type="email" name="email" id="" value="<?php echo $du['email'] ?>"> <br>
        <input type="submit" value="submit">
    </form>

</body>

</html>