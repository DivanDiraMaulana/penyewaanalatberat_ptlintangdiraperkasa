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
        .content {
            margin-left: 250px;
            /* Menyesuaikan lebar sidebar */
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <?php
    include "partials/sidebar.php"
    ?>

    <!-- Main Content -->
    <div class="content mt-5">
        <div class="container">
            <?php
            include "config/db.php";
            $id_user = $_SESSION['user_id'];

            $query = "SELECT t.*, a.nama_alat 
          FROM transaksi t 
          JOIN alat_berat a ON t.id_alat = a.id 
          WHERE t.id_user = '$id_user' 
          ORDER BY t.id DESC";

            $result = mysqli_query($conn, $query);
            ?>

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
                <h4 class="mt-5 mb-3">Transaksi Penyewaan Anda</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Alat Berat</th>
                                <th>Tgl Sewa</th>
                                <th>Durasi (hari)</th>
                                <th>Total Biaya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php $no = 1;
                                while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($row['nama_alat']) ?></td>
                                        <td><?= htmlspecialchars($row['tanggal_sewa']) ?></td>
                                        <td><?= $row['durasi'] ?></td>
                                        <td>Rp<?= number_format($row['total_biaya'], 0, ',', '.') ?></td>
                                        <td>
                                            <?php
                                            $status = $row['status'];
                                            $badge = 'secondary';
                                            if ($status == 'menunggu') $badge = 'warning';
                                            elseif ($status == 'disetujui') $badge = 'success';
                                            elseif ($status == 'ditolak') $badge = 'danger';
                                            ?>
                                            <span class="badge bg-<?= $badge ?>"><?= ucfirst($status) ?></span>
                                        </td>
                                        <td>
                                            <?php if ($status == 'disetujui'): ?>
                                                <a href="bayar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Bayar</a>
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada transaksi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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