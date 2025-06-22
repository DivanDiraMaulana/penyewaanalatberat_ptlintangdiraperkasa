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
  <style>
    body {
      background-color: #e9ecef;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
      min-height: 100vh;
    }

    .card {
      border-radius: 1rem;
    }

    .form-label {
      font-weight: 500;
    }

    .card-header h5 {
      margin: 0;
    }
  </style>
</head>

<body>

  <?php include 'partials/sidebar.php'; ?>

  <div class="content">
    <div class="container py-5">
      <div class="card shadow-lg mx-auto" style="max-width: 650px;">
        <div class="card-header bg-primary text-white text-center rounded-top">
          <h5 class="mb-0">Form Penyewaan Alat Berat</h5>
        </div>
        <div class="card-body">
          <?php if (isset($_GET['status'])): ?>
            <div class="alert alert-<?= $_GET['status'] == 'sukses' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
              <?= $_GET['status'] == 'sukses' ? 'Penyewaan berhasil disimpan!' : 'Terjadi kesalahan saat menyimpan data.' ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <form method="post" action="proses_sewa.php">

            <!-- id -->
            <div class="mb-3">
              <label for="nama_pemesan" class="form-label">ID : <?= htmlspecialchars($_SESSION['user_id']) ?></label>
            </div>

            <!-- Nama -->
            <div class="mb-3">
              <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
              <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan"
                value="<?= htmlspecialchars($_SESSION['nama']) ?>" readonly>
            </div>

            <!-- Pilih Alat Berat -->
            <div class="mb-3">
              <label for="alat" class="form-label">Pilih Alat Berat</label>
              <select class="form-select" id="alat" name="id_alat" required>
                <option value="">-- Pilih Alat --</option>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM alat_berat WHERE status = 'tersedia'");
                while ($r = mysqli_fetch_assoc($res)) {
                  echo "<option value='{$r['id']}'>" . htmlspecialchars($r['nama_alat']) .
                    " - Rp" . number_format($r['harga_per_hari'], 0, ',', '.') . "/hari</option>";
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

            <!-- Tombol Submit -->
            <div class="d-grid">
              <button type="submit" class="btn btn-success btn-lg">Proses Sewa</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center text-muted small">
          Pastikan data yang dimasukkan sudah benar sebelum melanjutkan.
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>