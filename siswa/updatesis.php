<?php
    include "../inc/config.php";

    $id_siswa = $_POST['id_siswa'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    
    $update = mysqli_query($conn, "UPDATE siswa SET id_siswa='$id_siswa', nama='$nama', email='$email', no_telepon='$telepon' WHERE id_siswa='$id_siswa'");

    if ($update) {
        header("location:tampilsis.php");
    } else {
        header("location:editsis.php");
    }
?>