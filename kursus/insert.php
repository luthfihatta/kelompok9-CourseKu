<?php
    include "../inc/config.php";

    $id_kursus = $_POST['id_kursus'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $durasi = $_POST['durasi'];
    $instruktur = $_POST['instruktur'];

    $simpan = mysqli_query($conn, "INSERT INTO kursus VALUES ('$id_kursus','$judul', '$deskripsi', '$harga', '$durasi', '$instruktur')");

    if ($simpan) {
        header("location:tampil.php");
    } else {
        header("location:tambah.php");
    }
?>