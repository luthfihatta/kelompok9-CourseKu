<?php
    include '../inc/config.php';

    $kode = $_GET['kode'];

    $hapus = mysqli_query($conn,"DELETE FROM pendaftaran WHERE id_pendaftaran ='$kode'");

    if($hapus) {
        header("location:tampilpen.php");
    } else {
        echo "Data gagal di hapus";
    }
?>