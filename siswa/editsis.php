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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-5 mt-5">Form Edit Siswa</h1>

        <?php
            $kode = $_GET['kode'];
            $data = mysqli_query($conn,"SELECT * FROM siswa WHERE id_siswa='$kode'");
            while ($row = mysqli_fetch_array($data)) {
        ?>

        <form action="updatesis.php" method="post">
            <input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa']; ?>">

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">
                    Nama Siswa
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="nama" placeholder="Ex : Belajar Python" value="<?php echo $row['nama']?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">
                    Email
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="email" placeholder="Ex : sigma@example.com" value="<?php echo $row['email']?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="telepon" class="col-sm-2 col-form-label">
                    Telepon
                </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="telepon" placeholder="Ex : 12000" value="<?php echo $row['no_telepon']?>">
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