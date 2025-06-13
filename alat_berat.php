<?php 
include 'config/db.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Daftar Alat Berat</title>
</head>
<body>
  <?php include 'partials/navbar.php'; ?>
  <div class="container mt-5">
    <h2 class="mb-4">Daftar Alat Berat</h2>
    <div class="row">
      <?php
      $result = mysqli_query($conn, "SELECT * FROM alat_berat");
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="assets/img/<?php echo $row['foto']; ?>" class="card-img-top" alt="<?php echo $row['nama_alat']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['nama_alat']; ?></h5>
            <p class="card-text">Jenis: <?php echo $row['jenis']; ?></p>
            <p class="card-text">Harga/hari: Rp<?php echo number_format($row['harga_per_hari'],0,',','.'); ?></p>
            <p class="card-text"><?php echo $row['deskripsi']; ?></p>
            <a href="form_sewa.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Sewa Sekarang</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
