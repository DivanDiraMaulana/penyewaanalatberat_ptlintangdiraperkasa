<?php
session_start();
if (!isset($_SESSION['is_login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(to bottom, #0d6efd, #0a58ca);
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #ffc107;
        }

        .sidebar h4 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .content {
            flex-grow: 1;
            padding: 30px;
        }

        .card-custom {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .topbar {
            background-color: white;
            border-bottom: 1px solid #ddd;
            padding: 10px 30px;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Admin Panel</h4>
        <a href="index.php"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
        <a href="alat_berat.php"><i class="bi bi-truck me-2"></i> Data Alat Berat</a>
        <a href="data_user.php"><i class="bi bi-people me-2"></i> Data Pengguna</a>
        <a href="data_sewa.php"><i class="bi bi-clock-history me-2"></i> Data Sewa</a>
        <a href="../logout.php" class="text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="topbar">
            Selamat datang, Admin <?php echo $_SESSION['nama']; ?>!
        </div>

        <div class="mt-4 mb-4">
            <h3 class="fw-bold">Dashboard Penyewaan Alat Berat</h3>
            <p class="text-muted">PT. Lintang Dira Perkasa</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom text-primary">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-truck me-2"></i>Total Alat Berat</h5>
                        <p class="card-text fs-4">12 Unit</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom text-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-list-check me-2"></i>Total Transaksi</h5>
                        <p class="card-text fs-4">24 Sewa</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom text-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-people me-2"></i>Total Pengguna</h5>
                        <p class="card-text fs-4">8 User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>