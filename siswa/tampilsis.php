<?php
include '../inc/config.php';

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
                        <a class="nav-link" href="">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pendaftaran/tampilpen.php">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-2 mt-5">Data Siswa</h1>
        <a href="tambahsis.php"><button type="button" class="btn btn-primary mb-4 mt-3">Tambah Data</button></a>

        <table class="table table-bordered table-hover table-striped shadow rounded">
            <thead>
                <th>
                    <center>No</center>
                </th>
                <th>
                    <center>ID Siswa</center>
                </th>
                <th>
                    <center>Nama</center>
                </th>
                <th>
                    <center>Email</center>
                </th>
                <th>
                    <center>Telepon</center>
                </th>
                <th>
                    <center>Aksi</center>
                </th>
            </thead>
            <?php
            $no = 1;
            $data = mysqli_query($conn, 'SELECT * FROM siswa');
            while ($row = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td>
                        <center><?php echo $no++; ?></center>
                    </td>
                    <td>
                        <center><?php echo $row['id_siswa']; ?></center>
                    </td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['no_telepon']; ?></td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="edit.php?kode=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="hapus.php?kode=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-danger"
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