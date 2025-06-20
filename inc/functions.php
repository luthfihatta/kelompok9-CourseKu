<?php
include 'config.php';

function hitungJumlahPendapatan($conn){
    $query = 'SELECT SUM(k.harga) AS total
              FROM pendaftaran p
              JOIN kursus k ON p.id_kursus = k.id_kursus
              WHERE p.status_pembayaran = "LUNAS"';
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return 'Rp ' . number_format($row['total'], 0, ',', '.');
}
?>