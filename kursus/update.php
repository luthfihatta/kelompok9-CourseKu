<?php
    include "../inc/config.php";

    $id_kursus = $_POST['id_kursus'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $durasi = $_POST['durasi'];
    $instruktur = $_POST['instruktur'];

    $update = mysqli_query($conn, "UPDATE kursus SET judul='$judul', deskripsi='$deskripsi', harga='$harga', durasi_jam='$durasi', instruktur='$instruktur' WHERE id_kursus='$id_kursus'");

    if ($update) {
        header("location:tampil.php");
    } else {
        header("location:edit.php");
    }
?>