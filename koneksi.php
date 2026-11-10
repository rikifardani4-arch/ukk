<?php

$koneksi= mysqli_connect("localhost","root","","ukk");

//cek koneksi
if(mysqli_connect_error()){
    echo "koneksi ukk gagal:" . mysqli_connect_error();
}

?>