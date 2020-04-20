<?php
if (empty($id_user)) {
?>
    <a class="nav-link" href="#" data-toggle="modal" data-target="#signFormModal">Login</a>
<?php
} else {
?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="https://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($_SESSION['email']))); ?>" class="rounded-circle navpic" alt="user profile image">
            <?php echo $_SESSION['username'] ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="tambah_post.php">Tambah Post</a>
            <a class="dropdown-item" href="profil.php?id=<?php echo $_SESSION['id_user'] ?>">Profil</a>
            <a class="dropdown-item" href="setelan_akun.php">Setelan Akun</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </li>
<?php } ?>