<?php
    include("config.php");
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($mysqli, $sql) or die("Tidak ada databse");
    $data = mysqli_fetch_array($query);
    $row = mysqli_num_rows($query);

    if($row==1){
        
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['jenis_akun'] = $data['jenis_akun'];
        $_SESSION['email'] = $data['email'];
        if(strtotime($data['masa_ban'])< time()  ){
            $_SESSION['statusBan'] = false;
        }else{
            $_SESSION['statusBan'] = true;
        }
        echo "<script>alert('Login user sukses')</script>";
        
    }else{
        echo "<script>alert('Login user gagal')</script>";
    }

    echo "<script>window.location.replace('${siteURL}')</script>";
?>