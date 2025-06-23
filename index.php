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
      background-color: #f7f9fc;
      color: #2c3e50;
      font-family: 'Segoe UI', sans-serif;
    }

    /* HERO SECTION */
    .hero {
      background: linear-gradient(rgba(44, 62, 80, 0.1),
          rgba(44, 62, 80, 0.1)),
        url('assets/img/owner.png') no-repeat center center;
      background-size: cover;
      color: white;
      padding: 140px 20px;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }

    .hero h1 {
      font-size: 2.8rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .hero p {
      font-size: 1.2rem;
      margin-top: 0.5rem;
    }

    /* BUTTON PRIMARY */
    .btn-primary-custom {
      background-color: #f1c40f;
      border-color: #f1c40f;
      color: #2c3e50;
      font-weight: 600;
      border-radius: 30px;
      padding: 0.5rem 1.5rem;
      transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
      background-color: #d4ac0d;
      border-color: #d4ac0d;
    }

    /* SECTION TITLES */
    .section-title {
      font-weight: bold;
      color: #2c3e50;
      position: relative;
      padding-bottom: 0.5rem;
    }

    .section-title::after {
      content: '';
      width: 80px;
      height: 3px;
      background: #f1c40f;
      display: block;
      margin: 0.5rem auto;
    }

    /* CARD STYLES */
    .card {
      border: none;
      border-radius: 1rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    .card-img-top {
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      height: 220px;
      object-fit: cover;
    }

    .why-card {
      background-color: white;
      padding: 1rem;
    }

    /* FOOTER */
    footer {
      background-color: #2c3e50;
      color: #ccc;
      padding: 1.5rem 0;
      text-align: center;
    }

    footer p {
      margin: 0;
      font-size: 0.9rem;
    }
  </style>

</head>

<body>

  <?php include 'partials/navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="hero text-center">
    <div class="container mt-3">
      <h1 class="display-5 fw-bold">PT LINTANGDIRA PERKASA</h1>
      <p class="lead">Solusi terpercaya untuk sewa alat berat Anda</p>
      <a href="hubungi_kami.php" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
    </div>
  </section>

  <!-- ABOUT US SECTION -->
  <section class="container text-center my-5">
    <h2 class="section-title">Tentang Kami</h2>
    <p class="mb-2">Kami Adalah mahasiswa Universitas Pamulang</p>
    <p><B>MUHAMMAD LINTANG FAHREZA 211011400975</B></p>
    <P><B>DIVAN DIRA MAULANA 211011401032</B></P>
    <p class="mb-4">
      Kami menyediakan layanan sewa alat berat terbaik untuk menunjang berbagai kebutuhan proyek Anda, mulai dari
      pertambangan, konstruksi bangunan, hingga pengembangan infrastruktur berskala besar. Dengan dukungan armada alat
      berat yang lengkap, perawatan berkala, serta operator berpengalaman, kami berkomitmen memberikan solusi efisien
      dan terpercaya demi kelancaran proyek Anda. Website ini dikembangkan sebagai bagian dari tugas akhir Mata Kuliah
      Pemrograman 2, dengan tujuan mengimplementasikan konsep CRUD, autentikasi, dashboard admin, serta integrasi basis
      data dalam satu aplikasi berbasis web yang responsif dan fungsional.
    </p>

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