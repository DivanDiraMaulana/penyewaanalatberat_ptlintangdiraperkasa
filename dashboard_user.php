<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard User - PT. Lintang Dira Perkasa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #0d6efd;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #0b5ed7;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="text-white text-center mb-4">PT. LDP</h4>
        <hr class="text-white">
        <ul class="nav nav-pills flex-column mb-auto">
            <li><a href="dashboard_user.php" class="nav-link text-white"><i class="bi bi-house-door me-2"></i> Dashboard</a></li>
            <li><a href="alat_berat.php" class="nav-link text-white"><i class="bi bi-truck me-2"></i> Daftar Alat</a></li>
            <li><a href="form_sewa.php" class="nav-link text-white"><i class="bi bi-pencil-square me-2"></i> Form Sewa</a></li>
            <li><a href="riwayat_sewa.php" class="nav-link text-white"><i class="bi bi-clock-history me-2"></i> Riwayat Sewa</a></li>
            <li><a href="profil.php" class="nav-link text-white"><i class="bi bi-person-circle me-2"></i> <?php echo htmlspecialchars($_SESSION['nama']); ?></a></li>
            <li><a href="logout.php" class="nav-link text-white"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <h2 class="mb-4">Dashboard User</h2>
            <div class="alert alert-primary">
                Selamat datang, <strong><?php echo htmlspecialchars($_SESSION['nama']); ?></strong>!<br>
                Anda login sebagai <strong>User</strong> di sistem penyewaan alat berat <strong>PT. Lintang Dira Perkasa</strong>.
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-truck fs-1 text-primary"></i>
                            <h5 class="card-title mt-2">Lihat Alat Berat</h5>
                            <p class="card-text">Lihat daftar alat berat yang tersedia.</p>
                            <a href="alat_berat.php" class="btn btn-outline-primary w-100">Lihat Alat</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-pencil-square fs-1 text-success"></i>
                            <h5 class="card-title mt-2">Form Sewa</h5>
                            <p class="card-text">Isi formulir untuk menyewa alat berat.</p>
                            <a href="form_sewa.php" class="btn btn-outline-success w-100">Sewa Sekarang</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-clock-history fs-1 text-warning"></i>
                            <h5 class="card-title mt-2">Riwayat</h5>
                            <p class="card-text">Lihat riwayat penyewaan Anda.</p>
                            <a href="riwayat_sewa.php" class="btn btn-outline-warning w-100">Lihat Riwayat</a>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="text-center mt-5 text-muted">
                &copy; <?php echo date('Y'); ?> PT. Lintang Dira Perkasa
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>