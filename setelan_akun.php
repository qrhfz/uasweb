<?php
// Start the session
session_start();
require 'config.php';
require 'utils/daftarKategori.php';
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
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">MEME </div>
            <div class="list-group list-group-flush">
                <?php daftarKategori($mysqli) ?>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-ellipsis-h"></i></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo $siteURL; ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <?php
                        if (empty($id_user)) {
                        ?>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#signFormModal">Login</a>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="tambah_post.php">Tambah Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profil.php?id=<?php echo $_SESSION['id_user'] ?>">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="setelan_akun.php">Setelan Akun</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div id="postwrapper">
                            <h1>Setelan Akun</h1>
                            <form action="proses_edit_akun.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" class="form-control" id="inputUsername" value="<?php echo $du['username'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="text" class="form-control" name="password" id="inputPassword">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $du['email'] ?>">
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>