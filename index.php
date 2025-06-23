<?php
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PT LINTANGDIRA PERKASA - Sewa Alat Berat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
      color: #333;
      font-family: 'Segoe UI', sans-serif;
    }

    .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        url('assets/img/grader.jpg') no-repeat center center;
      background-size: cover;
      color: white;
      padding: 140px 20px;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.9);
    }

    .section-title {
      font-weight: bold;
      margin-bottom: 30px;
      color: #222;
    }

    .card-img-top {
      height: 240px;
      object-fit: cover;
    }

    .why-card {
      transition: transform 0.3s ease;
    }

    .why-card:hover {
      transform: scale(1.03);
    }

    footer {
      background-color: #222;
      color: #ddd;
      padding: 20px 0;
      text-align: center;
      margin-top: 60px;
    }

    .btn-primary-custom {
      background-color: #f5b041;
      border-color: #f5b041;
      color: #000;
    }

    .btn-outline-light:hover {
      background-color: #fff;
      color: #000;
    }
  </style>
</head>

<body>

  <?php include 'partials/navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="hero text-center">
    <div class="container">
      <h1 class="display-4 fw-bold">PT LINTANGDIRA PERKASA</h1>
      <p class="lead">Solusi terpercaya untuk sewa alat berat Anda</p>
      <!-- <a href="alat_berat.php" class="btn btn-primary-custom btn-lg me-2">Lihat Alat Berat</a> -->
      <a href="kontak.php" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
    </div>
  </section>

  <!-- ABOUT US SECTION -->
  <section class="container text-center my-5">
    <h2 class="section-title">Tentang Kami</h2>
    <p class="mb-4">Kami menyediakan layanan sewa alat berat terbaik untuk menunjang kebutuhan proyek Anda, dari pertambangan hingga konstruksi besar.</p>
  </section>

  <!-- SHOWCASE SECTION -->
  <!-- SHOWCASE SECTION -->
  <section class="container my-5">
    <h2 class="section-title text-center">Unit Unggulan Kami</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card shadow-sm h-100">
          <img src="assets/img/dump truk.jpg" class="card-img-top" alt="Dump Truck">
          <div class="card-body">
            <h5 class="card-title">Dump Truck Komatsu HD785</h5>
            <p class="card-text">Kapasitas angkut besar untuk keperluan tambang berat.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm h-100">
          <img src="assets/img/excavator.jpg" class="card-img-top" alt="Excavator">
          <div class="card-body">
            <h5 class="card-title">Excavator CAT 324E</h5>
            <p class="card-text">Efisien untuk penggalian dan pemindahan tanah.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm h-100">
          <img src="assets/img/bulldozer.jpg" class="card-img-top" alt="Bulldozer">
          <div class="card-body">
            <h5 class="card-title">Bulldozer Komatsu D85</h5>
            <p class="card-text">Ideal untuk mendorong dan meratakan permukaan lahan.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm h-100">
          <img src="assets/img/grader.jpg" class="card-img-top" alt="Grader">
          <div class="card-body">
            <h5 class="card-title">Motor Grader CAT 140K</h5>
            <p class="card-text">Digunakan untuk meratakan dan membentuk permukaan jalan.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm h-100">
          <img src="assets/img/crane.jpg" class="card-img-top" alt="Crane">
          <div class="card-body">
            <h5 class="card-title">Crane Tadano</h5>
            <p class="card-text">Mengangkat dan memindahkan beban berat secara vertikal.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm h-100">
          <img src="assets/img/vibro roller.jpg" class="card-img-top" alt="Vibro Roller">
          <div class="card-body">
            <h5 class="card-title">Vibro Roller</h5>
            <p class="card-text">Memadatkan permukaan jalan atau tanah dengan getaran berat.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- WHY CHOOSE US SECTION -->
  <section class="bg-white py-5">
    <div class="container text-center">
      <h2 class="section-title">Kenapa Memilih Kami?</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card why-card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Alat Terpelihara</h5>
              <p class="card-text">Pemeriksaan dan perawatan rutin agar alat tetap optimal.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card why-card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Harga Bersaing</h5>
              <p class="card-text">Harga terjangkau untuk semua jenis proyek besar maupun kecil.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card why-card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Respon Cepat</h5>
              <p class="card-text">Layanan pelanggan 24/7 untuk kebutuhan mendadak Anda.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="container">
      <p class="mb-0">&copy; <?= date('Y') ?> PT LINTANGDIRA PERKASA. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>