<?php
session_start();
if (!isset($_SESSION['is_login'])) {
  header("Location: login.php");
  exit;
}
include 'config/db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Penyewaan Alat Berat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'partials/sidebar.php'; ?>

<div class="container mt-5">
  <div class="card mx-auto shadow" style="max-width: 600px;">
    <div class="card-header bg-primary text-white text-center">
      <h5>Form Penyewaan Alat Berat</h5>
    </div>
    <div class="card-body">
      <form method="post" action="proses_sewa.php">
        <!-- Nama Pemesan -->
        <div class="mb-3">
          <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
          <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?= $_SESSION['nama']; ?>" readonly>
        </div>

        <!-- Pilih Alat Berat -->
        <div class="mb-3">
          <label for="alat" class="form-label">Pilih Alat Berat</label>
          <select class="form-select" id="alat" name="id_alat" required>
            <option value="">-- Pilih Alat --</option>
            <?php
            $res = mysqli_query($conn, "SELECT * FROM alat_berat");
            while ($r = mysqli_fetch_assoc($res)) {
              echo "<option value='{$r['id']}'>{$r['nama_alat']} - Rp" . number_format($r['harga_per_hari'], 0, ',', '.') . "/hari</option>";
            }
            ?>
          </select>
        </div>

        <!-- Tanggal Mulai Sewa -->
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal Mulai Sewa</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal_sewa" required>
        </div>

        <!-- Durasi -->
        <div class="mb-3">
          <label for="durasi" class="form-label">Durasi (hari)</label>
          <input type="number" class="form-control" id="durasi" name="durasi" min="1" required>
        </div>

        <!-- Lokasi Proyek -->
        <div class="mb-3">
          <label for="lokasi" class="form-label">Lokasi Proyek</label>
          <textarea class="form-control" id="lokasi" name="lokasi_proyek" rows="2" required></textarea>
        </div>

        <!-- Catatan Tambahan -->
        <div class="mb-3">
          <label for="catatan" class="form-label">Catatan Tambahan (Opsional)</label>
          <textarea class="form-control" id="catatan" name="catatan_tambahan" rows="2"></textarea>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-success w-100">Proses Sewa</button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
