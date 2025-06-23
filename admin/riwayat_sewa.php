<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['is_login']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';
$search = $_GET['search'] ?? '';

$query = "SELECT t.*, a.nama_alat, u.email, u.nama AS nama_user 
          FROM transaksi t 
          JOIN alat_berat a ON t.id_alat = a.id 
          JOIN users u ON t.id_user = u.id 
          WHERE t.status = 'selesai'";

// Filter tanggal
if (!empty($start_date) && !empty($end_date)) {
    $query .= " AND t.tanggal_sewa BETWEEN '$start_date' AND '$end_date'";
}

// Filter pencarian nama alat
if (!empty($search)) {
    $query .= " AND a.nama_alat LIKE '%$search%'";
}

$query .= " ORDER BY t.id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            .print-range {
                display: block !important;
                margin-bottom: 10px;
            }
        }

        .print-range {
            display: none;
        }

        body {
            margin: 0;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->

        <?php include "sidebar_admin.php"; ?>


        <!-- Konten Utama -->
        <div class="main-content">
            <div class="container-fluid">
                <h3>Riwayat Transaksi</h3>

                <!-- Form Filter dan Pencarian -->
                <form method="GET" class="row g-3 mb-3 no-print">
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" name="start_date" id="start_date"
                            value="<?= htmlspecialchars($start_date) ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" name="end_date" id="end_date"
                            value="<?= htmlspecialchars($end_date) ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="search" class="form-label">Cari Nama Alat</label>
                        <input type="text" class="form-control" name="search" placeholder="Misal: Excavator"
                            value="<?= htmlspecialchars($search) ?>">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">Terapkan</button>
                        <button type="button" onclick="window.print()" class="btn btn-success">Print</button>
                    </div>
                </form>

                <!-- Keterangan Rentang Tanggal Saat Print -->
                <?php if (!empty($start_date) && !empty($end_date)): ?>
                    <div class="print-range">
                        <p><strong>Transaksi dari tanggal <?= date('d-m-Y', strtotime($start_date)) ?> sampai
                                <?= date('d-m-Y', strtotime($end_date)) ?></strong></p>
                    </div>
                <?php endif; ?>

                <!-- Tabel Data -->
                <div class="table-responsive w-">
                    <table class="table table-bordered">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Penyewa</th>
                                <th>Email</th>
                                <th>Alat Berat</th>
                                <th>Tgl Sewa</th>
                                <th>Durasi (hari)</th>
                                <th>Total Biaya</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php $no = 1;
                                while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($row['nama_user']) ?></td>
                                        <td><?= htmlspecialchars($row['email']) ?></td>
                                        <td><?= htmlspecialchars($row['nama_alat']) ?></td>
                                        <td><?= date('d-m-Y', strtotime($row['tanggal_sewa'])) ?></td>
                                        <td class="text-center"><?= $row['durasi'] ?></td>
                                        <td>Rp<?= number_format($row['total_biaya'], 0, ',', '.') ?></td>
                                        <td class="text-center">
                                            <?php
                                            $status = $row['status'];
                                            $badge = match ($status) {
                                                'menunggu' => 'warning',
                                                'disetujui' => 'info',
                                                'berjalan' => 'primary',
                                                'selesai' => 'success',
                                                'ditolak' => 'danger',
                                                default => 'secondary'
                                            };
                                            ?>
                                            <span class="badge bg-<?= $badge ?>"><?= ucfirst($status) ?></span>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Tidak ada data ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>