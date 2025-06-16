<?php
    include '../inc/config.php';

    $kode = $_GET['kode'];

    $hapus = mysqli_query($conn,"DELETE FROM siswa WHERE id_siswa ='$kode'");

    if($hapus) {
        header("location:tampilsis.php");
    } else {
        echo "Data gagal di hapus";
    }
?>