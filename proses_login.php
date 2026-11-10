<?php
session_start();
include("koneksi.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header('location:login.php?error=invalid');
        exit;
    }

    $sql = "SELECT * form user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($koneksi, $sql);

    $jumlah = mysqli_num_rows($query);
    if($jumlah > 0){
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $username;
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['status'] = "login";
        exit;
    }
    else{
        header('location:login.php?error=login');
        exit;
    }
}
else{
    header('location:login.php?error=invalid');
    exit;
}
?>