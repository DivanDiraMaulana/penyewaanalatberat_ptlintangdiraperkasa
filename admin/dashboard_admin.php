<?php
session_start();
if (!isset($_SESSION['is_login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
include "../config/db.php";

// Ambil data transaksi per bulan
$bulan = [];
$jumlah_transaksi = [];

for ($i = 1; $i <= 6; $i++) {
    $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM transaksi WHERE MONTH(tanggal_sewa) = $i");
    $data = mysqli_fetch_assoc($query);
    $bulan[] = date('M', mktime(0, 0, 0, $i, 1));
    $jumlah_transaksi[] = $data['total'];
}

// Ambil data jenis alat berat
$jenis_labels = [];
$jenis_values = [];
$query_jenis = mysqli_query($conn, "SELECT jenis, COUNT(*) as jumlah FROM alat_berat GROUP BY jenis");
while ($row = mysqli_fetch_assoc($query_jenis)) {
    $jenis_labels[] = $row['jenis'];
    $jenis_values[] = $row['jumlah'];
}

// Hitung total untuk kartu dashboard
$total_alat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total_alat FROM alat_berat"))['total_alat'];
$total_transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total_transaksi FROM transaksi"))['total_transaksi'];
$total_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total_user FROM users"))['total_user'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        canvas {
            max-height: 300px !important;
        }
    </style>
</head>

<body>

    <?php include "sidebar_admin.php"; ?>

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
                        <p class="card-text fs-4"><?= $total_alat ?> Unit</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom text-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-list-check me-2"></i>Total Transaksi</h5>
                        <p class="card-text fs-4"><?= $total_transaksi ?> Sewa</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom text-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-people me-2"></i>Total Pengguna</h5>
                        <p class="card-text fs-4"><?= $total_user ?> User</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Transaksi per Bulan</h5>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Distribusi Jenis Alat Berat</h5>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        const bulan = <?= json_encode($bulan) ?>;
        const jumlah = <?= json_encode($jumlah_transaksi) ?>;
        const jenis = <?= json_encode($jenis_labels) ?>;
        const jumlahJenis = <?= json_encode($jenis_values) ?>;

        // Line Chart
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: bulan,
                datasets: [{
                    label: 'Transaksi',
                    data: jumlah,
                    borderColor: 'rgba(13, 110, 253, 1)',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: jenis,
                datasets: [{
                    data: jumlahJenis,
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#6f42c1'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>