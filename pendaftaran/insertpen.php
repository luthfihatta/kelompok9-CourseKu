<?php

include "../inc/config.php";

    $id_pendaftaran = $_POST['id_pendaftaran'];
    $idkursus= $_POST['idkursus'];
    $idsiswa = $_POST['idsiswa'];
    $status = $_POST['status'];
    
    $simpan = mysqli_query($conn, "INSERT INTO pendaftaran VALUES ('$id_pendaftaran', '$idkursus', '$idsiswa', NOW(), '$status')");
    

    if ($simpan) {
        header("location:tampilpen.php");
    } else {
        echo ('eror');
    }
?>