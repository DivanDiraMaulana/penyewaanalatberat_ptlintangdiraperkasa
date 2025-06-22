<!-- sidebar.php -->
<!-- Tambahkan CSS hanya jika belum pernah ditambahkan di halaman utama -->

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
</style>

<div class="sidebar">
    <h4>Admin Panel</h4>
    <a href="dashboard_admin.php"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
    <a href="transaksi.php"><i class="bi bi-truck me-2"></i> Transaksi</a>
    <a href="alat_berat.php"><i class="bi bi-truck me-2"></i> Alatberat</a>
    <a href="data_user.php"><i class="bi bi-people me-2"></i> Data Pengguna</a>
    <a href="riwayat_sewa.php"><i class="bi bi-clock-history me-2"></i> Riwayat Sewa</a>
    <a href="../logout.php" class="text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
</div>