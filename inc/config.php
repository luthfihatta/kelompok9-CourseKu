<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "courseku";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if($conn){
        // echo "koneksi berhasil";
    }
?>