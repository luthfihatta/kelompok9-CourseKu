<?php
include "../inc/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link" href="tampilsis.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pendaftaran/tampilpen.php">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-5 mt-5">Form Edit Pendaftaran</h1>

        <?php
            $kode = $_GET['kode'];
            $data = mysqli_query($conn,"SELECT * FROM pendaftaran WHERE id_pendaftaran='$kode'");
            while ($row = mysqli_fetch_array($data)) {
        ?>

        <form action="updatepen.php" method="post">
            <input type="hidden" name="id_pendaftaran" value="<?php echo $row['id_pendaftaran']; ?>">

            <div class="mb-3 row">
                <label for="idkursus" class="col-sm-2 col-form-label">
                    ID Kursus
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="idkursus" placeholder="Ex : 1">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="idsiswa" class="col-sm-2 col-form-label">
                    ID Siswa
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="idsiswa" placeholder="Ex : 3">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">
                    Status Pembayaran
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="status" placeholder="Ex : LUNAS / GAGAL / PENDING">
                </div>
            </div>

            <div class="mb-3 row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-success">
                        Edit
                    </button>
                    <button type="reset" class="btn btn-danger">
                        Batal
                    </button>
                </div>
            </div>
        </form>
        <?php
        }
        ?>
    </div>
</body>

</html>