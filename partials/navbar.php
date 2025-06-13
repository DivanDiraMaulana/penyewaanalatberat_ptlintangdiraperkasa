<?php session_start(); ?>

<?php 
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Sewa Alat Berat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li> -->
        <li class="nav-item"><a class="nav-link" href="alat_berat.php">Daftar Alat</a></li>
        <li class="nav-item"><a class="nav-link" href="form_sewa.php">Sewa</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="riwayat_sewa.php">Riwayat</a></li> -->
        <!-- <li class="nav-item"><a class="nav-link" href="laporan.php">Laporan</a></li> -->
            <li class="nav-item"><a class="nav-link" href="admin/">Amin</a></li>
      </ul>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php endif; ?>
        <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>