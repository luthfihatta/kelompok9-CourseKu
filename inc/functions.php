<?php
include 'config.php';

// function MySQL menghitung total pendapatan
function hitungJumlahPendapatan($conn){
    $query = "SELECT hitung_total_pendapatan() AS total";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return 'Rp ' . number_format($row['total'], 0, ',', '.');
}
?>