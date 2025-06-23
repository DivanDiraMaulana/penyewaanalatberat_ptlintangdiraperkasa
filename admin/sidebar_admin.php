<!-- sidebar.php -->
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
        background: linear-gradient(180deg, #0d6efd, #1e90ff);
        color: white;
        padding: 1.5rem 1rem;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
        text-align: center;
        font-weight: bold;
        letter-spacing: 1px;
        margin-bottom: 2rem;
    }

    .sidebar a {
        color: #ffffffcc;
        padding: 0.7rem 1rem;
        margin-bottom: 0.3rem;
        border-radius: 0.5rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        transition: all 0.2s ease;
    }

    .sidebar a i {
        font-size: 1.2rem;
        margin-right: 0.5rem;
    }

    .sidebar a:hover {
        background-color: rgba(255, 255, 255, 0.15);
        padding-left: 1.3rem;
        color: #fff;
    }

    .sidebar a.active {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    .sidebar-footer {
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.3);
        text-align: center;
        font-size: 0.85rem;
        opacity: 0.7;
    }
</style>

<div class="sidebar d-flex flex-column no-print">
    <h4><i class="bi bi-shield-lock me-2"></i>Admin Panel</h4>
    <a href="dashboard_admin.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="transaksi.php"><i class="bi bi-cash-coin"></i> Transaksi</a>
    <a href="alat_berat.php"><i class="bi bi-truck"></i> Alat Berat</a>
    <a href="data_user.php"><i class="bi bi-people"></i> Data Pengguna</a>
    <a href="riwayat_sewa.php"><i class="bi bi-clock-history"></i> Riwayat Sewa</a>
    <a href="../controller/logout.php" class="text-danger mt-3"><i class="bi bi-box-arrow-right"></i> Logout</a>
    <div class="sidebar-footer mt-auto pt-3">
        &copy; <?= date('Y'); ?> PT. LDP
    </div>
</div>