<?php
include '../inc/config.php';
include '../inc/functions.php';

//memanggil function total pendapatan
$total_pen = hitungJumlahPendapatan($conn);
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
                        <a class="nav-link" href="../kursus/tampil.php">Kursus</a>
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
        <h1 class="mb-4 mt-5">Data Pendaftaran</h1>

        <div class="row mb-4">
            <div class="col-md-6 text-white">
                <div class="summary-card text-white" style="background-color:rgb(18, 191, 27);">
                    <div class="summary-title "><i class="bi bi-cash"></i> Total Pendapatan </div>
                    <div class="summary-value"><?= $total_pen?></div>
                </div>
            </div>
        </div>

        <a href="tambahpen.php"><button type="button" class="btn btn-primary mb-4 mt-1">Tambah Data</button></a>

        <table class="table table-bordered table-hover table-striped shadow rounded">
            <thead>
                <th>
                    <center>No</center>
                </th>
                <th>
                    <center>ID Pendaftaran</center>
                </th>
                <th>
                    <center>ID Kursus</center>
                </th>
                <th>
                    <center>ID Siswa</center>
                </th>
                <th>
                    <center>Tanggal Daftar</center>
                </th>
                <th>
                    <center>Status Pembayaran</center>
                </th>
                <th>
                    <center>Aksi</center>
                </th>
            </thead>
            <?php
            $no = 1;
            $data = mysqli_query($conn, 'SELECT * FROM pendaftaran');
            while ($row = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td>
                        <center><?php echo $no++; ?></center>
                    </td>
                    <td>
                        <center><?php echo $row['id_pendaftaran']; ?></center>
                    </td>
                    <td><?php echo $row['id_kursus']; ?></td>
                    <td><?php echo $row['id_siswa']; ?></td>
                    <td><?php echo $row['tanggal_daftar']; ?></td>
                    <td><?php echo $row['status_pembayaran']; ?></td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="editpen.php?kode=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-sm btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="hapuspen.php?kode=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-sm btn-danger"
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