<?php 
session_start();
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Alat Berat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'partials/sidebar.php'; ?>

<div class="container mt-4">
  <h2 class="mb-4">Daftar Alat Berat</h2>
  <div class="row">
    <?php
    $alat_berat = [
      ['id' => 1, 'nama_alat' => 'Backhoe Loader', 'jenis' => 'Loader', 'harga_per_hari' => 850000, 'deskripsi' => 'Alat multifungsi untuk penggalian dan pemindahan material.', 'foto' => 'backhoe loader.jpg'],
      ['id' => 2, 'nama_alat' => 'Bulldozer', 'jenis' => 'Dozer', 'harga_per_hari' => 950000, 'deskripsi' => 'Digunakan untuk mendorong dan meratakan tanah atau material lainnya.', 'foto' => 'bulldozer.jpg'],
      ['id' => 3, 'nama_alat' => 'Crane', 'jenis' => 'Lifting', 'harga_per_hari' => 1500000, 'deskripsi' => 'Digunakan untuk mengangkat dan memindahkan material berat secara vertikal.', 'foto' => 'crane.jpg'],
      ['id' => 4, 'nama_alat' => 'Dump Truck', 'jenis' => 'Transport', 'harga_per_hari' => 750000, 'deskripsi' => 'Kendaraan untuk mengangkut material seperti pasir, tanah, dan batu.', 'foto' => 'dump truk.jpg'],
      ['id' => 5, 'nama_alat' => 'Excavator', 'jenis' => 'Penggali', 'harga_per_hari' => 1200000, 'deskripsi' => 'Digunakan untuk menggali tanah dan memindahkan material besar.', 'foto' => 'excavator.jpg'],
      ['id' => 6, 'nama_alat' => 'Grader', 'jenis' => 'Perata', 'harga_per_hari' => 800000, 'deskripsi' => 'Alat untuk meratakan permukaan tanah atau jalan.', 'foto' => 'grader.jpg'],
      ['id' => 7, 'nama_alat' => 'Hydraulic Breaker', 'jenis' => 'Pemecah', 'harga_per_hari' => 1300000, 'deskripsi' => 'Dipakai untuk menghancurkan beton, batu besar, atau bangunan.', 'foto' => 'hydraulic breaker.jpg'],
      ['id' => 8, 'nama_alat' => 'Skid Steer Loader', 'jenis' => 'Loader Kompak', 'harga_per_hari' => 700000, 'deskripsi' => 'Loader kecil serbaguna untuk area kerja sempit.', 'foto' => 'skid steer loader.jpg'],
      ['id' => 9, 'nama_alat' => 'Vibro Roller', 'jenis' => 'Pemadat', 'harga_per_hari' => 900000, 'deskripsi' => 'Digunakan untuk memadatkan tanah atau aspal dengan getaran.', 'foto' => 'vibro roller.jpg'],
      ['id' => 10, 'nama_alat' => 'Wheel Loader', 'jenis' => 'Loader', 'harga_per_hari' => 1000000, 'deskripsi' => 'Untuk memuat material ke dalam truk atau alat lainnya.', 'foto' => 'wheel loader.jpg'],
    ];

    foreach ($alat_berat as $row) {
    ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="assets/img/<?php echo $row['foto']; ?>" class="card-img-top" alt="<?php echo $row['nama_alat']; ?>" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['nama_alat']; ?></h5>
            <p class="card-text"><strong>Jenis:</strong> <?php echo $row['jenis']; ?></p>
            <p class="card-text"><strong>Harga/hari:</strong> Rp<?php echo number_format($row['harga_per_hari'], 0, ',', '.'); ?></p>
            <p class="card-text"><?php echo $row['deskripsi']; ?></p>
            <a href="form_sewa.php?id=<?php echo $row['id']; ?>" class="btn btn-primary w-100">Sewa Sekarang</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
