<?php
include '../inc/config.php';

$kode = $_GET['kode'];

$hapus = mysqli_query($conn, "DELETE FROM kursus WHERE id_kursus = '$kode'");

if($hapus) {
    header("location:tampil.php");
} else {
    echo "Data gagal di hapus";
    echo "<br>Error: " . mysqli_error($conn);
}
?>