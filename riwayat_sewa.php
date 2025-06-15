<?php
// session_start();
include 'config/db.php';

// Misal pakai ID pengguna login (bisa disesuaikan dengan sistem auth kamu)
$user_id = $_SESSION['user_id'] ?? 1; // Default user_id = 1 untuk testing

// Query untuk mengambil riwayat penyewaan
$query = "SELECT alat.nama_alat, sewa.tanggal_sewa, sewa.durasi, sewa.total_biaya 
          FROM penyewaan AS sewa 
          JOIN alat_berat AS alat ON sewa.alat_id = alat.id 
          WHERE sewa.user_id = $user_id 
          ORDER BY sewa.tanggal_sewa DESC";

// $result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Riwayat Sewa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'partials/navbar.php'; ?>

<div class="container mt-5">
  <h2 class="mb-4">📋 Riwayat Penyewaan Anda</h2>

  <?php if ($result && mysqli_num_rows($result) > 0): ?>
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle">
        <thead class="table-primary text-center">
          <tr>
            <th>#</th>
            <th>Nama Alat</th>
            <th>Tanggal Sewa</th>
            <th>Durasi</th>
            <th>Total Biaya</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td class="text-center"><?php echo $no++; ?></td>
              <td><?php echo $row['nama_alat']; ?></td>
              <td><?php echo date('d M Y', strtotime($row['tanggal_sewa'])); ?></td>
              <td class="text-center"><?php echo $row['durasi']; ?> hari</td>
              <td class="text-end">Rp<?php echo number_format($row['total_biaya'], 0, ',', '.'); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning">Belum ada riwayat penyewaan.</div>
  <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
