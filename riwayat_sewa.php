<?php
session_start();
include "config/db.php";

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$id_user = $_SESSION['user_id'];
$query = "SELECT t.*, a.nama_alat 
          FROM transaksi t 
          JOIN alat_berat a ON t.id_alat = a.id 
          WHERE t.id_user = '$id_user' 
          AND t.status = 'selesai'
          ORDER BY t.id DESC";
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
  <div class="content mt-5">
    <h2 class="mb-4">Riwayat Transaksi Penyewaan Anda</h2>

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
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (mysqli_num_rows($result) > 0): ?>
                <?php $no = 1;
                while ($row = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama_alat']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_sewa']) ?></td>
                    <td class="text-center"><?= $row['durasi'] ?></td>
                    <td>Rp<?= number_format($row['total_biaya'], 0, ',', '.') ?></td>
                    <td class="text-center">
                      <?php
                      $status = $row['status'];
                      $badge = 'secondary';
                      if ($status == 'menunggu') $badge = 'warning';
                      elseif ($status == 'disetujui') $badge = 'success';
                      elseif ($status == 'ditolak') $badge = 'danger';
                      ?>
                      <span class="badge bg-<?= $badge ?>"><?= ucfirst($status) ?></span>
                    </td>
                    <td class="text-center">
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
                  <td colspan="7" class="text-center text-muted">Belum ada transaksi penyewaan.</td>
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