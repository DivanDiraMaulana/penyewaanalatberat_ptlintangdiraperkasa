<?php
session_start();
if (!isset($_SESSION['is_login'])) {
  // Jika tidak login, alihkan ke halaman login
  header("Location: login.php");
  exit;
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Form Penyewaan</title>
</head>

<body>

  <?php
  include "partials/sidebar.php"
  ?>


  <div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
      <div class="card-header bg-primary text-white">Form Penyewaan</div>
      <div class="card-body">
        <form method="post" action="proses_sewa.php">
          <div class="mb-3">
            <label for="alat" class="form-label">Pilih Alat</label>
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
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Sewa</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal_sewa" required>
          </div>
          <div class="mb-3">
            <label for="durasi" class="form-label">Durasi (hari)</label>
            <input type="number" class="form-control" id="durasi" name="durasi" min="1" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Proses Sewa</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>