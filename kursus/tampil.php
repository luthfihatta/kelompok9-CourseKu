<?php
include '../inc/config.php';

//query untuk mendapatkan data
$data = mysqli_query($conn, 'SELECT * FROM kursus');

//MAX dan MIN
$query_price = mysqli_query($conn, 'SELECT * FROM view_harga_kursus');
$price_data = mysqli_fetch_assoc($query_price);

$formatted_max = $price_data['harga_tertinggi'];
$formatted_min = $price_data['harga_terendah'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseKu</title>
    <style>
        .summary-card {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .summary-title {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 10px;
        }

        .summary-value {
            font-size: 20px;
            font-weight: bold;
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
                        <a class="nav-link" href="tampil.php">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../siswa/tampilsis.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pendaftaran/tampilpen.php">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4 mt-5">Data Kursus</h1>
        <a href="riwayathapus.php" class="btn btn-secondary mb-4">
            <i class="bi bi-clock-history"></i> Lihat Riwayat Kursus
        </a>

        <div class="row mb-4">
            <div class="col-md-6 text-white">
                <div class="summary-card text-white" style="background-color: #5012BF;">
                    <div class="summary-title "><i class="bi bi-arrow-up-circle"></i> Harga Tertinggi</div>
                    <div class="summary-value"><?php echo $formatted_max; ?></div>
                </div>
            </div>
            <div class="col-md-6 text-dark">
                <div class="summary-card bg-warning text-dark">
                    <div class="summary-title text-dark"><i class="bi bi-arrow-down-circle"></i> Harga Terendah</div>
                    <div class="summary-value"><?php echo $formatted_min; ?></div>
                </div>
            </div>
        </div>

        <a href="tambah.php"><button type="button" class="btn btn-primary mb-4 mt-1">Tambah Data</button></a>

        <table class="table table-bordered table-hover table-striped shadow">
            <thead>
                <th>
                    <center>No</center>
                </th>
                <th>
                    <center>ID Kursus</center>
                </th>
                <th>
                    <center>Judul</center>
                </th>
                <th>
                    <center>Deskripsi</center>
                </th>
                <th>
                    <center>Harga</center>
                </th>
                <th>
                    <center>Durasi (Jam)</center>
                </th>
                <th>
                    <center>Instruktur</center>
                </th>
                <th>
                    <center>Aksi</center>
                </th>
            </thead>
            <?php
            $no = 1;
            $data = mysqli_query($conn, 'SELECT * FROM kursus');
            while ($row = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td>
                        <center><?php echo $no++; ?></center>
                    </td>
                    <td>
                        <center><?php echo $row['id_kursus']; ?></center>
                    </td>
                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td>
                        <center><?php echo $row['durasi_jam']; ?></center>
                    </td>
                    <td><?php echo $row['instruktur']; ?></td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="edit.php?kode=<?php echo $row['id_kursus'] ?>" class="btn btn-sm btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="hapus.php?kode=<?php echo $row['id_kursus'] ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <footer class="bg-dark py-5 mt-5">
        <div class="container text-light text-center">
            <h6>CourseKu</h6>
            <small>Dimana Pembelajaran Dimulai</small>
        </div>
    </footer>
</body>

</html>