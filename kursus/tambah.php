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
                        <a class="nav-link" href="tampil.php">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Siswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-5 mt-5">Form Tambah Kursus</h1>

        <form action="insert.php" method="post">

            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="judul" placeholder="Ex : Belajar Python">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi" id="desk"></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">
                    Harga
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="harga" placeholder="Ex : 12000">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="durasi" class="label col-sm-2 col-form-label">
                    Durasi (Jam)
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="durasi" name="durasi" placeholder="Ex : 2">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="instruktur" class="label col-sm-2 col-form-label">
                    Instruktur
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="instruktur" placeholder="Ex : Budi Santoso"></input>
                </div>
            </div>

            <div class="mb-3 row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        Tambahkan
                    </button>
                    <button type="reset" class="btn btn-danger">
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>