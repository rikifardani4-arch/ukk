<?php
session_start();
include("koneksi.php");

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
     $name = $_POST['name'];

    if(empty($username) || empty($password)){
        header('location:register.php?error=invalid');
        exit;
    }

    $sql = "SELECT * form user WHERE name='$name' AND username='$username' AND password='$password' AND name='$name'";
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
        header('location:register.php?error=login');
        exit;
    }
    
}
else{
    header('location:register.php?error=invalid');
    exit;
}
?>