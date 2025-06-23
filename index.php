<?php
include 'inc/config.php';

// Query dari database
$query_stats = mysqli_query($conn, "
    SELECT 
        (SELECT COUNT(*) FROM kursus) as total_kursus,
        (SELECT COUNT(*) FROM siswa) as total_siswa,
        (SELECT COUNT(*) FROM pendaftaran) as total_pendaftaran,
        (SELECT SUM(durasi_jam) FROM kursus) as total_durasi,
        (SELECT AVG(harga) FROM kursus) as avg_harga
");
$stats = mysqli_fetch_assoc($query_stats);
$formatted_avg = 'Rp ' . number_format($stats['avg_harga'], 0, ',', '.');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseKu</title>
    <style>
        .summary-card {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .summary-title {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 10px;
        }
        
        .summary-value {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-top: auto;
        }
        
        .dashboard-header {
            margin-bottom: 30px;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        main {
            flex: 1;
        }
        
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2>CourseKu</h2>
            </a>
            <button class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kursus/tampil.php">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="siswa/tampilsis.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pendaftaran/tampilpen.php">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        <div class="container my-5">
            <div class="dashboard-header">
                <h1 class="mb-2">Dashboard CourseKu</h1>
                <p class="lead text-muted mb-5">Selamat datang di sistem manajemen kursus sederhana.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="summary-card bg-primary">
                        <div class="summary-title"><i class="bi bi-book"></i> Total Kursus</div>
                        <div class="summary-value"><?= $stats['total_kursus'] ?></div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="summary-card bg-primary">
                        <div class="summary-title"><i class="bi bi-people"></i> Total Siswa</div>
                        <div class="summary-value"><?= $stats['total_siswa'] ?></div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="summary-card bg-primary">
                        <div class="summary-title"><i class="bi bi-clipboard-check"></i> Total Pendaftaran</div>
                        <div class="summary-value"><?= $stats['total_pendaftaran'] ?></div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="summary-card bg-secondary">
                        <div class="summary-title"><i class="bi bi-clock"></i> Total Durasi Semua Course (Jam)</div>
                        <div class="summary-value"><?= $stats['total_durasi'] ?></div>
                    </div>
                </div>

                <div class="col-md-6 mx-auto">
                    <div class="summary-card bg-warning">
                        <div class="summary-title text-dark"><i class="bi bi-cash-stack"></i> Rata-rata Harga Kursus</div>
                        <div class="summary-value text-dark"><?= $formatted_avg ?></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <h6 class="mb-1">© CourseKu</h6>
            <small class="text-muted">Dimana Pembelajaran Dimulai</small>
        </div>
    </footer>
</body>
</html>