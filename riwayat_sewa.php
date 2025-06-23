<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$id_user = $_SESSION['user_id'];
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

$query = "SELECT t.*, a.nama_alat 
          FROM transaksi t 
          JOIN alat_berat a ON t.id_alat = a.id 
          WHERE t.id_user = '$id_user' 
          AND t.status = 'selesai'";

if (!empty($start_date) && !empty($end_date)) {
  $query .= " AND DATE(t.tanggal_sewa) BETWEEN '$start_date' AND '$end_date'";
}

$query .= " ORDER BY t.id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Riwayat Sewa Alat Berat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .content {
      margin-left: 250px;
      padding: 20px;
      background-color: #f8f9fa;
      min-height: 100vh;
    }

    @media print {

      .no-print,
      .sidebar {
        display: none !important;
      }

      body {
        margin: 0;
        padding: 0;
      }

      .content {
        margin: 0;
        padding: 0;
      }

      table {
        font-size: 12px;
      }

      th,
      td {
        padding: 5px !important;
      }

      .print-range-date {
        display: block !important;
        margin-bottom: 1rem;
      }
    }

    /* Sembunyikan rentang tanggal saat tidak print */
    .print-range-date {
      display: none;
    }
  </style>
</head>

<body>

  <div class="sidebar no-print">
    <?php include "partials/sidebar.php" ?>
  </div>

  <div class="content mt-5">
    <h2 class="mb-4">Riwayat Transaksi Penyewaan Anda</h2>

    <!-- TAMPILKAN RENTANG TANGGAL SAAT PRINT -->
    <?php if (!empty($start_date) && !empty($end_date)): ?>
      <div class="print-range-date">
        <p class="fw-bold" style="font-size: 16px;">
          Transaksi dari tanggal <?= date('d-m-Y', strtotime($start_date)) ?>
          sampai <?= date('d-m-Y', strtotime($end_date)) ?>
        </p>
      </div>
    <?php endif; ?>

    <!-- FORM FILTER & PRINT (hanya muncul di layar) -->
    <form class="row row-cols-lg-auto g-3 align-items-end mb-4 no-print" method="GET">
      <div class="col-12">
        <label for="start_date" class="form-label">Dari Tanggal</label>
        <input type="date" class="form-control" id="start_date" name="start_date"
          value="<?= htmlspecialchars($start_date) ?>">
      </div>
      <div class="col-12">
        <label for="end_date" class="form-label">Sampai Tanggal</label>
        <input type="date" class="form-control" id="end_date" name="end_date"
          value="<?= htmlspecialchars($end_date) ?>">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Filter</button>
        <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
      </div>
    </form>

    <div class="card shadow-sm">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle">
            <thead class="table-light text-center">
              <tr>
                <th>No</th>
                <th>Alat Berat</th>
                <th>Tanggal Sewa</th>
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
                    <td><?= htmlspecialchars($row['nama_alat']) ?></td>
                    <td><?= date('d-m-Y', strtotime($row['tanggal_sewa'])) ?></td>
                    <td class="text-center"><?= $row['durasi'] ?></td>
                    <td>Rp<?= number_format($row['total_biaya'], 0, ',', '.') ?></td>
                    <td class="text-center">
                      <?php
                      $status = $row['status'];
                      $badge = 'secondary'; // default
                  
                      if ($status == 'menunggu') {
                        $badge = 'warning';
                      } elseif ($status == 'disetujui') {
                        $badge = 'info';
                      } elseif ($status == 'berjalan') {
                        $badge = 'primary';
                      } elseif ($status == 'selesai') {
                        $badge = 'success';
                      } elseif ($status == 'ditolak') {
                        $badge = 'danger';
                      }
                      ?>
                      <span class="badge bg-<?= $badge ?>"><?= ucfirst($status) ?></span>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-center text-muted">Tidak ada transaksi pada rentang tanggal ini.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>