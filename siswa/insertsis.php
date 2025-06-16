<?php
    include "../inc/config.php";

    $id_siswa = $_POST['id_siswa'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    
    $simpan = mysqli_query($conn, "INSERT INTO siswa VALUES ('$id_siswa','$nama', '$email', '$telepon')");

    if ($simpan) {
        header("location:tampilsis.php");
    } else {
        header("location:tambahsis.php");
    }
?>