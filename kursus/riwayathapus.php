<?php
include '../inc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Hapus Kursus</title>
    <style>
        .table-riwayat th {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2>CourseKu</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kursus/tampil.php">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../kursus/riwayathapus.php">Riwayat Hapus</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-4 mt-5">
        <h2>Riwayat Penghapusan Kursus</h2>
        
        <table class="table table-bordered table-hover table-riwayat mt-5">
            <thead>
                <tr>
                    <th>ID Kursus</th>
                    <th>Judul</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Instruktur</th>
                    <th>Tanggal Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $riwayat = mysqli_query($conn, "SELECT * FROM riwayat_hapus_kursus ORDER BY tanggal_hapus DESC");
                if(mysqli_num_rows($riwayat) > 0) {
                    while($row = mysqli_fetch_array($riwayat)) {
                        echo "<tr>
                            <td>{$row['id_kursus']}</td>
                            <td>{$row['judul']}</td>
                            <td>Rp" . number_format($row['harga'], 0, ',', '.') . "</td>
                            <td>{$row['durasi_jam']} jam</td>
                            <td>{$row['instruktur']}</td>
                            <td>{$row['tanggal_hapus']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Belum ada riwayat penghapusan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>