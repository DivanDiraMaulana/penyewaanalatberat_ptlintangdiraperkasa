<?php
// session_start(); // Hapus jika tidak digunakan di file ini
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selamat Datang - PT LINTANGDIRA PERKASA</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <?php include 'partials/navbar.php'; ?>

  <div class="container mt-5 text-center">
    <h1 class="mb-4">Selamat Datang di <span class="text-primary">Sewa Alat Berat</span></h1>
    <p class="lead">Kami menyediakan berbagai alat berat terbaik untuk menunjang proyek Anda.</p>
    
    <div class="mt-4">
      <a href="alat_berat.php" class="btn btn-primary me-2">Lihat Daftar Alat Berat</a>
      <a href="kontak.php" class="btn btn-outline-secondary">Hubungi Kami</a>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
