<?php
    include "../inc/config.php";

    $id_pendaftaran = $_POST['id_pendaftaran'];
    $idkursus= $_POST['idkursus'];
    $idsiswa = $_POST['idsiswa'];
    $status = $_POST['status'];
    
    $simpan = mysqli_query($conn, "UPDATE pendaftaran SET id_pendaftaran = '$id_pendaftaran', id_kursus = '$idkursus', id_siswa = '$idsiswa', status_pembayaran = '$status' WHERE id_pendaftaran = '$id_pendaftaran'");

    if ($simpan) {
        header("location:tampilpen.php");
    } else {
        header("location:editpen.php");
    }
?>